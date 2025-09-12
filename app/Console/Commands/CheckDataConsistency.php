<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\BookDonation;

class CheckDataConsistency extends Command
{
    protected $signature = 'debug:data-consistency';
    protected $description = 'Check data consistency between users and donations';

    public function handle()
    {
        $this->info('=== CHECKING DATA CONSISTENCY ===');
        
        // Step 1: Check all users and their IDs
        $this->info("\n1. All users in database:");
        $users = User::all();
        foreach ($users as $user) {
            $this->line("   ID: {$user->id} - {$user->name} ({$user->email})");
            try {
                $roles = $user->getRoleNames()->implode(', ');
                $this->line("     Roles: {$roles}");
            } catch (\Exception $e) {
                $this->error("     Role error: " . $e->getMessage());
            }
        }
        
        // Step 2: Check all donations and their donor_ids
        $this->info("\n2. All donations in database:");
        $donations = BookDonation::all();
        foreach ($donations as $donation) {
            $this->line("   Donation ID: {$donation->id}");
            $this->line("   Donor ID: {$donation->donor_id}");
            $this->line("   Donor Name: {$donation->donor_name}");
            $this->line("   Donor Email: {$donation->donor_email}");
            
            // Check if user exists
            $user = User::find($donation->donor_id);
            if ($user) {
                $this->line("   ✓ User found: {$user->name} ({$user->email})");
                
                // Check if emails match
                if ($user->email === $donation->donor_email) {
                    $this->line("   ✓ Email matches");
                } else {
                    $this->error("   ✗ Email mismatch!");
                    $this->line("     User email: {$user->email}");
                    $this->line("     Donation email: {$donation->donor_email}");
                }
            } else {
                $this->error("   ✗ User NOT found for donor_id: {$donation->donor_id}");
                
                // Try to find by email
                $userByEmail = User::where('email', $donation->donor_email)->first();
                if ($userByEmail) {
                    $this->line("   ! But user exists with email: {$userByEmail->name} (ID: {$userByEmail->id})");
                }
            }
            $this->line("");
        }
        
        // Step 3: Check for specific production issue
        $this->info("\n3. Checking specific production issue:");
        $this->line("Looking for user: donatur@example.com");
        
        $donatorsUser = User::where('email', 'donatur@example.com')->first();
        if ($donatorsUser) {
            $this->line("   User found: {$donatorsUser->name} (ID: {$donatorsUser->id})");
            
            // Check their donations
            $userDonations = BookDonation::where('donor_email', 'donatur@example.com')->get();
            $this->line("   Donations with this email: " . $userDonations->count());
            
            foreach ($userDonations as $donation) {
                $this->line("   - Donation ID: {$donation->id}, donor_id: {$donation->donor_id}");
                if ($donation->donor_id == $donatorsUser->id) {
                    $this->line("     ✓ Ownership correct");
                } else {
                    $this->error("     ✗ Ownership mismatch! Should be {$donatorsUser->id}");
                }
            }
        } else {
            $this->error("   User not found with email: donatur@example.com");
        }
        
        // Step 4: Summary and recommendations
        $this->info("\n=== SUMMARY ===");
        
        $totalUsers = User::count();
        $totalDonations = BookDonation::count();
        
        $this->line("Total users: {$totalUsers}");
        $this->line("Total donations: {$totalDonations}");
        
        // Check for orphaned donations
        $orphanedDonations = BookDonation::whereNotIn('donor_id', User::pluck('id'))->count();
        if ($orphanedDonations > 0) {
            $this->error("Orphaned donations (no matching user): {$orphanedDonations}");
        }
        
        // Check for email mismatches
        $emailMismatches = 0;
        foreach (BookDonation::all() as $donation) {
            $user = User::find($donation->donor_id);
            if ($user && $user->email !== $donation->donor_email) {
                $emailMismatches++;
            }
        }
        
        if ($emailMismatches > 0) {
            $this->error("Email mismatches: {$emailMismatches}");
        }
        
        if ($orphanedDonations > 0 || $emailMismatches > 0) {
            $this->warn("\nRecommended action:");
            $this->line("php artisan fix:donation-ownership --dry-run");
            $this->line("php artisan fix:donation-ownership");
        } else {
            $this->info("✓ Data consistency looks good!");
        }
        
        return 0;
    }
}
