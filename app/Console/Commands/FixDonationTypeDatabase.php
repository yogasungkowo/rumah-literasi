<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BookDonation;
use Illuminate\Support\Facades\DB;

class FixDonationTypeDatabase extends Command
{
    protected $signature = 'fix:donation-type-database';
    protected $description = 'Fix donation type issue at database level';

    public function handle()
    {
        $this->info('=== FIXING DONATION TYPE AT DATABASE LEVEL ===');
        
        // Step 1: Check current issue
        $this->info("\n1. Checking current issue:");
        $donation = BookDonation::find(1);
        if ($donation) {
            $this->line("   Donation ID: {$donation->id}");
            $this->line("   donor_id value: {$donation->donor_id}");
            $this->line("   donor_id type: " . gettype($donation->donor_id));
            
            // Check raw database value
            $raw = DB::select("SELECT donor_id FROM book_donations WHERE id = 1")[0];
            $this->line("   Raw DB value: {$raw->donor_id}");
            $this->line("   Raw DB type: " . gettype($raw->donor_id));
        }
        
        // Step 2: Fix via raw SQL
        $this->info("\n2. Fixing via raw SQL update:");
        try {
            // Get all donations that need fixing
            $brokenDonations = DB::select("
                SELECT id, donor_id 
                FROM book_donations 
                WHERE donor_id REGEXP '^[0-9]+$'
            ");
            
            $this->line("   Found " . count($brokenDonations) . " donations to fix");
            
            foreach ($brokenDonations as $record) {
                $intValue = (int) $record->donor_id;
                
                $updated = DB::update("
                    UPDATE book_donations 
                    SET donor_id = ? 
                    WHERE id = ?
                ", [$intValue, $record->id]);
                
                $this->line("   Fixed donation ID: {$record->id} (donor_id: {$record->donor_id} -> {$intValue})");
            }
            
        } catch (\Exception $e) {
            $this->error("   SQL fix failed: " . $e->getMessage());
        }
        
        // Step 3: Clear model cache
        $this->info("\n3. Clearing model cache:");
        try {
            // Clear any model attribute cache
            BookDonation::flushEventListeners();
            $this->line("   ✓ Model cache cleared");
        } catch (\Exception $e) {
            $this->error("   Model cache clear failed: " . $e->getMessage());
        }
        
        // Step 4: Test after fix
        $this->info("\n4. Testing after fix:");
        $donation = BookDonation::find(1);
        if ($donation) {
            $donation->refresh(); // Force reload from DB
            
            $this->line("   Donation ID: {$donation->id}");
            $this->line("   donor_id value: {$donation->donor_id}");
            $this->line("   donor_id type: " . gettype($donation->donor_id));
            
            $user = \App\Models\User::find($donation->donor_id);
            if ($user) {
                $strictEqual = $donation->donor_id === $user->id;
                $looseEqual = $donation->donor_id == $user->id;
                
                $this->line("   user.id: {$user->id} (type: " . gettype($user->id) . ")");
                $this->line("   Strict comparison (===): " . ($strictEqual ? 'TRUE' : 'FALSE'));
                $this->line("   Loose comparison (==): " . ($looseEqual ? 'TRUE' : 'FALSE'));
                
                if ($strictEqual) {
                    $this->info("   ✅ AUTHORIZATION NOW WORKS!");
                } else {
                    $this->error("   ❌ STILL BROKEN");
                }
            }
        }
        
        // Step 5: Check if we need to modify the model
        $this->info("\n5. Checking model configuration:");
        $casts = (new BookDonation())->getCasts();
        
        if (isset($casts['donor_id'])) {
            $this->line("   donor_id cast: " . $casts['donor_id']);
        } else {
            $this->warn("   donor_id has no cast defined");
            $this->line("   Recommendation: Add 'donor_id' => 'integer' to BookDonation model casts");
        }
        
        $this->info("\n=== DATABASE FIX COMPLETED ===");
        return 0;
    }
}
