<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\BookDonation;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Artisan;

class AssignDonatorsRole extends Command
{
    protected $signature = 'fix:assign-donators-role {--dry-run}';
    protected $description = 'Assign Donatur Buku role to users who have made donations but dont have the role';

    public function handle()
    {
        $this->info('=== ASSIGNING DONATOR ROLES ===');
        
        $isDryRun = $this->option('dry-run');
        if ($isDryRun) {
            $this->warn('DRY RUN MODE - No changes will be made');
        }
        
        // Check if Donatur Buku role exists
        $donatursRole = Role::where('name', 'Donatur Buku')->first();
        if (!$donatursRole) {
            $this->error('Role "Donatur Buku" not found! Please run RolePermissionSeeder first.');
            return 1;
        }
        
        // Find users who have donations but no Donatur Buku role
        $this->info("\n1. Finding users with donations but no 'Donatur Buku' role...");
        
        $usersWithDonations = User::whereHas('bookDonations')->get();
        $usersToFix = [];
        
        foreach ($usersWithDonations as $user) {
            try {
                if (!$user->hasRole('Donatur Buku')) {
                    $usersToFix[] = $user;
                    $donationCount = $user->bookDonations()->count();
                    $this->line("   - {$user->name} ({$user->email}) - {$donationCount} donations");
                }
            } catch (\Exception $e) {
                $this->error("   ✗ Error checking {$user->name}: " . $e->getMessage());
            }
        }
        
        if (empty($usersToFix)) {
            $this->info('   ✓ No users need role assignment');
            return 0;
        }
        
        $this->info("\n2. Found " . count($usersToFix) . " users to fix");
        
        if (!$isDryRun) {
            if (!$this->confirm('Do you want to assign the "Donatur Buku" role to these users?')) {
                $this->info('Operation cancelled.');
                return 0;
            }
        }
        
        // Assign roles
        $this->info("\n3. Assigning roles...");
        $successCount = 0;
        $errorCount = 0;
        
        foreach ($usersToFix as $user) {
            try {
                if (!$isDryRun) {
                    $user->assignRole('Donatur Buku');
                }
                $this->line("   ✓ Assigned role to {$user->name}");
                $successCount++;
            } catch (\Exception $e) {
                $this->error("   ✗ Failed to assign role to {$user->name}: " . $e->getMessage());
                $errorCount++;
            }
        }
        
        // Summary
        $this->info("\n=== SUMMARY ===");
        if ($isDryRun) {
            $this->line("Would assign role to {$successCount} users");
        } else {
            $this->line("Successfully assigned role to {$successCount} users");
        }
        
        if ($errorCount > 0) {
            $this->error("Failed to assign role to {$errorCount} users");
        }
        
        // Check for users without any donations who have the role
        $this->info("\n4. Checking for users with 'Donatur Buku' role but no donations...");
        $usersWithRoleNoDonations = User::role('Donatur Buku')
            ->whereDoesntHave('bookDonations')
            ->get();
            
        if ($usersWithRoleNoDonations->count() > 0) {
            $this->warn("Found " . $usersWithRoleNoDonations->count() . " users with role but no donations:");
            foreach ($usersWithRoleNoDonations as $user) {
                $this->line("   - {$user->name} ({$user->email})");
            }
        } else {
            $this->line("   ✓ All users with 'Donatur Buku' role have donations");
        }
        
        if (!$isDryRun) {
            $this->info("\n5. Clearing permission cache...");
            try {
                Artisan::call('permission:cache-reset');
                $this->line('   ✓ Permission cache cleared');
            } catch (\Exception $e) {
                $this->error("   ✗ Error clearing permission cache: " . $e->getMessage());
            }
        }
        
        $this->info("\n=== COMPLETED ===");
        return 0;
    }
}
