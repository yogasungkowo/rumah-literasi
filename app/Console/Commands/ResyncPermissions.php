<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class ResyncPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:resync-permissions {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resync permissions to match RolePermissionSeeder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $force = $this->option('force');
        
        $this->info('=== RESYNCING PERMISSIONS ===');
        $this->newLine();
        
        if (!$force) {
            $this->warn('This will update permissions and role assignments!');
            if (!$this->confirm('Are you sure you want to continue?')) {
                $this->info('Operation cancelled.');
                return 0;
            }
        }
        
        // Clear permission cache
        $this->info('Clearing permission cache...');
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $this->info('✓ Permission cache cleared');
        $this->newLine();
        
        // Define the correct permissions (from RolePermissionSeeder)
        $correctPermissions = [
            // Admin permissions
            'manage users',
            'manage roles',
            'manage permissions',
            'manage trainings',
            'manage books',
            'manage donations',
            'manage sponsorships',
            'manage investors',
            'view admin dashboard',
            
            // Training permissions
            'view trainings',
            'register training',
            'manage own training registrations',
            
            // Book donation permissions
            'donate books',
            'view own donations',
            'manage own donations',
            
            // Investment permissions
            'create sponsorships',
            'manage own sponsorships',
            'view investment opportunities',
            
            // Volunteer permissions
            'volunteer for trainings',
            'manage volunteer activities',
            
            // General permissions
            'view profile',
            'edit own profile',
            'contact support',
        ];
        
        $this->info('Creating/updating permissions...');
        
        foreach ($correctPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
            $this->line("✓ {$permission}");
        }
        
        $this->newLine();
        $this->info('Updating role permissions...');
        
        // Admin Role
        $adminRole = Role::where('name', 'Admin')->first();
        if ($adminRole) {
            $adminRole->syncPermissions([
                'manage users',
                'manage roles',
                'manage permissions',
                'manage trainings',
                'manage books',
                'manage donations',
                'manage sponsorships',
                'manage investors',
                'view admin dashboard',
                'view trainings',
                'view profile',
                'edit own profile',
                'contact support',
            ]);
            $this->info('✓ Admin role permissions updated');
        }

        // Investor Role
        $investorRole = Role::where('name', 'Investor')->first();
        if ($investorRole) {
            $investorRole->syncPermissions([
                'create sponsorships',
                'manage own sponsorships',
                'view investment opportunities',
                'view profile',
                'edit own profile',
                'contact support',
            ]);
            $this->info('✓ Investor role permissions updated');
        }

        // Donatur Buku Role
        $donaturRole = Role::where('name', 'Donatur Buku')->first();
        if ($donaturRole) {
            $donaturRole->syncPermissions([
                'donate books',
                'view own donations',
                'manage own donations',
                'view profile',
                'edit own profile',
                'contact support',
            ]);
            $this->info('✓ Donatur Buku role permissions updated');
        }

        // Relawan Role
        $relawanRole = Role::where('name', 'Relawan')->first();
        if ($relawanRole) {
            $relawanRole->syncPermissions([
                'volunteer for trainings',
                'manage volunteer activities',
                'view trainings',
                'register training',
                'manage own training registrations',
                'view profile',
                'edit own profile',
                'contact support',
            ]);
            $this->info('✓ Relawan role permissions updated');
        }

        // Peserta Pelatihan Role
        $pesertaRole = Role::where('name', 'Peserta Pelatihan')->first();
        if ($pesertaRole) {
            $pesertaRole->syncPermissions([
                'view trainings',
                'register training',
                'manage own training registrations',
                'view profile',
                'edit own profile',
                'contact support',
            ]);
            $this->info('✓ Peserta Pelatihan role permissions updated');
        }
        
        // Clear cache again after updates
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $this->info('✓ Permission cache cleared after updates');
        
        $this->newLine();
        $this->info('=== VERIFICATION ===');
        
        // Verify the fix
        $donaturRole = Role::where('name', 'Donatur Buku')->first();
        if ($donaturRole) {
            $permissions = $donaturRole->permissions->pluck('name')->toArray();
            $this->info('Donatur Buku role now has permissions:');
            foreach ($permissions as $permission) {
                $this->line("- {$permission}");
            }
            
            // Check if critical permissions exist
            $criticalPermissions = ['donate books', 'view own donations', 'manage own donations'];
            $missing = array_diff($criticalPermissions, $permissions);
            
            if (empty($missing)) {
                $this->info('✓ All critical permissions are assigned!');
            } else {
                $this->error('✗ Missing permissions: ' . implode(', ', $missing));
            }
        }
        
        return 0;
    }
}
