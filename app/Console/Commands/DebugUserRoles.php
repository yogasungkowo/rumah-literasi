<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DebugUserRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:user-roles {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug user roles and permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        $this->info('=== USER ROLES DEBUG ===');
        $this->newLine();
        
        // Show all available roles
        $this->info('Available Roles:');
        $roles = Role::all();
        foreach ($roles as $role) {
            $this->line("- {$role->name} (ID: {$role->id})");
        }
        $this->newLine();
        
        // Show all permissions
        $this->info('Available Permissions:');
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $this->line("- {$permission->name}");
        }
        $this->newLine();
        
        if ($email) {
            // Debug specific user
            $user = User::where('email', $email)->first();
            
            if (!$user) {
                $this->error("User with email '{$email}' not found!");
                return 1;
            }
            
            $this->info("User Details for: {$user->email}");
            $this->line("Name: {$user->name}");
            $this->line("ID: {$user->id}");
            $this->newLine();
            
            $this->info("User Roles:");
            $userRoles = $user->roles;
            if ($userRoles->isEmpty()) {
                $this->warn("No roles assigned to this user!");
            } else {
                foreach ($userRoles as $role) {
                    $this->line("- {$role->name} (ID: {$role->id})");
                }
            }
            $this->newLine();
            
            $this->info("User Permissions (via roles):");
            $userPermissions = $user->getAllPermissions();
            if ($userPermissions->isEmpty()) {
                $this->warn("No permissions found for this user!");
            } else {
                foreach ($userPermissions as $permission) {
                    $this->line("- {$permission->name}");
                }
            }
            $this->newLine();
            
            // Test specific role checks
            $this->info("Role Checks:");
            $rolesToCheck = ['Admin', 'Donatur Buku', 'Investor', 'Relawan', 'Peserta Pelatihan'];
            foreach ($rolesToCheck as $role) {
                $hasRole = $user->hasRole($role);
                $status = $hasRole ? '✓' : '✗';
                $this->line("{$status} {$role}: " . ($hasRole ? 'YES' : 'NO'));
            }
            $this->newLine();
            
            // Test specific permissions
            $this->info("Permission Checks:");
            $permissionsToCheck = ['donate books', 'view own donations', 'manage own donations'];
            foreach ($permissionsToCheck as $permission) {
                $hasPermission = $user->can($permission);
                $status = $hasPermission ? '✓' : '✗';
                $this->line("{$status} {$permission}: " . ($hasPermission ? 'YES' : 'NO'));
            }
        } else {
            // Show all users and their roles
            $this->info('All Users and Their Roles:');
            $users = User::with('roles')->get();
            
            foreach ($users as $user) {
                $roles = $user->roles->pluck('name')->join(', ');
                $roles = $roles ?: 'No roles';
                $this->line("{$user->email} ({$user->name}): {$roles}");
            }
        }
        
        $this->newLine();
        $this->info('Cache info:');
        $cacheKey = config('permission.cache.key');
        $this->line("Cache key: {$cacheKey}");
        
        return 0;
    }
}
