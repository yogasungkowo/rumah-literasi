<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\BookDonation;
use Illuminate\Support\Facades\Auth;

class Debug403Issue extends Command
{
    protected $signature = 'debug:403-issue {user_email?}';
    protected $description = 'Debug 403 unauthorized issues for donation users';

    public function handle()
    {
        $this->info('=== DEBUGGING 403 UNAUTHORIZED ISSUE ===');
        
        $userEmail = $this->argument('user_email');
        
        if ($userEmail) {
            $this->debugSpecificUser($userEmail);
        } else {
            $this->debugGeneralIssues();
        }
        
        return 0;
    }
    
    private function debugSpecificUser($email)
    {
        $this->info("\nDebugging specific user: {$email}");
        
        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error("User not found with email: {$email}");
            return;
        }
        
        $this->line("User ID: {$user->id}");
        $this->line("User Name: {$user->name}");
        $this->line("User Email: {$user->email}");
        
        // Check roles
        $this->info("\nRole Information:");
        try {
            $roles = $user->getRoleNames();
            $this->line("Roles: " . $roles->implode(', '));
            $this->line("Has 'Donatur Buku' role: " . ($user->hasRole('Donatur Buku') ? 'YES' : 'NO'));
        } catch (\Exception $e) {
            $this->error("Error getting roles: " . $e->getMessage());
        }
        
        // Check user's donations
        $this->info("\nUser's Donations:");
        $donations = BookDonation::where('donor_id', $user->id)->get();
        $this->line("Total donations: " . $donations->count());
        
        foreach ($donations as $donation) {
            $this->line("  - Donation ID: {$donation->id}, Status: {$donation->status}");
            
            // Test authorization for this donation
            $this->testDonationAuthorization($user, $donation);
        }
    }
    
    private function debugGeneralIssues()
    {
        $this->info("\nGeneral 403 Issue Debugging:");
        
        // Check middleware setup
        $this->info("\n1. Checking middleware configuration:");
        $this->line("   - 'role:Donatur Buku' middleware should be applied to donation routes");
        
        // Check recent 403 errors from donations
        $this->info("\n2. Recent donations that might have issues:");
        $recentDonations = BookDonation::latest()->take(5)->get();
        
        foreach ($recentDonations as $donation) {
            $user = User::find($donation->donor_id);
            if ($user) {
                $this->line("  - Donation ID: {$donation->id}");
                $this->line("    Donor: {$user->name} ({$user->email})");
                $this->line("    Status: {$donation->status}");
                
                try {
                    $hasRole = $user->hasRole('Donatur Buku');
                    $this->line("    Has Donatur Role: " . ($hasRole ? 'YES' : 'NO'));
                    
                    if (!$hasRole) {
                        $this->error("    ⚠️  POTENTIAL ISSUE: User doesn't have 'Donatur Buku' role!");
                    }
                } catch (\Exception $e) {
                    $this->error("    ⚠️  ERROR checking role: " . $e->getMessage());
                }
                
                $this->testDonationAuthorization($user, $donation);
                $this->line("");
            }
        }
        
        // Check for users who should have donatur role but don't
        $this->info("\n3. Users with donations but no 'Donatur Buku' role:");
        $usersWithDonations = User::whereHas('bookDonations')->get();
        
        foreach ($usersWithDonations as $user) {
            try {
                if (!$user->hasRole('Donatur Buku')) {
                    $this->line("  ⚠️  {$user->name} ({$user->email}) has donations but no 'Donatur Buku' role");
                    $donationCount = $user->bookDonations()->count();
                    $this->line("     Donations: {$donationCount}");
                }
            } catch (\Exception $e) {
                $this->error("  ⚠️  Error checking {$user->name}: " . $e->getMessage());
            }
        }
    }
    
    private function testDonationAuthorization($user, $donation)
    {
        $this->line("    Testing authorization:");
        
        // Test 1: Basic ownership check
        $isOwner = $donation->donor_id === $user->id;
        $this->line("      - Is owner: " . ($isOwner ? 'YES' : 'NO'));
        
        // Test 2: Admin check
        try {
            $isAdmin = $user->hasRole('Admin');
            $this->line("      - Is admin: " . ($isAdmin ? 'YES' : 'NO'));
        } catch (\Exception $e) {
            $this->line("      - Admin check failed: " . $e->getMessage());
        }
        
        // Test 3: Authorization result
        try {
            $hasRole = $user->hasRole('Admin');
            $shouldHaveAccess = $hasRole || $donation->donor_id === $user->id;
            $this->line("      - Should have access: " . ($shouldHaveAccess ? 'YES' : 'NO'));
            
            if (!$shouldHaveAccess) {
                $this->error("      ⚠️  AUTHORIZATION ISSUE DETECTED!");
            }
        } catch (\Exception $e) {
            $this->error("      ⚠️  Authorization test failed: " . $e->getMessage());
        }
    }
}
