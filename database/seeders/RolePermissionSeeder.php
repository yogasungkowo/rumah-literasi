<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        $permissions = [
            'manage users',
            'manage roles',
            'manage permissions',
            'view dashboard',
            'manage books',
            'manage donations',
            'manage events',
            'manage investments',
            'manage volunteers',
            'manage training',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $publikRole = Role::firstOrCreate(['name' => 'Publik']);
        $donaturRole = Role::firstOrCreate(['name' => 'Donatur Buku']);
        $relawanRole = Role::firstOrCreate(['name' => 'Relawan']);
        $pesertaRole = Role::firstOrCreate(['name' => 'Peserta Pelatihan']);
        $investorRole = Role::firstOrCreate(['name' => 'Investor']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo(Permission::all());
        
        $publikRole->givePermissionTo([
            'view dashboard',
        ]);

        $donaturRole->givePermissionTo([
            'view dashboard',
            'manage donations',
            'manage books',
        ]);

        $relawanRole->givePermissionTo([
            'view dashboard',
            'manage events',
            'manage volunteers',
        ]);

        $pesertaRole->givePermissionTo([
            'view dashboard',
            'manage training',
        ]);

        $investorRole->givePermissionTo([
            'view dashboard',
            'manage investments',
        ]);

        // Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@rumahliterasi.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'phone' => '081234567890',
                'address' => 'Jakarta, Indonesia',
                'organization' => 'Rumah Literasi',
                'profession' => 'Administrator',
                'bio' => 'Administrator Rumah Literasi Ranggi',
                'status' => 'active',
            ]
        );
        $admin->assignRole('Admin');

        // Create Sample Users for each role
        $publik = User::firstOrCreate(
            ['email' => 'publik@test.com'],
            [
                'name' => 'Pengguna Publik',
                'password' => Hash::make('password'),
                'phone' => '081234567891',
                'status' => 'active',
            ]
        );
        $publik->assignRole('Publik');

        $donatur = User::firstOrCreate(
            ['email' => 'donatur@test.com'],
            [
                'name' => 'Donatur Buku',
                'password' => Hash::make('password'),
                'phone' => '081234567892',
                'organization' => 'Yayasan Literasi',
                'status' => 'active',
            ]
        );
        $donatur->assignRole('Donatur Buku');

        $relawan = User::firstOrCreate(
            ['email' => 'relawan@test.com'],
            [
                'name' => 'Relawan Literasi',
                'password' => Hash::make('password'),
                'phone' => '081234567893',
                'profession' => 'Guru',
                'status' => 'active',
            ]
        );
        $relawan->assignRole('Relawan');

        $peserta = User::firstOrCreate(
            ['email' => 'peserta@test.com'],
            [
                'name' => 'Peserta Pelatihan',
                'password' => Hash::make('password'),
                'phone' => '081234567894',
                'profession' => 'Mahasiswa',
                'status' => 'active',
            ]
        );
        $peserta->assignRole('Peserta Pelatihan');

        $investor = User::firstOrCreate(
            ['email' => 'investor@test.com'],
            [
                'name' => 'Investor Literasi',
                'password' => Hash::make('password'),
                'phone' => '081234567895',
                'organization' => 'PT. Investasi Literasi',
                'profession' => 'Businessman',
                'status' => 'active',
            ]
        );
        $investor->assignRole('Investor');
    }
}
