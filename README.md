<p align="center">
  <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcnk3aWttY3ZyYnhwMW9tMXN1dG9kZzh1cGUzM2VzbHJzZjhvbnF6eSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/h4rJc4K3oioP32p667/giphy.gif" width="250">
</p>

<h1 align="center">Dashboard Manajemen Mahasiswa</h1>

<p align="center">
  Aplikasi web sederhana untuk mengelola data mahasiswa (CRUD) yang dibangun dengan Laravel 10 dan dilengkapi antarmuka interaktif.
</p>

---

### 🚀 **Fitur Utama**
- **Manajemen Data Mahasiswa**: Tambah, Lihat, Edit, dan Hapus data secara dinamis.
- **Antarmuka Interaktif**: Tabel data yang responsif dengan fitur pencarian dan *paging* menggunakan AJAX.
- **Tumpukan Teknologi Modern**: Dibangun menggunakan teknologi terbaru untuk pengalaman pengembangan yang lebih baik.

### 🛠️ **Tumpukan Teknologi**
- **Backend**: Laravel 10, PHP 8.1
- **Frontend**: Tailwind CSS, Alpine.js, Vite
- **UI & Interaktivitas**: Bootstrap 5 (untuk Modal & Tabel), jQuery, DataTables
- **Database**: MySQL

---

## 📋 **Prasyarat**
Pastikan perangkat lunak berikut sudah terinstal di komputer Anda:
- PHP (v8.1+)
- Composer
- Node.js & NPM
- Git
- Server Lokal (Sangat direkomendasikan menggunakan **Laragon**)

---

## ⚙️ **Panduan Instalasi (Langkah demi Langkah)**
Ikuti panduan ini dengan teliti untuk menjalankan proyek tanpa masalah.

#### **1. Clone Repositori**
Buka terminal (Git Bash atau Terminal Laragon) di dalam folder `www` Anda, lalu jalankan:
```bash
git clone [https://github.com/gempurbudianarki/tugas-dashboard-mahasiswa.git](https://github.com/gempurbudianarki/tugas-dashboard-mahasiswa.git)
```
<img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNTFkZ3FzZWJtaXZoZHVjYTNnYnduZnN6M3k4a3Q0bjM5bGVsM3Y1ZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/llP42QiK44BIwYJj2M/giphy.gif" width="500">

#### **2. Masuk ke Folder Proyek**
```bash
cd tugas-dashboard-mahasiswa
```

#### **3. Instal Dependensi (PHP & JS)**
Jalankan kedua perintah ini secara berurutan. Proses ini mungkin memakan waktu beberapa menit.
```bash
# Instal paket PHP
composer install

# Instal paket JavaScript
npm install
```
<img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExbnZrcWdzbm5rZ2g1N3VnaGZudGxwZzNtb2J5dDQxMnF0NHNlYjRwNiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3o7bu3XilJ5BOiSGic/giphy.gif" width="500">

#### **4. Siapkan File Konfigurasi (`.env`)**
Salin file contoh menjadi file konfigurasi utama aplikasi.
```bash
copy .env.example .env
```
Lalu, buat kunci aplikasi yang unik.
```bash
php artisan key:generate
```

#### **5. Konfigurasi Database**
- Buka file `.env` yang baru saja Anda buat.
- Sesuaikan pengaturan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan konfigurasi MySQL Anda di Laragon.
- **Jangan lupa**: Buat sebuah database kosong di phpMyAdmin (misalnya dengan nama `db_mahasiswa`) sesuai nama yang Anda atur di `.env`.

#### **6. Jalankan Migrasi & Seeder Database**
Perintah ini akan membuat semua tabel dan mengisinya dengan 3 data mahasiswa sebagai contoh.
```bash
php artisan migrate --seed
```
<p align="center">
  <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExM3N2dTl2aDV1OWJmZmhjaXF3a2MwbXFjeHA2eGRuMGRkZWJ4NzFkMSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/UMi0n4G1jggx2/giphy.gif" width="400">
</p>
<h3 align="center">🎉 Selamat! Instalasi Selesai! 🎉</h3>

---

## 🚀 **Menjalankan Aplikasi (Wajib Dibaca!)**
Untuk menjalankan aplikasi Laravel modern, Anda perlu **2 Terminal** yang berjalan bersamaan.

### **Terminal 1: Menjalankan Vite (Frontend)**
Terminal ini bertugas menyajikan CSS & JavaScript agar tampilan tidak berantakan. **Biarkan terminal ini tetap berjalan selama Anda membuka aplikasi.**
```bash
npm run dev
```
<img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExd2szeW1qYnh4MW45M2c1bnJ4bXQ4ZGdjeHlndnRmc3NvdXY5OGo0NyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/1gO2I7J9n1E3a4aU1J/giphy.gif" width="500">

### **Akses Aplikasi di Browser**
- Pastikan Laragon Anda berjalan (`Start All`).
- Buka browser dan akses alamat:
  > **http://dashboard-mahasiswa.test**

---

## 🆘 **Troubleshooting (Panduan Anti-Error)**
Jika Anda mengalami masalah seperti yang kita alami sebelumnya, ini solusinya:

### **Masalah 1: Error `DNS_PROBE_FINISHED_NXDOMAIN`**
> Halaman `.test` tidak dapat dijangkau.

**Solusi:** Ini terjadi karena Laragon tidak punya izin untuk mengatur file `hosts` di Windows.
- **WAJIB JALANKAN LARAGON SEBAGAI ADMINISTRATOR.**
- Matikan Laragon > Klik kanan ikonnya > "Run as administrator" > Start All.

### **Masalah 2: Tampilan Berantakan / Acak-acakan**
> Halaman web muncul tapi hanya tulisan hitam putih tanpa desain.

**Solusi:** Ini terjadi karena server Vite (frontend) tidak berjalan.
- **PASTIKAN TERMINAL `npm run dev` SEDANG BERJALAN.**
- Jika terminal itu tertutup, buka lagi dan jalankan ulang perintah `npm run dev`.