🗺️ SIG - Banyumas
Sistem Informasi Geografis Wisata di Banyumas 

SIG - Banyumas adalah sistem informasi geografis yang bertujuan untuk memetakan serta menyediakan informasi lengkap mengenai destinasi wisata yang ada di wilayah Banyumas , Jawa Tengah. Proyek ini dibuat dengan tujuan memudahkan masyarakat maupun wisatawan dalam mengeksplor tempat-tempat wisata yang menarik di Banyumas.

📌 Fitur Utama
Pemetaan lokasi wisata menggunakan Google Maps API.
Informasi detail wisata (nama, deskripsi, alamat, dll).
Kategori wisata (alam, budaya, kuliner, dll).
Tampilan responsif dan user-friendly.

🛠️ Teknologi yang Digunakan
PHP Native (tanpa framework)
HTML5, CSS3, JavaScript
Google Maps API
MySQL sebagai database

📦 Prasyarat Instalasi
Web server seperti Apache (XAMPP/WAMP/Laragon direkomendasikan)
PHP 7.4 atau lebih tinggi
MySQL / MariaDB

🚀 Cara Menjalankan Aplikasi
Clone repository
git clone https://github.com/nama-user/sig-banyumas.git 
Impor database
Import file sig_banyumas.sql ke dalam phpMyAdmin atau MySQL.
Konfigurasi koneksi database
Buka file config.php
Sesuaikan konfigurasi sesuai host, username, password, dan nama database:
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_sigbms');
Jalankan aplikasi
Jalankan XAMPP atau web server lainnya.
Buka browser dan akses:
http://localhost/sig-bms

📄 Lisensi
MIT License
Kamu bebas menggunakan, memodifikasi, dan mendistribusikan proyek ini untuk tujuan apa pun karena proyek ini dibuat oleh saya secara mandiri tanpa melanggar hak cipta pihak manapun.

🙌 Kontribusi
Kontribusi sangat diterima! Silakan buat pull request jika kamu memiliki ide atau perbaikan untuk meningkatkan fitur dan stabilitas aplikasi ini.
