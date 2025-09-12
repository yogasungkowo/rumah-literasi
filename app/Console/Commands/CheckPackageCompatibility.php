<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;

class CheckPackageCompatibility extends Command
{
    protected $signature = 'debug:check-packages';
    protected $description = 'Check package compatibility and potential issues';

    public function handle()
    {
        $this->info('=== PACKAGE COMPATIBILITY CHECK ===');
        
        // Check PHP version
        $this->info("\n1. PHP Environment:");
        $this->line("   PHP Version: " . PHP_VERSION);
        $this->line("   Required: ^8.2");
        if (version_compare(PHP_VERSION, '8.2.0', '>=')) {
            $this->line("   ✓ PHP version compatible");
        } else {
            $this->error("   ✗ PHP version too old");
        }
        
        // Check Laravel version
        $this->info("\n2. Laravel Framework:");
        $laravelVersion = app()->version();
        $this->line("   Laravel Version: " . $laravelVersion);
        $this->line("   ✓ Laravel framework loaded");
        
        // Check Spatie Permission package
        $this->info("\n3. Spatie Permission Package:");
        try {
            $permissionVersion = \Composer\InstalledVersions::getVersion('spatie/laravel-permission');
            $this->line("   Package Version: " . $permissionVersion);
            
            // Check if service provider is loaded
            $providers = config('app.providers', []);
            $hasProvider = false;
            foreach ($providers as $provider) {
                if (strpos($provider, 'PermissionServiceProvider') !== false) {
                    $hasProvider = true;
                    break;
                }
            }
            
            if ($hasProvider) {
                $this->line("   ✓ Service provider registered");
            } else {
                $this->warn("   ! Service provider might not be auto-discovered");
            }
            
            // Check middleware aliases
            $middleware = config('permission.middleware_aliases', []);
            if (!empty($middleware)) {
                $this->line("   ✓ Middleware aliases configured");
            } else {
                $this->warn("   ! Middleware aliases not found in config");
            }
            
        } catch (\Exception $e) {
            $this->error("   ✗ Package not properly installed: " . $e->getMessage());
        }
        
        // Check required PHP extensions
        $this->info("\n4. PHP Extensions:");
        $requiredExtensions = [
            'pdo',
            'mbstring',
            'tokenizer',
            'xml',
            'ctype',
            'json',
            'bcmath',
            'fileinfo'
        ];
        
        foreach ($requiredExtensions as $ext) {
            if (extension_loaded($ext)) {
                $this->line("   ✓ {$ext}");
            } else {
                $this->error("   ✗ {$ext} - MISSING");
            }
        }
        
        // Check database connection
        $this->info("\n5. Database Connection:");
        try {
            DB::connection()->getPdo();
            $this->line("   ✓ Database connected");
            
            // Check permission tables
            $tables = ['roles', 'permissions', 'model_has_roles', 'model_has_permissions', 'role_has_permissions'];
            foreach ($tables as $table) {
                if (Schema::hasTable($table)) {
                    $this->line("   ✓ Table '{$table}' exists");
                } else {
                    $this->error("   ✗ Table '{$table}' missing");
                }
            }
            
        } catch (\Exception $e) {
            $this->error("   ✗ Database connection failed: " . $e->getMessage());
        }
        
        // Check config files
        $this->info("\n6. Configuration Files:");
        $configFiles = [
            'permission' => config_path('permission.php'),
            'auth' => config_path('auth.php'),
            'cache' => config_path('cache.php')
        ];
        
        foreach ($configFiles as $name => $path) {
            if (file_exists($path)) {
                $this->line("   ✓ {$name}.php exists");
            } else {
                $this->error("   ✗ {$name}.php missing");
            }
        }
        
        // Check cache configuration
        $this->info("\n7. Cache Configuration:");
        $cacheDriver = config('cache.default');
        $this->line("   Default Cache Driver: {$cacheDriver}");
        
        $permissionCacheStore = config('permission.cache.store');
        $this->line("   Permission Cache Store: " . ($permissionCacheStore ?: 'default'));
        
        try {
            Cache::put('test_cache', 'value', 60);
            $value = Cache::get('test_cache');
            if ($value === 'value') {
                $this->line("   ✓ Cache is working");
            } else {
                $this->error("   ✗ Cache not working properly");
            }
            Cache::forget('test_cache');
        } catch (\Exception $e) {
            $this->error("   ✗ Cache error: " . $e->getMessage());
        }
        
        // Check file permissions
        $this->info("\n8. File Permissions:");
        $directories = [
            storage_path('framework/cache'),
            storage_path('framework/sessions'),
            storage_path('framework/views'),
            storage_path('logs'),
            base_path('bootstrap/cache')
        ];
        
        foreach ($directories as $dir) {
            if (is_writable($dir)) {
                $this->line("   ✓ {$dir} is writable");
            } else {
                $this->error("   ✗ {$dir} is not writable");
            }
        }
        
        // Check composer autoload
        $this->info("\n9. Composer Autoload:");
        try {
            $autoloadPath = base_path('vendor/autoload.php');
            if (file_exists($autoloadPath)) {
                $this->line("   ✓ Composer autoload exists");
                
                // Check if classes can be loaded
                if (class_exists('\Spatie\Permission\Models\Role')) {
                    $this->line("   ✓ Spatie Permission classes can be loaded");
                } else {
                    $this->error("   ✗ Spatie Permission classes not found");
                }
            } else {
                $this->error("   ✗ Composer autoload missing - run 'composer install'");
            }
        } catch (\Exception $e) {
            $this->error("   ✗ Autoload error: " . $e->getMessage());
        }
        
        // Performance check
        $this->info("\n10. Performance Check:");
        $start = microtime(true);
        try {
            $user = \App\Models\User::first();
            if ($user) {
                $roles = $user->getRoleNames();
                $end = microtime(true);
                $time = round(($end - $start) * 1000, 2);
                $this->line("   Role loading time: {$time}ms");
                if ($time < 100) {
                    $this->line("   ✓ Performance is good");
                } else {
                    $this->warn("   ! Performance might be slow ({$time}ms)");
                }
            } else {
                $this->warn("   ! No users found for performance test");
            }
        } catch (\Exception $e) {
            $this->error("   ✗ Performance test failed: " . $e->getMessage());
        }
        
        $this->info("\n=== RECOMMENDATIONS ===");
        $this->line("If you found issues above:");
        $this->line("1. Run: composer install --no-dev --optimize-autoloader");
        $this->line("2. Run: php artisan config:publish spatie/laravel-permission");
        $this->line("3. Run: php artisan migrate");
        $this->line("4. Run: php artisan permission:cache-reset");
        $this->line("5. Fix file permissions on storage directories");
        $this->line("6. Check PHP extensions installation");
        
        return 0;
    }
}
