<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\BookDonation;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;

class ProductionRealTimeDebug extends Command
{
    protected $signature = 'debug:production-realtime';
    protected $description = 'Real-time debug for production 403 issues';

    public function handle()
    {
        $this->info('=== PRODUCTION REAL-TIME DEBUG ===');
        
        // Step 1: Environment Check
        $this->info("\n1. Environment Check:");
        $this->line("   APP_ENV: " . config('app.env'));
        $this->line("   APP_DEBUG: " . (config('app.debug') ? 'true' : 'false'));
        $this->line("   DB_CONNECTION: " . config('database.default'));
        
        // Step 2: Cache Configuration
        $this->info("\n2. Cache Configuration:");
        $this->line("   CACHE_DRIVER: " . config('cache.default'));
        $this->line("   Permission cache key: " . config('permission.cache.key'));
        
        $expiration = config('permission.cache.expiration_time');
        if ($expiration instanceof \DateInterval) {
            $this->line("   Permission cache expiration: DateInterval format");
        } else {
            $this->line("   Permission cache expiration: " . $expiration . ' seconds');
        }
        
        // Step 3: Test specific user from production
        $this->info("\n3. Production User Test:");
        $user = User::where('email', 'donatur@example.com')->first();
        
        if (!$user) {
            $this->error("   User not found!");
            return 1;
        }
        
        $this->line("   User ID: {$user->id}");
        $this->line("   Name: {$user->name}");
        
        // Step 4: Role check with error handling
        $this->info("\n4. Role Check with Error Handling:");
        try {
            $this->line("   Checking roles...");
            $roles = $user->roles;
            $this->line("   Roles loaded: " . $roles->count());
            
            $this->line("   Checking getRoleNames()...");
            $roleNames = $user->getRoleNames();
            $this->line("   Role names: " . $roleNames->implode(', '));
            
            $this->line("   Checking hasRole()...");
            $hasRole = $user->hasRole('Donatur Buku');
            $this->line("   Has Donatur Buku role: " . ($hasRole ? 'YES' : 'NO'));
            
        } catch (\Exception $e) {
            $this->error("   ERROR in role check: " . $e->getMessage());
            $this->error("   Stack trace: " . $e->getTraceAsString());
        }
        
        // Step 5: Test donation access
        $this->info("\n5. Donation Access Test:");
        $donations = BookDonation::where('donor_id', $user->id)->get();
        $this->line("   User donations: " . $donations->count());
        
        foreach ($donations as $donation) {
            $this->line("   Testing donation {$donation->id}:");
            
            try {
                // Test DonationController logic exactly
                $isAdmin = $user->hasRole('Admin');
                $isOwner = $donation->donor_id === $user->id;
                $shouldPass = $isAdmin || $isOwner;
                
                $this->line("     Is Admin: " . ($isAdmin ? 'YES' : 'NO'));
                $this->line("     Is Owner: " . ($isOwner ? 'YES' : 'NO'));  
                $this->line("     Should Pass: " . ($shouldPass ? 'YES' : 'NO'));
                
                if (!$shouldPass) {
                    $this->error("     ⚠️  WOULD GET 403 ERROR!");
                    
                    // Additional debugging
                    $this->line("     Debug info:");
                    $this->line("       donation.donor_id: {$donation->donor_id}");
                    $this->line("       user.id: {$user->id}");
                    $this->line("       Types match: " . (gettype($donation->donor_id) === gettype($user->id) ? 'YES' : 'NO'));
                    $this->line("       Strict equality: " . ($donation->donor_id === $user->id ? 'YES' : 'NO'));
                }
                
            } catch (\Exception $e) {
                $this->error("     ERROR testing donation: " . $e->getMessage());
            }
        }
        
        // Step 6: Middleware Test
        $this->info("\n6. Middleware Test:");
        try {
            $middleware = app(\Spatie\Permission\Middleware\RoleMiddleware::class);
            $this->line("   Middleware loaded: ✓");
            
            // Test the condition that middleware uses
            $userHasRole = $user->hasRole('Donatur Buku');
            $this->line("   User passes middleware: " . ($userHasRole ? 'YES' : 'NO'));
            
        } catch (\Exception $e) {
            $this->error("   Middleware test failed: " . $e->getMessage());
        }
        
        // Step 7: Permission Cache Deep Dive
        $this->info("\n7. Permission Cache Deep Dive:");
        try {
            $cacheKey = config('permission.cache.key', 'spatie.permission.cache');
            
            $this->line("   Cache driver: " . config('cache.default'));
            $this->line("   Checking cache key: {$cacheKey}");
            
            $cacheStore = Cache::store();
            $hasCache = $cacheStore->has($cacheKey);
            $this->line("   Cache exists: " . ($hasCache ? 'YES' : 'NO'));
            
            if ($hasCache) {
                $cacheData = $cacheStore->get($cacheKey);
                $this->line("   Cache data type: " . gettype($cacheData));
                
                if (is_array($cacheData)) {
                    $this->line("   Cache keys: " . implode(', ', array_keys($cacheData)));
                    
                    // Look for user-specific cache
                    $userKey = "spatie.permission.cache.users.{$user->id}";
                    if (isset($cacheData[$userKey])) {
                        $this->line("   User cache found: ✓");
                    } else {
                        $this->line("   User cache missing: ✗");
                    }
                }
            }
            
        } catch (\Exception $e) {
            $this->error("   Cache deep dive failed: " . $e->getMessage());
        }
        
        // Step 8: Database Connection Test
        $this->info("\n8. Database Connection Test:");
        try {
            $userCount = User::count();
            $roleCount = \Spatie\Permission\Models\Role::count();
            $permissionCount = \Spatie\Permission\Models\Permission::count();
            
            $this->line("   Users: {$userCount}");
            $this->line("   Roles: {$roleCount}");
            $this->line("   Permissions: {$permissionCount}");
            
            // Test join query (this is what might fail)
            $userWithRoles = User::with('roles')->find($user->id);
            $this->line("   User roles via relationship: " . $userWithRoles->roles->count());
            
        } catch (\Exception $e) {
            $this->error("   Database test failed: " . $e->getMessage());
        }
        
        $this->info("\n=== PRODUCTION REAL-TIME DEBUG COMPLETED ===");
        return 0;
    }
}
