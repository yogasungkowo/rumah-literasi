<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\BookDonation;

class FixDonationOwnership extends Command
{
    protected $signature = 'fix:donation-ownership {--dry-run} {--force}';
    protected $description = 'Fix donation ownership mismatches between users and book_donations';

    public function handle()
    {
        $this->info('=== FIXING DONATION OWNERSHIP ISSUES ===');
        
        $isDryRun = $this->option('dry-run');
        $force = $this->option('force');
        
        if ($isDryRun) {
            $this->warn('DRY RUN MODE - No changes will be made');
        }
        
        // Step 1: Find ownership mismatches
        $this->info("\n1. Finding donation ownership mismatches...");
        
        $donations = BookDonation::all();
        $mismatches = [];
        
        foreach ($donations as $donation) {
            $this->line("   Checking Donation ID: {$donation->id}");
            $this->line("   Donor ID in donation: {$donation->donor_id}");
            $this->line("   Donor email in donation: {$donation->donor_email}");
            
            // Try to find user by email first
            $userByEmail = User::where('email', $donation->donor_email)->first();
            
            if ($userByEmail) {
                $this->line("   User found by email: {$userByEmail->name} (ID: {$userByEmail->id})");
                
                if ($userByEmail->id != $donation->donor_id) {
                    $this->error("   ⚠️  MISMATCH FOUND!");
                    $this->line("   Expected donor_id: {$userByEmail->id}");
                    $this->line("   Current donor_id: {$donation->donor_id}");
                    
                    $mismatches[] = [
                        'donation' => $donation,
                        'correct_user' => $userByEmail,
                        'issue' => 'donor_id_mismatch'
                    ];
                }
            } else {
                // User not found by email - check if donor_id exists
                $userById = User::find($donation->donor_id);
                if (!$userById) {
                    $this->error("   ⚠️  ORPHANED DONATION! No user found with ID {$donation->donor_id}");
                    $mismatches[] = [
                        'donation' => $donation,
                        'correct_user' => null,
                        'issue' => 'orphaned_donation'
                    ];
                } else {
                    $this->line("   User found by ID: {$userById->name} ({$userById->email})");
                    if ($userById->email != $donation->donor_email) {
                        $this->error("   ⚠️  EMAIL MISMATCH!");
                        $this->line("   User email: {$userById->email}");
                        $this->line("   Donation email: {$donation->donor_email}");
                        
                        $mismatches[] = [
                            'donation' => $donation,
                            'correct_user' => $userById,
                            'issue' => 'email_mismatch'
                        ];
                    }
                }
            }
            
            $this->line("");
        }
        
        if (empty($mismatches)) {
            $this->info("   ✓ No ownership mismatches found");
            return 0;
        }
        
        // Step 2: Show all mismatches
        $this->info("\n2. Found " . count($mismatches) . " ownership issues:");
        
        foreach ($mismatches as $index => $mismatch) {
            $donation = $mismatch['donation'];
            $user = $mismatch['correct_user'];
            $issue = $mismatch['issue'];
            
            $this->line("\n   Issue #" . ($index + 1) . " ({$issue}):");
            $this->line("   Donation ID: {$donation->id}");
            $this->line("   Current donor_id: {$donation->donor_id}");
            $this->line("   Donation email: {$donation->donor_email}");
            
            if ($user) {
                $this->line("   Correct user: {$user->name} (ID: {$user->id}, Email: {$user->email})");
            } else {
                $this->line("   No matching user found");
            }
        }
        
        // Step 3: Fix issues
        if (!$isDryRun) {
            if (!$force && !$this->confirm("\nDo you want to fix these ownership issues?")) {
                $this->info('Operation cancelled.');
                return 0;
            }
            
            $this->info("\n3. Fixing ownership issues...");
            
            foreach ($mismatches as $index => $mismatch) {
                $donation = $mismatch['donation'];
                $user = $mismatch['correct_user'];
                $issue = $mismatch['issue'];
                
                $this->line("\n   Fixing issue #" . ($index + 1) . " ({$issue}):");
                
                try {
                    if ($issue === 'donor_id_mismatch' && $user) {
                        // Fix donor_id to match the user found by email
                        $donation->update(['donor_id' => $user->id]);
                        $this->line("   ✓ Updated donor_id from {$donation->donor_id} to {$user->id}");
                        
                    } elseif ($issue === 'email_mismatch' && $user) {
                        // Update donation email to match user email
                        $donation->update(['donor_email' => $user->email]);
                        $this->line("   ✓ Updated donor_email to {$user->email}");
                        
                    } elseif ($issue === 'orphaned_donation') {
                        // For orphaned donations, we can either:
                        // 1. Create a new user based on donation data
                        // 2. Delete the donation
                        // 3. Assign to a default user
                        
                        $this->warn("   ! Orphaned donation - manual intervention needed");
                        $this->line("   Consider creating user for: {$donation->donor_email}");
                        
                        // Optionally create user:
                        if ($this->confirm("   Create new user for {$donation->donor_email}?")) {
                            $newUser = User::create([
                                'name' => $donation->donor_name,
                                'email' => $donation->donor_email,
                                'password' => bcrypt('password'), // Default password
                            ]);
                            
                            $newUser->assignRole('Donatur Buku');
                            
                            $donation->update(['donor_id' => $newUser->id]);
                            
                            $this->line("   ✓ Created new user and assigned donation");
                            $this->warn("   ! New user password is 'password' - user should change it");
                        }
                    }
                    
                } catch (\Exception $e) {
                    $this->error("   ✗ Error fixing issue: " . $e->getMessage());
                }
            }
        }
        
        // Step 4: Verify fixes
        if (!$isDryRun) {
            $this->info("\n4. Verifying fixes...");
            
            foreach ($mismatches as $mismatch) {
                $donation = $mismatch['donation'];
                $donation->refresh();
                
                $user = User::find($donation->donor_id);
                if ($user && $user->email === $donation->donor_email) {
                    $this->line("   ✓ Donation ID {$donation->id} - ownership verified");
                } else {
                    $this->error("   ✗ Donation ID {$donation->id} - still has issues");
                }
            }
        }
        
        $this->info("\n=== OWNERSHIP FIX COMPLETED ===");
        
        if (!$isDryRun) {
            $this->info("\nNext steps:");
            $this->line("1. Run: php artisan permission:cache-reset");
            $this->line("2. Test donation access again");
        }
        
        return 0;
    }
}
