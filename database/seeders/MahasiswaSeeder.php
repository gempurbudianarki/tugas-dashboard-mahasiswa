<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa; // <-- PENTING: Import model Mahasiswa

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat 3 data contoh
        Mahasiswa::create([
            'nim' => '24210101',
            'nama' => 'Budi Santoso',
            'semester' => 4,
            'matkul' => 'Pemrograman Web Lanjut'
        ]);

        Mahasiswa::create([
            'nim' => '24210102',
            'nama' => 'Citra Lestari',
            'semester' => 4,
            'matkul' => 'Kecerdasan Buatan'
        ]);

        Mahasiswa::create([
            'nim' => '24210103',
            'nama' => 'Agus Setiawan',
            'semester' => 2,
            'matkul' => 'Algoritma dan Struktur Data'
        ]);
    }
}