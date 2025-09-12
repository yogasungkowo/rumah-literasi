<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class TestMiddleware extends Command
{
    protected $signature = 'test:middleware {email=donatur@example.com}';
    protected $description = 'Test middleware behavior for specific user';

    public function handle()
    {
        $email = $this->argument('email');
        $this->info("=== TESTING MIDDLEWARE FOR: {$email} ===");
        
        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error("User not found: {$email}");
            return 1;
        }
        
        // Step 1: Test role middleware directly
        $this->info("\n1. Direct Role Middleware Test:");
        try {
            $middleware = new \Spatie\Permission\Middleware\RoleMiddleware();
            $this->line("   Middleware class loaded: ✓");
            
            // Test if user has role
            $hasRole = $user->hasRole('Donatur Buku');
            $this->line("   User has 'Donatur Buku' role: " . ($hasRole ? 'YES' : 'NO'));
            
        } catch (\Exception $e) {
            $this->error("   Error: " . $e->getMessage());
        }
        
        // Step 2: Check route registration
        $this->info("\n2. Route Registration Check:");
        $routes = Route::getRoutes();
        $donationRoutes = [];
        
        foreach ($routes as $route) {
            $uri = $route->uri();
            if (str_contains($uri, 'donations')) {
                $donationRoutes[] = [
                    'method' => implode('|', $route->methods()),
                    'uri' => $uri,
                    'name' => $route->getName(),
                    'middleware' => $route->gatherMiddleware(),
                ];
            }
        }
        
        $this->line("   Found " . count($donationRoutes) . " donation routes:");
        foreach ($donationRoutes as $route) {
            $this->line("   - {$route['method']} {$route['uri']}");
            $this->line("     Name: " . ($route['name'] ?? 'unnamed'));
            $this->line("     Middleware: " . implode(', ', $route['middleware']));
            
            // Check if route has role middleware
            $hasRoleMiddleware = in_array('role:Donatur Buku', $route['middleware']);
            $this->line("     Has 'role:Donatur Buku': " . ($hasRoleMiddleware ? 'YES' : 'NO'));
            $this->line("");
        }
        
        // Step 3: Check permission cache
        $this->info("\n3. Permission Cache Check:");
        try {
            $cacheKey = config('permission.cache.key', 'spatie.permission.cache');
            $this->line("   Cache key: {$cacheKey}");
            
            $cache = app('cache');
            $hasCache = $cache->has($cacheKey);
            $this->line("   Cache exists: " . ($hasCache ? 'YES' : 'NO'));
            
            if ($hasCache) {
                $cacheData = $cache->get($cacheKey);
                $this->line("   Cache type: " . gettype($cacheData));
                if (is_array($cacheData)) {
                    $this->line("   Cache entries: " . count($cacheData));
                }
            }
        } catch (\Exception $e) {
            $this->error("   Cache check failed: " . $e->getMessage());
        }
        
        // Step 4: Test permission loading
        $this->info("\n4. Permission Loading Test:");
        try {
            $permissions = $user->getAllPermissions();
            $this->line("   User permissions count: " . $permissions->count());
            
            $rolePermissions = $user->getPermissionsViaRoles();
            $this->line("   Role-based permissions: " . $rolePermissions->count());
            
            $donationPermissions = $permissions->filter(function($permission) {
                return str_contains($permission->name, 'donation');
            });
            $this->line("   Donation-related permissions: " . $donationPermissions->count());
            
            foreach ($donationPermissions as $permission) {
                $this->line("   - {$permission->name}");
            }
            
        } catch (\Exception $e) {
            $this->error("   Permission loading failed: " . $e->getMessage());
        }
        
        // Step 5: Request Simulation:
        $this->info("\n5. Request Simulation:");
        try {
            // Test auth facade
            \Illuminate\Support\Facades\Auth::login($user);
            $this->line("   Auth user set: ✓");
            $this->line("   Auth user ID: " . \Illuminate\Support\Facades\Auth::id());
            $this->line("   Auth user name: " . \Illuminate\Support\Facades\Auth::user()->name);
            
            // Test role check through auth
            $hasRoleViaAuth = \Illuminate\Support\Facades\Auth::user()->hasRole('Donatur Buku');
            $this->line("   Role check via auth: " . ($hasRoleViaAuth ? 'PASS' : 'FAIL'));
            
        } catch (\Exception $e) {
            $this->error("   Request simulation failed: " . $e->getMessage());
        }
        
        return 0;
    }
}
