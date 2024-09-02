# Aplikasi Manajemen Pengiriman Barang

Aplikasi Manajemen Pengiriman Barang ini dikembangkan untuk memenuhi tugas mata kuliah Basis Data. Aplikasi ini menggunakan contoh kasus dari PT Herona Express, dengan fitur utama pengelolaan data pengirim serta penerima dan pencetakan invoice.

## Fitur Utama

- **Pengelolaan Data Pengirim**: Mengelola informasi pengirim barang.
- **Pengelolaan Data Penerima**: Mengelola informasi penerima barang.
- **Pencetakan Invoice**: Mencetak invoice untuk pengiriman barang.
- **Pengelolaan Jenis Kiriman**: Mengelola berbagai jenis kiriman yang tersedia.
- **Pengelolaan Lokasi Pengiriman**: Mengelola data kabupaten, kecamatan, dan kelurahan terkait dengan pengiriman.

## Struktur Folder

- **assets/**: Folder untuk menyimpan file aset tambahan.
- **DataDiriPenerima/**: Folder untuk menyimpan data penerima barang.
- **DataDiriPengirim/**: Folder untuk menyimpan data pengirim barang.
- **img/**: Folder untuk menyimpan file gambar yang digunakan dalam aplikasi.
- **JenisKiriman/**: Folder untuk menyimpan data terkait jenis kiriman.
- **Kabupaten/**: Folder untuk menyimpan data kabupaten terkait pengiriman.
- **Kecamatan/**: Folder untuk menyimpan data kecamatan terkait pengiriman.
- **Kelurahan/**: Folder untuk menyimpan data kelurahan terkait pengiriman.
- **Pengiriman/**: Folder untuk menyimpan data pengiriman.
- **style/**: Folder untuk menyimpan file CSS untuk gaya tampilan aplikasi.
- **config.php**: File konfigurasi untuk pengaturan aplikasi.
- **index.php**: File utama untuk menjalankan aplikasi.
- **login.php**: File untuk menangani proses login pengguna.

## Cara Menggunakan

1. Clone repository ini ke dalam server lokal Anda.
2. Pastikan server web (seperti Apache atau Nginx) dan database MySQL sudah terpasang.
3. Buat database baru dan impor file SQL yang telah disediakan (jika ada).
4. Sesuaikan konfigurasi database di `config.php`.
5. Akses aplikasi melalui browser pada URL yang sesuai.

## Spesifikasi Lingkungan

Proyek ini telah diuji dan dikembangkan menggunakan XAMPP versi 3.3.0 dengan konfigurasi sebagai berikut:

- **Apache:** Versi 2.4.53
- **MySQL:** Versi 8.0.28

Pastikan Anda menggunakan versi yang sesuai untuk hasil yang optimal.

## Teknologi yang Digunakan

- **PHP**: Bahasa pemrograman utama untuk pengembangan aplikasi.
- **MySQL**: Database management system untuk menyimpan data.
- **HTML/CSS**: Untuk struktur dan tampilan halaman web.

## Kontributor

Aplikasi ini dikembangkan oleh saya sendiri untuk memenuhi tugas mata kuliah Basis Data.