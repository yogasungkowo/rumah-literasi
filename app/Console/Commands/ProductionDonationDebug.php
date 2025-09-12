<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\BookDonation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class ProductionDonationDebug extends Command
{
    protected $signature = 'debug:production-donation-403 {--fix}';
    protected $description = 'Debug and fix 403 issues for donation users in production';

    public function handle()
    {
        $this->info('=== PRODUCTION DONATION 403 DEBUG ===');
        
        $shouldFix = $this->option('fix');
        
        // Step 1: Check all users with Donatur Buku role
        $this->info("\n1. Checking users with 'Donatur Buku' role:");
        $donaturs = User::role('Donatur Buku')->get();
        
        foreach ($donaturs as $user) {
            $this->line("   - {$user->name} ({$user->email})");
            $donationCount = BookDonation::where('donor_id', $user->id)->count();
            $this->line("     Donations: {$donationCount}");
            
            // Test role check
            try {
                $hasRole = $user->hasRole('Donatur Buku');
                $this->line("     hasRole check: " . ($hasRole ? 'PASS' : 'FAIL'));
            } catch (\Exception $e) {
                $this->error("     hasRole ERROR: " . $e->getMessage());
            }
        }
        
        // Step 2: Check recent donations and their authorization
        $this->info("\n2. Checking recent donations:");
        $recentDonations = BookDonation::latest()->take(5)->get();
        
        foreach ($recentDonations as $donation) {
            $this->line("   Donation ID: {$donation->id}");
            $this->line("   Donor ID: {$donation->donor_id}");
            $this->line("   Status: {$donation->status}");
            
            $user = User::find($donation->donor_id);
            if ($user) {
                $this->line("   User: {$user->name} ({$user->email})");
                
                // Test authorization logic from DonationController
                try {
                    $isAdmin = $user->hasRole('Admin');
                    $isOwner = $donation->donor_id === $user->id;
                    $shouldHaveAccess = $isAdmin || $isOwner;
                    
                    $this->line("   Is Admin: " . ($isAdmin ? 'YES' : 'NO'));
                    $this->line("   Is Owner: " . ($isOwner ? 'YES' : 'NO'));
                    $this->line("   Should have access: " . ($shouldHaveAccess ? 'YES' : 'NO'));
                    
                    if (!$shouldHaveAccess) {
                        $this->error("   ⚠️  POTENTIAL 403 ISSUE!");
                    }
                } catch (\Exception $e) {
                    $this->error("   ⚠️  Authorization test failed: " . $e->getMessage());
                }
            } else {
                $this->error("   ⚠️  User not found for donor_id: {$donation->donor_id}");
            }
            $this->line("");
        }
        
        // Step 3: Check cache issues
        $this->info("\n3. Checking cache status:");
        try {
            $cacheKey = 'spatie.permission.cache';
            $cacheExists = Cache::has($cacheKey);
            $this->line("   Permission cache exists: " . ($cacheExists ? 'YES' : 'NO'));
            
            if ($cacheExists) {
                $cacheData = Cache::get($cacheKey);
                $this->line("   Cache entries: " . (is_array($cacheData) ? count($cacheData) : 'Invalid format'));
            }
        } catch (\Exception $e) {
            $this->error("   Cache check failed: " . $e->getMessage());
        }
        
        // Step 4: Check for users who made donations without proper role assignment
        $this->info("\n4. Checking for donation without proper role:");
        $problemUsers = [];
        
        $allDonations = BookDonation::all();
        foreach ($allDonations as $donation) {
            $user = User::find($donation->donor_id);
            if ($user) {
                try {
                    if (!$user->hasRole('Donatur Buku') && !$user->hasRole('Admin')) {
                        $problemUsers[] = $user;
                        $this->line("   ⚠️  {$user->name} ({$user->email}) has donations but no proper role");
                    }
                } catch (\Exception $e) {
                    $this->error("   ⚠️  Error checking {$user->name}: " . $e->getMessage());
                    $problemUsers[] = $user;
                }
            }
        }
        
        // Step 5: Fix issues if requested
        if ($shouldFix && !empty($problemUsers)) {
            $this->info("\n5. Fixing role assignments:");
            
            foreach ($problemUsers as $user) {
                try {
                    $user->assignRole('Donatur Buku');
                    $this->line("   ✓ Assigned 'Donatur Buku' role to {$user->name}");
                } catch (\Exception $e) {
                    $this->error("   ✗ Failed to assign role to {$user->name}: " . $e->getMessage());
                }
            }
            
            // Clear caches after fixing
            $this->info("\n6. Clearing caches:");
            try {
                Artisan::call('permission:cache-reset');
                $this->line("   ✓ Permission cache cleared");
            } catch (\Exception $e) {
                $this->error("   ✗ Error clearing permission cache: " . $e->getMessage());
            }
            
            try {
                Artisan::call('cache:clear');
                $this->line("   ✓ Application cache cleared");
            } catch (\Exception $e) {
                $this->error("   ✗ Error clearing application cache: " . $e->getMessage());
            }
        }
        
        // Step 6: Test routes with middleware
        $this->info("\n7. Route middleware check:");
        $this->line("   Donation routes should have: ['auth', 'role:Donatur Buku']");
        $this->line("   Check these routes for 403 issues:");
        $this->line("   - POST /donations (store)");
        $this->line("   - GET /donations/{donation} (show)");
        $this->line("   - GET /donations/{donation}/books (getBooks)");
        $this->line("   - GET /donations/{donation}/edit (edit)");
        $this->line("   - PUT /donations/{donation} (update)");
        
        // Summary
        $this->info("\n=== SUMMARY ===");
        if (!empty($problemUsers)) {
            $this->warn("Found " . count($problemUsers) . " users with role issues");
            if ($shouldFix) {
                $this->info("Role issues have been fixed");
            } else {
                $this->warn("Run with --fix to automatically assign missing roles");
            }
        } else {
            $this->info("No role assignment issues found");
        }
        
        $this->info("\n=== RECOMMENDED ACTIONS FOR PRODUCTION ===");
        $this->line("1. Run: php artisan debug:production-donation-403 --fix");
        $this->line("2. Run: php artisan permission:cache-reset");
        $this->line("3. Run: php artisan cache:clear");
        $this->line("4. Run: php artisan config:clear");
        $this->line("5. Check file permissions on storage/framework/cache");
        $this->line("6. Restart web server if possible");
        
        return 0;
    }
}
