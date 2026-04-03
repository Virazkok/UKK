<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Kebersihan',
            'deskripsi' => 'Pengaduan terkait kebersihan lingkungan sekolah.'
        ]);

        Kategori::create([
            'nama_kategori' => 'Keamanan',
            'deskripsi' => 'Pengaduan terkait keamanan di lingkungan sekolah.'
        ]);

        Kategori::create([
            'nama_kategori' => 'Fasilitas',
            'deskripsi' => 'Pengaduan terkait fasilitas yang rusak atau kurang memadai.'
        ]);
    }
}
