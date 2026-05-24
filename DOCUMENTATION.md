# Dokumentasi SIPUS-PGRI

## 1. Judul Project
SIPUS-PGRI

## 2. Logo / Nama Project
**Nama resmi project:** SIPUS-PGRI (Sistem Informasi Perpustakaan Sekolah PGRI)

## 3. Pengertian SIPUS-PGRI
SIPUS-PGRI adalah sistem informasi perpustakaan berbasis web yang dibuat untuk membantu pengelolaan koleksi buku, anggota, peminjaman, dan pengembalian di lingkungan sekolah PGRI.

## 4. Latar Belakang Pembuatan Website
Perpustakaan sekolah membutuhkan manajemen data yang cepat, akurat, dan mudah diakses. Pencatatan manual sering kali menyebabkan duplikasi data, kesalahan stok, dan memakan waktu. Oleh karena itu, SIPUS-PGRI dirancang untuk mendigitalisasi proses tersebut dan mendukung efisiensi kerja petugas perpustakaan.

## 5. Tujuan Website
- Meningkatkan efisiensi administrasi perpustakaan.
- Menyediakan catatan digital yang mudah diakses.
- Mengurangi kesalahan pencatatan manual.
- Memudahkan laporan dan pengawasan koleksi buku.
- Membantu siswa dan guru dalam mencari buku secara cepat.

## 6. Fungsi Utama Website
- Menyimpan data buku secara terstruktur.
- Menyimpan data anggota perpustakaan.
- Mengelola proses peminjaman dan pengembalian buku.
- Menyediakan pencarian buku yang cepat.
- Menyajikan ringkasan data dashboard untuk pengambilan keputusan.

## 7. Fitur-Fitur Website
### CRUD Buku
- Tambah buku baru.
- Edit data buku.
- Hapus buku.
- Lihat detail buku.

### CRUD Anggota
- Tambah anggota baru.
- Edit data anggota.
- Hapus atau nonaktifkan anggota.
- Lihat riwayat anggota.

### CRUD Peminjaman
- Catat peminjaman buku.
- Tentukan tanggal kembali.
- Lihat status peminjaman.

### CRUD Pengembalian
- Proses pengembalian buku.
- Catat tanggal kembali.
- Hitung denda jika terlambat.

### Search Buku
- Pencarian berdasarkan judul, pengarang, ISBN, atau kategori.
- Menampilkan jumlah stok tersedia.
- Mempermudah pengguna menemukan buku dengan cepat.

### Dashboard Statistik
- Ringkasan jumlah buku.
- Jumlah anggota aktif.
- Jumlah peminjaman saat ini.
- Laporan peminjaman terlambat.

## 8. Modul Website dan Penjelasannya
- **Modul Autentikasi:** Mengelola login petugas dan hak akses.
- **Modul Buku:** Mengelola data buku dan stok.
- **Modul Anggota:** Mengelola data anggota perpustakaan.
- **Modul Transaksi:** Mengelola peminjaman dan pengembalian.
- **Modul Pencarian:** Fitur pencarian buku.
- **Modul Dashboard:** Menyajikan statistik dan ringkasan data.
- **Modul Pengaturan:** Mengatur parameter seperti masa pinjam, denda, dan user.

## 9. Teknologi yang Digunakan
- HTML
- CSS
- JavaScript
- PHP
- MySQL
- phpMyAdmin
- Tailwind CSS (digunakan untuk tampilan modern dan responsif)

## 10. Struktur Folder Project dan Penjelasannya
- **app/**: Kode utama aplikasi termasuk model, controller, dan request.
- **bootstrap/**: Bootstrap aplikasi dan file konfigurasi awal.
- **config/**: Pengaturan konfigurasi sistem.
- **database/**: Migration, seeder, serta data pendukung.
- **public/**: File publik yang dapat diakses browser, termasuk entry point `index.php`.
- **resources/**: Assets dan view/template.
- **routes/**: Definisi rute aplikasi.
- **storage/**: File sementara, cache, logs, dan sesi.
- **vendor/**: Dependensi Composer.

## 11. Penjelasan Database
Database MySQL menyimpan semua data penting untuk SIPUS-PGRI. Setiap informasi buku, anggota, dan transaksi disimpan dalam tabel yang saling terhubung dengan relasi yang jelas.

## 12. Penjelasan Tabel Database
- **books**: Menyimpan informasi buku seperti judul, pengarang, penerbit, tahun, ISBN, kategori, dan stok.
- **categories**: Menyimpan kategori buku seperti pelajaran, fiksi, dan referensi.
- **students** / **members**: Menyimpan data anggota perpustakaan seperti nama, nomor induk, kelas/jabatan, dan kontak.
- **petugas**: Menyimpan data petugas perpustakaan beserta username dan peran.
- **borrowings**: Menyimpan data peminjaman termasuk anggota, buku, tanggal pinjam, dan tanggal kembali.
- **returns** (jika tersedia): Menyimpan detail pengembalian, kondisi buku, dan denda.

## 13. Cara Menjalankan Website di Laragon/XAMPP
1. Salin folder proyek ke dalam folder web server:
   - Laragon: `C:\laragon\www\`
   - XAMPP: `C:\xampp\htdocs\`
2. Buka terminal/PowerShell pada folder proyek.
3. Jalankan perintah:
   ```bash
   composer install
   ```
4. Buat file `.env` dari `.env.example` dan atur koneksi database:
   - `DB_DATABASE`
   - `DB_USERNAME`
   - `DB_PASSWORD`
5. Jalankan migrasi dan seeder:
   ```bash
   php artisan migrate --seed
   ```
6. Jika menggunakan asset builder Tailwind/Vite:
   ```bash
   npm install
   npm run dev
   ```
7. Mulai server lokal:
   - Lewat Laragon: akses domain lokal atau `http://localhost/nama-proyek/public`
   - Lewat XAMPP: aktifkan Apache dan MySQL lalu akses `http://localhost/nama-proyek/public`
   - Alternatif melalui artisan:
     ```bash
     php artisan serve --host=127.0.0.1 --port=8000
     ```
8. Jika diperlukan, import database lewat phpMyAdmin menggunakan file SQL.

## 14. Tampilan UI/UX Website
- Desain sederhana dengan antarmuka modern.
- Warna bersih dan kontras yang nyaman untuk penggunaan sekolah.
- Navigasi jelas dengan sidebar dan menu utama.
- Tampilan responsif untuk desktop, tablet, dan ponsel.
- Form input yang mudah diisi serta umpan balik validasi yang jelas.

## 15. Kelebihan Website
- Memudahkan pengelolaan data perpustakaan.
- Mengurangi pekerjaan manual pada pencatatan.
- Memiliki dashboard statistik untuk evaluasi.
- Meningkatkan transparansi koleksi buku.
- Memudahkan pencarian buku bagi pengguna.

## 16. Kekurangan Website
- Masih bergantung pada server lokal Laragon/XAMPP.
- Fitur notifikasi belum otomatis.
- Belum mendukung akses jarak jauh tanpa deploy.
- Perlu pelatihan sederhana bagi petugas baru.

## 17. Pengembangan Kedepannya
- Menambahkan notifikasi email atau SMS untuk pengingat pengembalian.
- Menambahkan peminjaman berbasis QR code.
- Menambahkan fitur backup dan restore otomatis.
- Menambahkan peran pengguna lebih rinci.
- Menyediakan ekspor laporan dalam format PDF atau Excel.
- Menyediakan akses online melalui hosting server.

## 18. Kesimpulan
SIPUS-PGRI adalah solusi profesional untuk sekolah PGRI dalam mengelola perpustakaan. Dengan fitur inti CRUD buku, anggota, peminjaman, pengembalian, pencarian, dan dashboard statistik, sistem ini dirancang agar mudah digunakan oleh siswa, guru, dan petugas perpustakaan.

## Contoh Isi Data Realistis
### Buku
- Matematika SMP Kelas 8 | Agus Santoso | 2020 | 978-602-01-1234 | Pelajaran | Stok: 10
- Bahasa Indonesia SMA | Siti Aisyah | 2019 | 978-602-02-5678 | Pelajaran | Stok: 8
- Cerita Anak Nusantara | Budi Hartono | 2021 | 978-602-03-9101 | Fiksi Anak | Stok: 15

### Anggota
- Rina Putri | NIS 2021001 | VIII-A | 081234567890
- Ahmad Susanto | NIS 2021002 | X-B | 081298765432
- Guru Widya | GURU001 | Guru Bahasa | 082112345678

### Transaksi Peminjaman
- Rina Putri meminjam "Matematika SMP Kelas 8" pada 10 Mei 2026, jatuh tempo 17 Mei 2026.
- Ahmad Susanto meminjam "Cerita Anak Nusantara" pada 11 Mei 2026, dikembalikan tanggal 16 Mei 2026.

> Dokumentasi ini dibuat untuk mendukung tugas sekolah atau proyek akhir yang profesional, rapi, dan mudah dipahami oleh guru maupun siswa.
