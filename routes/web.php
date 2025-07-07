<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController; // Pastikan baris ini ada

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita mendaftarkan semua rute untuk aplikasi web kita.
|
*/

// Mengatur halaman utama ('/') untuk langsung memanggil fungsi index
// di MahasiswaController, yang akan menampilkan tabel data mahasiswa.
Route::get('/', [MahasiswaController::class, 'index'])->name('home');

// Rute untuk menangani operasi CRUD (Create, Read, Update, Delete) data mahasiswa.
// Rute-rute ini tidak lagi memerlukan login (middleware 'auth' sudah dihapus).
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/data', [MahasiswaController::class, 'getData'])->name('data'); // Rute untuk AJAX DataTables
    Route::post('/', [MahasiswaController::class, 'store'])->name('store');
    Route::get('/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('edit');
    Route::put('/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update');
    Route::delete('/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('destroy');
});

// Baris "require __DIR__.'/auth.php';" sudah kita hapus untuk menghilangkan semua rute login/register.