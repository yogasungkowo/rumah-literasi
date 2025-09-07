<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
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

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        
        // Admin Role
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo([
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

        // Investor Role
        $investorRole = Role::create(['name' => 'Investor']);
        $investorRole->givePermissionTo([
            'create sponsorships',
            'manage own sponsorships',
            'view investment opportunities',
            'view profile',
            'edit own profile',
            'contact support',
        ]);

        // Donatur Buku Role
        $donaturRole = Role::create(['name' => 'Donatur Buku']);
        $donaturRole->givePermissionTo([
            'donate books',
            'view own donations',
            'manage own donations',
            'view profile',
            'edit own profile',
            'contact support',
        ]);

        // Relawan Role
        $relawanRole = Role::create(['name' => 'Relawan']);
        $relawanRole->givePermissionTo([
            'volunteer for trainings',
            'manage volunteer activities',
            'view trainings',
            'register training',
            'manage own training registrations',
            'view profile',
            'edit own profile',
            'contact support',
        ]);

        // Peserta Pelatihan Role
        $pesertaRole = Role::create(['name' => 'Peserta Pelatihan']);
        $pesertaRole->givePermissionTo([
            'view trainings',
            'register training',
            'manage own training registrations',
            'view profile',
            'edit own profile',
            'contact support',
        ]);

        $this->command->info('Roles and permissions have been created successfully!');
        $this->command->info('Created roles: Admin, Investor, Donatur Buku, Relawan, Peserta Pelatihan');
    }
}
