<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CheckProductionRoles extends Command
{
    protected $signature = 'debug:check-production-roles';
    protected $description = 'Check user roles and permissions in production';

    public function handle()
    {
        $this->info('=== PRODUCTION ROLE DEBUG ===');
        
        // Check all roles
        $this->info("\n1. All available roles:");
        $roles = Role::all();
        foreach ($roles as $role) {
            $this->line("   - {$role->name} (ID: {$role->id})");
        }
        
        // Check users with Donatur Buku role
        $this->info("\n2. Users with 'Donatur Buku' role:");
        $donaturs = User::role('Donatur Buku')->get();
        if ($donaturs->count() > 0) {
            foreach ($donaturs as $user) {
                $this->line("   - {$user->name} (ID: {$user->id}, Email: {$user->email})");
                $this->line("     Roles: " . $user->getRoleNames()->implode(', '));
            }
        } else {
            $this->error("   No users found with 'Donatur Buku' role!");
        }
        
        // Check last donation
        $this->info("\n3. Recent donations:");
        $donations = \App\Models\BookDonation::latest()->take(3)->get();
        foreach ($donations as $donation) {
            $user = User::find($donation->donor_id);
            $this->line("   - Donation ID: {$donation->id}, Donor ID: {$donation->donor_id}");
            if ($user) {
                $this->line("     User: {$user->name}, Roles: " . $user->getRoleNames()->implode(', '));
            } else {
                $this->error("     User not found for donor_id: {$donation->donor_id}");
            }
        }
        
        // Check role assignments for specific problem users
        $this->info("\n4. Check problematic users (if any):");
        // You can add specific user emails here if you know them
        $problemEmails = [
            // Add emails that are having issues
        ];
        
        foreach ($problemEmails as $email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $this->line("   - {$user->name} ({$user->email}):");
                $this->line("     Roles: " . $user->getRoleNames()->implode(', '));
                $this->line("     Has 'Donatur Buku' role: " . ($user->hasRole('Donatur Buku') ? 'YES' : 'NO'));
            }
        }
        
        $this->info("\n=== END DEBUG ===");
        return 0;
    }
}
