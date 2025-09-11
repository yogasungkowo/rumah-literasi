<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class FixUserRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:user-roles {email?} {--clear-cache} {--assign-role=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix user roles and clear permission cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $clearCache = $this->option('clear-cache');
        $assignRole = $this->option('assign-role');
        
        $this->info('=== FIXING USER ROLES ===');
        $this->newLine();
        
        // Clear permission cache if requested
        if ($clearCache) {
            $this->info('Clearing permission cache...');
            app()[PermissionRegistrar::class]->forgetCachedPermissions();
            $this->info('✓ Permission cache cleared');
            $this->newLine();
        }
        
        if ($email) {
            $user = User::where('email', $email)->first();
            
            if (!$user) {
                $this->error("User with email '{$email}' not found!");
                return 1;
            }
            
            $this->info("Processing user: {$user->email}");
            
            // Assign role if specified
            if ($assignRole) {
                $role = Role::where('name', $assignRole)->first();
                
                if (!$role) {
                    $this->error("Role '{$assignRole}' not found!");
                    
                    $this->info('Available roles:');
                    $roles = Role::all();
                    foreach ($roles as $r) {
                        $this->line("- {$r->name}");
                    }
                    
                    return 1;
                }
                
                // Remove all existing roles first
                $user->roles()->detach();
                $this->info("✓ Removed all existing roles");
                
                // Assign new role
                $user->assignRole($assignRole);
                $this->info("✓ Assigned role: {$assignRole}");
                
                // Clear cache again after role assignment
                app()[PermissionRegistrar::class]->forgetCachedPermissions();
                $this->info("✓ Cache cleared after role assignment");
                
                // Verify assignment
                $user->refresh();
                if ($user->hasRole($assignRole)) {
                    $this->info("✓ Role assignment verified!");
                } else {
                    $this->error("✗ Role assignment failed!");
                }
            }
            
            $this->newLine();
            $this->info("Current user roles:");
            foreach ($user->roles as $role) {
                $this->line("- {$role->name}");
            }
            
        } else {
            // General fixes
            $this->info('Running general fixes...');
            
            // Check for users without proper roles who should be donatur
            $usersWithoutRoles = User::doesntHave('roles')->get();
            
            if ($usersWithoutRoles->count() > 0) {
                $this->info("Found {$usersWithoutRoles->count()} users without roles:");
                
                foreach ($usersWithoutRoles as $user) {
                    $this->line("- {$user->email} ({$user->name})");
                }
                
                if ($this->confirm('Would you like to assign "Donatur Buku" role to users without roles?')) {
                    $donaturRole = Role::where('name', 'Donatur Buku')->first();
                    
                    if ($donaturRole) {
                        foreach ($usersWithoutRoles as $user) {
                            $user->assignRole('Donatur Buku');
                            $this->info("✓ Assigned 'Donatur Buku' role to: {$user->email}");
                        }
                    } else {
                        $this->error("'Donatur Buku' role not found! Please run RolePermissionSeeder first.");
                    }
                }
            } else {
                $this->info('✓ All users have roles assigned');
            }
        }
        
        $this->newLine();
        $this->info('=== SUMMARY ===');
        $this->info('Users by role:');
        
        $roles = Role::withCount('users')->get();
        foreach ($roles as $role) {
            $this->line("- {$role->name}: {$role->users_count} users");
        }
        
        $usersWithoutRoles = User::doesntHave('roles')->count();
        if ($usersWithoutRoles > 0) {
            $this->warn("- No role: {$usersWithoutRoles} users");
        }
        
        return 0;
    }
}
