<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan roles sudah dibuat sebelumnya
        if (Role::count() == 0) {
            $this->command->error('Roles belum dibuat! Jalankan RolePermissionSeeder terlebih dahulu.');
            return;
        }

        // Admin User
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@rumahliterasiranggi.id',
            'password' => Hash::make('password123'),
            'phone' => '081234567890',
            'address' => 'Jl. Pendidikan No. 1, Jakarta',
            'organization' => 'Rumah Literasi',
            'profession' => 'Administrator',
            'bio' => 'Administrator utama sistem Rumah Literasi',
            'birth_date' => '1985-01-15',
            'gender' => 'male',
            'status' => 'aktif',
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('Admin');

        // Investor User
        $investor = User::create([
            'name' => 'Budi Santoso',
            'email' => 'investor@rumahliterasiranggi.id',
            'password' => Hash::make('password123'),
            'phone' => '081234567891',
            'address' => 'Jl. Bisnis No. 10, Surabaya',
            'organization' => 'PT Investasi Pendidikan',
            'profession' => 'Direktur',
            'bio' => 'Investor yang peduli dengan pendidikan dan literasi',
            'birth_date' => '1975-05-20',
            'gender' => 'male',
            'status' => 'aktif',
            'email_verified_at' => now(),
        ]);
        $investor->assignRole('Investor');

        // Donatur Buku User
        $donatur = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'donatur@rumahliterasiranggi.id',
            'password' => Hash::make('password123'),
            'phone' => '081234567892',
            'address' => 'Jl. Literasi No. 5, Bandung',
            'organization' => 'Perpustakaan Kota',
            'profession' => 'Pustakawan',
            'bio' => 'Donatur buku yang ingin berbagi pengetahuan',
            'birth_date' => '1980-08-12',
            'gender' => 'female',
            'status' => 'aktif',
            'email_verified_at' => now(),
        ]);
        $donatur->assignRole('Donatur Buku');

        // Relawan User
        $relawan = User::create([
            'name' => 'Ahmad Wijaya',
            'email' => 'relawan@rumahliterasiranggi.id',
            'password' => Hash::make('password123'),
            'phone' => '081234567893',
            'address' => 'Jl. Volunter No. 8, Yogyakarta',
            'organization' => 'Komunitas Relawan Pendidikan',
            'profession' => 'Guru',
            'bio' => 'Relawan yang siap membantu kegiatan pelatihan',
            'birth_date' => '1990-03-25',
            'gender' => 'male',
            'status' => 'aktif',
            'email_verified_at' => now(),
        ]);
        $relawan->assignRole('Relawan');

        // Peserta Pelatihan User
        $peserta = User::create([
            'name' => 'Dewi Sartika',
            'email' => 'peserta@rumahliterasiranggi.id',
            'password' => Hash::make('password123'),
            'phone' => '081234567894',
            'address' => 'Jl. Belajar No. 12, Medan',
            'organization' => 'SMA Negeri 1',
            'profession' => 'Pelajar',
            'bio' => 'Peserta yang antusias mengikuti pelatihan literasi',
            'birth_date' => '2005-11-18',
            'gender' => 'female',
            'status' => 'aktif',
            'email_verified_at' => now(),
        ]);
        $peserta->assignRole('Peserta Pelatihan');

        $this->command->info('Users dengan berbagai role telah berhasil dibuat!');
        $this->command->info('Email dan password untuk semua user: password123');
        $this->command->table(
            ['Role', 'Name', 'Email'],
            [
                ['Admin', 'Administrator', 'admin@rumahliterasiranggi.id'],
                ['Investor', 'Budi Santoso', 'investor@rumahliterasiranggi.id'],
                ['Donatur Buku', 'Siti Nurhaliza', 'donatur@rumahliterasiranggi.id'],
                ['Relawan', 'Ahmad Wijaya', 'relawan@rumahliterasiranggi.id'],
                ['Peserta Pelatihan', 'Dewi Sartika', 'peserta@rumahliterasiranggi.id'],
            ]
        );
    }
}
