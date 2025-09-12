<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class FixProductionCache extends Command
{
    protected $signature = 'fix:production-cache';
    protected $description = 'Fix cache issues in production that cause 403 errors';

    public function handle()
    {
        $this->info('=== FIXING PRODUCTION CACHE ISSUES ===');
        
        // Step 1: Clear permission cache
        $this->info("\n1. Clearing permission cache...");
        try {
            Artisan::call('permission:cache-reset');
            $this->line('   ✓ Permission cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error: " . $e->getMessage());
        }
        
        // Step 2: Clear application cache
        $this->info("\n2. Clearing application cache...");
        try {
            Artisan::call('cache:clear');
            $this->line('   ✓ Application cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error: " . $e->getMessage());
        }
        
        // Step 3: Clear config cache
        $this->info("\n3. Clearing config cache...");
        try {
            Artisan::call('config:clear');
            $this->line('   ✓ Config cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error: " . $e->getMessage());
        }
        
        // Step 4: Clear route cache
        $this->info("\n4. Clearing route cache...");
        try {
            Artisan::call('route:clear');
            $this->line('   ✓ Route cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error: " . $e->getMessage());
        }
        
        // Step 5: Clear view cache
        $this->info("\n5. Clearing view cache...");
        try {
            Artisan::call('view:clear');
            $this->line('   ✓ View cache cleared');
        } catch (\Exception $e) {
            $this->error("   ✗ Error: " . $e->getMessage());
        }
        
        // Step 6: Recreate config cache (optional, might fail in some hosting)
        $this->info("\n6. Recreating config cache...");
        try {
            Artisan::call('config:cache');
            $this->line('   ✓ Config cache recreated');
        } catch (\Exception $e) {
            $this->line("   ! Config cache not recreated (normal in some hosting): " . $e->getMessage());
        }
        
        // Step 7: Check cache directory permissions
        $this->info("\n7. Checking cache directory...");
        $cacheDir = storage_path('framework/cache');
        if (is_writable($cacheDir)) {
            $this->line('   ✓ Cache directory is writable');
        } else {
            $this->error('   ✗ Cache directory is not writable: ' . $cacheDir);
            $this->line('   Run: chmod -R 755 ' . $cacheDir);
        }
        
        $this->info("\n=== CACHE FIX COMPLETED ===");
        $this->warn("\nIf 403 errors persist, also check:");
        $this->line("1. Database connection");
        $this->line("2. User role assignments");
        $this->line("3. Middleware configuration");
        $this->line("4. Web server restart might be needed");
        
        return 0;
    }
}
