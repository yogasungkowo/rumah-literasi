<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FixProduction403 extends Command
{
    protected $signature = 'fix:production-403 {--dry-run}';
    protected $description = 'Complete fix for 403 unauthorized issues in production';

    public function handle()
    {
        $this->info('=== COMPLETE PRODUCTION 403 FIX ===');
        
        $isDryRun = $this->option('dry-run');
        
        if ($isDryRun) {
            $this->warn('DRY RUN MODE - Only diagnosis will be performed');
        }
        
        // Step 1: Diagnose data consistency
        $this->info("\n🔍 STEP 1: Diagnosing data consistency...");
        Artisan::call('debug:data-consistency');
        $this->line(Artisan::output());
        
        // Step 2: Check donation ownership
        $this->info("\n🔍 STEP 2: Checking donation ownership...");
        if ($isDryRun) {
            Artisan::call('fix:donation-ownership', ['--dry-run' => true]);
        } else {
            Artisan::call('fix:donation-ownership', ['--force' => true]);
        }
        $this->line(Artisan::output());
        
        // Step 3: Clear caches (only if not dry run)
        if (!$isDryRun) {
            $this->info("\n🧹 STEP 3: Clearing caches...");
            
            try {
                Artisan::call('permission:cache-reset');
                $this->line('   ✓ Permission cache cleared');
            } catch (\Exception $e) {
                $this->error("   ✗ Permission cache error: " . $e->getMessage());
            }
            
            try {
                Artisan::call('cache:clear');
                $this->line('   ✓ Application cache cleared');
            } catch (\Exception $e) {
                $this->error("   ✗ Application cache error: " . $e->getMessage());
            }
            
            try {
                Artisan::call('config:clear');
                $this->line('   ✓ Config cache cleared');
            } catch (\Exception $e) {
                $this->error("   ✗ Config cache error: " . $e->getMessage());
            }
        }
        
        // Step 4: Verify fix
        $this->info("\n✅ STEP 4: Verifying fix...");
        Artisan::call('debug:production-donation-403');
        $this->line(Artisan::output());
        
        // Step 5: Final summary
        $this->info("\n=== FINAL SUMMARY ===");
        
        if ($isDryRun) {
            $this->warn("This was a DRY RUN. To apply fixes, run:");
            $this->line("php artisan fix:production-403");
        } else {
            $this->info("✅ All fixes have been applied!");
            $this->line("\nNext steps:");
            $this->line("1. Test user login: donatur@example.com");
            $this->line("2. Test donation submission");
            $this->line("3. Test donation detail access");
            $this->line("4. Test donation editing");
            $this->line("5. Monitor logs for any remaining 403 errors");
        }
        
        $this->info("\n📋 If issues persist, check:");
        $this->line("1. Web server error logs");
        $this->line("2. Laravel logs: storage/logs/laravel.log");
        $this->line("3. File permissions on storage/ directory");
        $this->line("4. Database connection");
        $this->line("5. Consider restarting web server");
        
        return 0;
    }
}
