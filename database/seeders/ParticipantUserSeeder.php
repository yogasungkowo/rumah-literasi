<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ParticipantUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or get the role
        $role = Role::firstOrCreate(['name' => 'Peserta Pelatihan']);

        // Create a test participant user
        $participant = User::firstOrCreate(
            ['email' => 'participant@test.com'],
            [
                'name' => 'Peserta Test',
                'email' => 'participant@test.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'phone' => '08123456789',
                'birth_date' => '1990-01-01',
                'address' => 'Jl. Test No. 123',
                'profession' => 'Mahasiswa',
                'gender' => 'male',
                'status' => 'active',
            ]
        );

        // Assign role to user
        if (!$participant->hasRole('Peserta Pelatihan')) {
            $participant->assignRole($role);
        }

        // Create additional participants for testing
        for ($i = 1; $i <= 5; $i++) {
            $participant = User::firstOrCreate(
                ['email' => "participant{$i}@test.com"],
                [
                    'name' => "Peserta Test {$i}",
                    'email' => "participant{$i}@test.com",
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'phone' => "0812345678{$i}",
                    'birth_date' => '1990-01-01',
                    'address' => "Jl. Test {$i} No. 123",
                    'profession' => 'Mahasiswa',
                    'gender' => $i % 2 === 0 ? 'female' : 'male',
                    'status' => 'active',
                ]
            );

            if (!$participant->hasRole('Peserta Pelatihan')) {
                $participant->assignRole($role);
            }
        }

        $this->command->info('Participant users created successfully!');
    }
}
