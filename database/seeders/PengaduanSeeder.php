<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengaduan::create([
            'id_user' => 2,
            'id_kategori' => 1,
            'judul' => 'Sampah Menumpuk di Kelas',
            'deskripsi' => 'Sampah di kelas saya menumpuk dan tidak dibersihkan selama seminggu.',
            'tanggal_pengaduan' => '2024-06-01'
        ]);

        
    }
}
