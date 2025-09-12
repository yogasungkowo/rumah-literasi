<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\BookDonation;
use Illuminate\Support\Facades\Auth;

class Debug403Specific extends Command
{
    protected $signature = 'debug:403-specific {email=donatur@example.com}';
    protected $description = 'Debug specific 403 issue with detailed testing';

    public function handle()
    {
        $email = $this->argument('email');
        $this->info("=== DEBUGGING 403 FOR: {$email} ===");
        
        // Step 1: Get user
        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error("User not found: {$email}");
            return 1;
        }
        
        $this->info("\n1. User Information:");
        $this->line("   ID: {$user->id}");
        $this->line("   Name: {$user->name}");
        $this->line("   Email: {$user->email}");
        
        // Step 2: Check roles in detail
        $this->info("\n2. Role Check (Detailed):");
        try {
            $roles = $user->roles()->get();
            $this->line("   Direct roles count: " . $roles->count());
            foreach ($roles as $role) {
                $this->line("   - Role: {$role->name} (ID: {$role->id})");
            }
            
            $roleNames = $user->getRoleNames();
            $this->line("   Role names: " . $roleNames->implode(', '));
            
            $hasDonatursRole = $user->hasRole('Donatur Buku');
            $this->line("   Has 'Donatur Buku' role: " . ($hasDonatursRole ? 'YES' : 'NO'));
            
        } catch (\Exception $e) {
            $this->error("   ERROR getting roles: " . $e->getMessage());
        }
        
        // Step 3: Check user's donations
        $this->info("\n3. User's Donations:");
        $donations = BookDonation::where('donor_id', $user->id)->get();
        $this->line("   Total donations: " . $donations->count());
        
        foreach ($donations as $donation) {
            $this->line("   - Donation ID: {$donation->id}");
            $this->line("     Status: {$donation->status}");
            $this->line("     Created: " . $donation->created_at->format('Y-m-d H:i:s'));
            
            // Test authorization for this specific donation
            $this->testAuthorization($user, $donation);
        }
        
        // Step 4: Check email-based donations (might be the issue)
        $this->info("\n4. Email-based Donations Check:");
        $emailDonations = BookDonation::where('donor_email', $email)->get();
        $this->line("   Donations with this email: " . $emailDonations->count());
        
        foreach ($emailDonations as $donation) {
            $this->line("   - Donation ID: {$donation->id}, donor_id: {$donation->donor_id}");
            
            if ($donation->donor_id != $user->id) {
                $this->error("   ⚠️  MISMATCH! donation.donor_id ({$donation->donor_id}) != user.id ({$user->id})");
                $this->line("   This could cause 403 errors!");
                
                // Try to find the user with donor_id
                $donorUser = User::find($donation->donor_id);
                if ($donorUser) {
                    $this->line("   donor_id points to: {$donorUser->name} ({$donorUser->email})");
                } else {
                    $this->error("   donor_id points to non-existent user!");
                }
            } else {
                $this->line("   ✓ donor_id matches user.id");
            }
        }
        
        // Step 5: Simulate middleware check
        $this->info("\n5. Middleware Simulation:");
        try {
            $hasDonatursRole = $user->hasRole('Donatur Buku');
            $this->line("   'role:Donatur Buku' check: " . ($hasDonatursRole ? 'PASS' : 'FAIL'));
            
            if (!$hasDonatursRole) {
                $this->error("   ⚠️  This user would be blocked by middleware!");
            }
        } catch (\Exception $e) {
            $this->error("   ERROR in middleware simulation: " . $e->getMessage());
        }
        
        // Step 6: Test specific routes
        $this->info("\n6. Route Authorization Test:");
        foreach ($donations as $donation) {
            $this->line("   Testing donation ID: {$donation->id}");
            
            // Test show route authorization
            $canShow = $this->canAccessDonation($user, $donation);
            $this->line("   - Can show: " . ($canShow ? 'YES' : 'NO'));
            
            // Test edit route authorization  
            $canEdit = $this->canEditDonation($user, $donation);
            $this->line("   - Can edit: " . ($canEdit ? 'YES' : 'NO'));
        }
        
        return 0;
    }
    
    private function testAuthorization($user, $donation)
    {
        $this->line("     Authorization test:");
        
        try {
            $isAdmin = $user->hasRole('Admin');
            $isOwner = $donation->donor_id === $user->id;
            $shouldHaveAccess = $isAdmin || $isOwner;
            
            $this->line("     - Is Admin: " . ($isAdmin ? 'YES' : 'NO'));
            $this->line("     - Is Owner: " . ($isOwner ? 'YES' : 'NO'));
            $this->line("     - Should have access: " . ($shouldHaveAccess ? 'YES' : 'NO'));
            
            if (!$shouldHaveAccess) {
                $this->error("     ⚠️  AUTHORIZATION FAILED!");
            }
        } catch (\Exception $e) {
            $this->error("     ERROR: " . $e->getMessage());
        }
    }
    
    private function canAccessDonation($user, $donation)
    {
        // Replicate DonationController logic
        try {
            return $user->hasRole('Admin') || $donation->donor_id === $user->id;
        } catch (\Exception $e) {
            return false;
        }
    }
    
    private function canEditDonation($user, $donation)
    {
        // Replicate DonationController edit logic
        try {
            return ($donation->donor_id === $user->id || $user->hasRole('Admin')) && $donation->status === 'pending';
        } catch (\Exception $e) {
            return false;
        }
    }
}
