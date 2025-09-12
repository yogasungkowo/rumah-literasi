<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class FixPackageIssues extends Command
{
    protected $signature = 'fix:package-issues';
    protected $description = 'Fix common package configuration issues';

    public function handle()
    {
        $this->info('=== FIXING PACKAGE ISSUES ===');
        
        // Step 1: Publish Spatie Permission config
        $this->info("\n1. Publishing Spatie Permission configuration...");
        try {
            if (!file_exists(config_path('permission.php'))) {
                Artisan::call('vendor:publish', [
                    '--provider' => 'Spatie\Permission\PermissionServiceProvider'
                ]);
                $this->line('   ✓ Permission config published');
            } else {
                $this->line('   ✓ Permission config already exists');
            }
        } catch (\Exception $e) {
            $this->error("   ✗ Error publishing config: " . $e->getMessage());
        }
        
        // Step 2: Clear and rebuild autoload
        $this->info("\n2. Rebuilding composer autoload...");
        try {
            exec('composer dump-autoload --optimize 2>&1', $output, $returnVar);
            if ($returnVar === 0) {
                $this->line('   ✓ Composer autoload rebuilt');
            } else {
                $this->warn('   ! Composer autoload rebuild failed or not available');
                $this->line('   Manual command: composer dump-autoload --optimize');
            }
        } catch (\Exception $e) {
            $this->warn("   ! Could not run composer: " . $e->getMessage());
        }
        
        // Step 3: Clear all caches
        $this->info("\n3. Clearing all caches...");
        $cacheCommands = [
            'cache:clear' => 'Application cache',
            'config:clear' => 'Configuration cache',
            'route:clear' => 'Route cache',
            'view:clear' => 'View cache',
            'permission:cache-reset' => 'Permission cache'
        ];
        
        foreach ($cacheCommands as $command => $description) {
            try {
                Artisan::call($command);
                $this->line("   ✓ {$description} cleared");
            } catch (\Exception $e) {
                $this->error("   ✗ {$description} failed: " . $e->getMessage());
            }
        }
        
        // Step 4: Verify middleware registration
        $this->info("\n4. Checking middleware registration...");
        $middlewareAliases = [
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ];
        
        $bootstrapFile = base_path('bootstrap/app.php');
        if (file_exists($bootstrapFile)) {
            $content = file_get_contents($bootstrapFile);
            
            $hasMiddleware = strpos($content, 'RoleMiddleware') !== false;
            if ($hasMiddleware) {
                $this->line('   ✓ Middleware aliases are registered');
            } else {
                $this->warn('   ! Middleware aliases might not be registered');
                $this->line('   Check bootstrap/app.php for middleware configuration');
            }
        }
        
        // Step 5: Verify database migrations
        $this->info("\n5. Checking database migrations...");
        try {
            // Check if permission tables exist with correct structure
            $tables = ['roles', 'permissions', 'model_has_roles', 'model_has_permissions', 'role_has_permissions'];
            $allTablesExist = true;
            
            foreach ($tables as $table) {
                if (!Schema::hasTable($table)) {
                    $allTablesExist = false;
                    $this->error("   ✗ Table '{$table}' missing");
                }
            }
            
            if ($allTablesExist) {
                $this->line('   ✓ All permission tables exist');
            } else {
                $this->warn('   ! Some permission tables are missing');
                $this->line('   Run: php artisan migrate');
            }
        } catch (\Exception $e) {
            $this->error("   ✗ Database check failed: " . $e->getMessage());
        }
        
        // Step 6: Test permission functionality
        $this->info("\n6. Testing permission functionality...");
        try {
            // Test role creation and assignment
            $testUser = \App\Models\User::first();
            if ($testUser) {
                $originalRoles = $testUser->getRoleNames()->toArray();
                $this->line("   User roles before test: " . implode(', ', $originalRoles));
                
                // Test role check
                $hasRole = $testUser->hasRole('Admin');
                $this->line("   ✓ Role checking works");
                
                // Test getting role names
                $roleNames = $testUser->getRoleNames();
                $this->line("   ✓ Role names retrieval works");
                
            } else {
                $this->warn('   ! No users found for testing');
            }
        } catch (\Exception $e) {
            $this->error("   ✗ Permission functionality test failed: " . $e->getMessage());
        }
        
        // Step 7: Check file permissions
        $this->info("\n7. Checking file permissions...");
        $directories = [
            storage_path('framework'),
            storage_path('logs'),
            base_path('bootstrap/cache')
        ];
        
        foreach ($directories as $dir) {
            if (is_dir($dir)) {
                if (is_writable($dir)) {
                    $this->line("   ✓ {$dir} is writable");
                } else {
                    $this->error("   ✗ {$dir} is not writable");
                    $this->line("   Fix: chmod -R 755 {$dir}");
                }
            } else {
                $this->error("   ✗ {$dir} does not exist");
            }
        }
        
        // Step 8: Optimize for production
        $this->info("\n8. Production optimizations...");
        if (app()->environment('production')) {
            try {
                Artisan::call('config:cache');
                $this->line('   ✓ Configuration cached');
            } catch (\Exception $e) {
                $this->warn("   ! Config caching failed: " . $e->getMessage());
            }
            
            try {
                Artisan::call('route:cache');
                $this->line('   ✓ Routes cached');
            } catch (\Exception $e) {
                $this->warn("   ! Route caching failed: " . $e->getMessage());
            }
        } else {
            $this->line('   ! Not in production mode, skipping optimizations');
        }
        
        $this->info("\n=== PACKAGE FIXES COMPLETED ===");
        
        // Final recommendations
        $this->info("\n=== NEXT STEPS FOR PRODUCTION ===");
        $this->line("1. Upload all files to production server");
        $this->line("2. Run: composer install --no-dev --optimize-autoloader");
        $this->line("3. Run: php artisan migrate --force");
        $this->line("4. Run: php artisan fix:package-issues");
        $this->line("5. Run: php artisan permission:cache-reset");
        $this->line("6. Set proper file permissions:");
        $this->line("   chmod -R 755 storage/");
        $this->line("   chmod -R 755 bootstrap/cache/");
        $this->line("   chown -R www-data:www-data storage/");
        $this->line("7. Test user authentication and role checking");
        
        return 0;
    }
}
