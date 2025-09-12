<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BookDonation;
use Illuminate\Support\Facades\DB;

class FixDonationTypeMismatch extends Command
{
    protected $signature = 'fix:donation-type-mismatch {--dry-run}';
    protected $description = 'Fix type mismatch issues in donation donor_id field';

    public function handle()
    {
        $isDryRun = $this->option('dry-run');
        
        $this->info('=== FIXING DONATION TYPE MISMATCH ===');
        
        if ($isDryRun) {
            $this->warn('DRY RUN MODE - No changes will be made');
        }
        
        // Step 1: Check current data types
        $this->info("\n1. Checking current data types:");
        
        $donations = BookDonation::all();
        $issues = [];
        
        foreach ($donations as $donation) {
            $donorIdType = gettype($donation->donor_id);
            $donorIdValue = $donation->donor_id;
            
            $this->line("   Donation ID: {$donation->id}");
            $this->line("   donor_id: {$donorIdValue} (type: {$donorIdType})");
            
            // Check if it's string when should be integer
            if ($donorIdType === 'string' && is_numeric($donorIdValue)) {
                $this->error("   ⚠️  Type issue detected! donor_id is string but should be integer");
                $issues[] = $donation;
            }
            
            // Check user existence
            $user = \App\Models\User::find($donorIdValue);
            if ($user) {
                $userIdType = gettype($user->id);
                $this->line("   User ID: {$user->id} (type: {$userIdType})");
                
                // Test comparison
                $strictEqual = $donation->donor_id === $user->id;
                $looseEqual = $donation->donor_id == $user->id;
                
                $this->line("   Strict comparison (===): " . ($strictEqual ? 'TRUE' : 'FALSE'));
                $this->line("   Loose comparison (==): " . ($looseEqual ? 'TRUE' : 'FALSE'));
                
                if (!$strictEqual && $looseEqual) {
                    $this->error("   ⚠️  Type mismatch causing authorization failure!");
                    $issues[] = $donation;
                }
            } else {
                $this->error("   ⚠️  User not found for donor_id: {$donorIdValue}");
            }
            
            $this->line("");
        }
        
        // Step 2: Fix issues if found
        if (!empty($issues)) {
            $this->info("\n2. Found " . count($issues) . " donations with type issues");
            
            if (!$isDryRun) {
                if ($this->confirm('Do you want to fix these type mismatches?')) {
                    foreach ($issues as $donation) {
                        try {
                            // Force cast to integer
                            $donation->donor_id = (int) $donation->donor_id;
                            $donation->save();
                            
                            $this->line("   ✓ Fixed donation ID: {$donation->id}");
                        } catch (\Exception $e) {
                            $this->error("   ✗ Failed to fix donation ID {$donation->id}: " . $e->getMessage());
                        }
                    }
                }
            } else {
                $this->warn("   Run without --dry-run to fix these issues");
            }
        } else {
            $this->info("\n2. No type mismatch issues found");
        }
        
        // Step 3: Check database schema
        $this->info("\n3. Checking database schema:");
        try {
            $tableInfo = DB::select("DESCRIBE book_donations");
            foreach ($tableInfo as $column) {
                if ($column->Field === 'donor_id') {
                    $this->line("   donor_id column type: {$column->Type}");
                    $this->line("   Null allowed: {$column->Null}");
                    $this->line("   Default: " . ($column->Default ?? 'NULL'));
                    
                    if (strpos(strtolower($column->Type), 'varchar') !== false || 
                        strpos(strtolower($column->Type), 'text') !== false) {
                        $this->error("   ⚠️  donor_id is text type! Should be integer/bigint");
                    }
                }
            }
        } catch (\Exception $e) {
            $this->error("   Schema check failed: " . $e->getMessage());
        }
        
        // Step 4: Test after fix
        if (!$isDryRun && !empty($issues)) {
            $this->info("\n4. Testing after fix:");
            
            foreach ($issues as $donation) {
                $donation->refresh();
                $user = \App\Models\User::find($donation->donor_id);
                
                if ($user) {
                    $strictEqual = $donation->donor_id === $user->id;
                    $this->line("   Donation {$donation->id}: " . ($strictEqual ? 'FIXED' : 'STILL BROKEN'));
                }
            }
        }
        
        $this->info("\n=== TYPE MISMATCH FIX COMPLETED ===");
        
        if (!empty($issues) && $isDryRun) {
            $this->warn("\nFound issues. Run without --dry-run to fix them.");
        }
        
        return 0;
    }
}
