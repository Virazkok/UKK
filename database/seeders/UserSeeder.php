<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ADMIN
        User::create([
            'nama' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'kelas' => null
        ]);

        // SISWA 1
        User::create([
            'nama' => 'Budi Santoso',
            'email' => 'siswa1@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'siswa',
            'kelas' => 'XI RPL 1'
        ]);

        // SISWA 2
        User::create([
            'nama' => 'Siti Aminah',
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'siswa',
            'kelas' => 'XI RPL 2'
        ]);
    }
}