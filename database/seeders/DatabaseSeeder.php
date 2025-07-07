<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Hapus komentar pada baris di bawah ini untuk memanggil MahasiswaSeeder
        $this->call([
            MahasiswaSeeder::class,
        ]);
    }
}