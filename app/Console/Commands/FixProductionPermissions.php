<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class FixProductionPermissions extends Command
{
    protected $signature = 'fix:production-permissions {--force}';
    protected $description = 'Fix permission issues in production environment';

    public function handle()
    {
        $this->info('=== FIXING PRODUCTION PERMISSIONS ===');
        
        // Step 1: Clear all caches
        $this->info("\n1. Clearing all caches...");
        try {
            Artisan::call('cache:clear');
            $this->line('   ✓ Application cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error clearing cache: " . $e->getMessage());
        }
        
        try {
            Artisan::call('config:clear');
            $this->line('   ✓ Config cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error clearing config: " . $e->getMessage());
        }
        
        try {
            Artisan::call('route:clear');
            $this->line('   ✓ Route cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error clearing routes: " . $e->getMessage());
        }
        
        try {
            Artisan::call('view:clear');
            $this->line('   ✓ View cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error clearing views: " . $e->getMessage());
        }
        
        // Step 2: Clear permission cache specifically
        $this->info("\n2. Clearing permission cache...");
        try {
            Artisan::call('permission:cache-reset');
            $this->line('   ✓ Permission cache reset');
        } catch (\Exception $e) {
            $this->error("   ✗ Error resetting permission cache: " . $e->getMessage());
        }
        
        // Step 3: Reseed roles and permissions if forced
        if ($this->option('force')) {
            $this->info("\n3. Re-seeding roles and permissions...");
            try {
                Artisan::call('db:seed', ['--class' => 'RolePermissionSeeder']);
                $this->line('   ✓ Roles and permissions re-seeded');
            } catch (\Exception $e) {
                $this->error("   ✗ Error seeding: " . $e->getMessage());
            }
        }
        
        // Step 4: Fix orphaned user roles
        $this->info("\n4. Checking for orphaned user roles...");
        $users = \App\Models\User::all();
        $fixedCount = 0;
        
        foreach ($users as $user) {
            // Check if user has roles but can't access them
            if ($user->roles()->count() > 0) {
                try {
                    $roleNames = $user->getRoleNames();
                    if ($roleNames->isEmpty()) {
                        // User has role relationships but can't get role names
                        $this->line("   ! Fixing role cache for user: {$user->name}");
                        $user->refresh();
                        $fixedCount++;
                    }
                } catch (\Exception $e) {
                    $this->line("   ! Error checking user {$user->name}: " . $e->getMessage());
                }
            }
        }
        
        $this->line("   ✓ Fixed {$fixedCount} user role issues");
        
        // Step 5: Rebuild permission cache
        $this->info("\n5. Rebuilding caches...");
        try {
            Artisan::call('config:cache');
            $this->line('   ✓ Config cache rebuilt');
        } catch (\Exception $e) {
            $this->line("   ! Config cache not rebuilt (might be file permission issue): " . $e->getMessage());
        }
        
        try {
            Artisan::call('route:cache');
            $this->line('   ✓ Route cache rebuilt');
        } catch (\Exception $e) {
            $this->line("   ! Route cache not rebuilt (might be file permission issue): " . $e->getMessage());
        }
        
        $this->info("\n=== PERMISSION FIX COMPLETED ===");
        $this->warn("\nIf issues persist, check:");
        $this->line("1. File permissions on storage/framework/cache");
        $this->line("2. Database connection");
        $this->line("3. Run: php artisan debug:check-production-roles");
        
        return 0;
    }
}
