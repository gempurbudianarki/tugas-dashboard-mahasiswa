<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            // Ini adalah cetak biru kita.
            // Awalnya hanya ada id() dan timestamps(). Kita tambahkan yang lain di tengah-tengah.

            $table->id(); // Kolom untuk nomor urut, sudah ada dari awal.

            // --- TAMBAHAN KITA DIMULAI DARI SINI ---
            $table->string('nim')->unique(); // Kolom untuk NIM (teks), dan harus unik (tidak boleh ada yang sama).
            $table->string('nama'); // Kolom untuk Nama Mahasiswa (teks).
            $table->integer('semester'); // Kolom untuk Semester (angka bulat).
            $table->string('matkul'); // Kolom untuk Mata Kuliah (teks).
            // --- TAMBAHAN KITA SELESAI DI SINI ---

            $table->timestamps(); // Kolom 'created_at' dan 'updated_at', sudah ada dari awal.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};