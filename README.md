# MKWK Reborn 🎓

> Portal Akademik Resmi Mata Kuliah Wajib Kurikulum (MKWK) Universitas Indraprasta PGRI

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=flat-square&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-CDN-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## 📋 Tentang Project

MKWK Reborn adalah website portal akademik yang menyediakan informasi, materi pembelajaran, dan sistem evaluasi online untuk mahasiswa Universitas Indraprasta PGRI dalam rangka pelaksanaan Mata Kuliah Wajib Kurikulum (MKWK).

---

## ✨ Fitur

| Fitur | Keterangan |
|---|---|
| 📰 Berita & Kegiatan | Informasi terkini seputar kegiatan akademik kampus |
| 📚 Materi Pembelajaran | Akses materi dan panduan MKWK |
| 📝 Portal Tes & Evaluasi | Sistem ujian online dengan timer dan penilaian otomatis |
| 🔍 Pencarian | Cari berita dan kegiatan dengan cepat |
| 🎬 Karya Video Mahasiswa | Showcase hasil proyek berbasis video |
| 🔐 Panel Admin | Kelola konten, soal ujian, dan data mahasiswa |

---

## 🛠️ Tech Stack

- **Backend:** PHP 8.2 Native
- **Database:** MySQL / MariaDB (via XAMPP)
- **Frontend:** Tailwind CSS (CDN), Vanilla JavaScript
- **Library:** SweetAlert2, Canvas Confetti

---

## 🚀 Cara Instalasi Lokal

### Prasyarat
- XAMPP (PHP 8.x + MySQL)
- Git

### Langkah-langkah

**1. Clone repository**
```bash
git clone https://github.com/rizuku-v2/mkwk-reborn.git
```

**2. Pindahkan ke folder htdocs**
```
C:\xampp\htdocs\mkwk-reborn
```

**3. Import Database**
- Buka `http://localhost/phpmyadmin`
- Buat database baru bernama `db_mkwk`
- Klik **Import** → pilih file `docs/db_mkwk.sql`
- Klik **Go**

**4. Konfigurasi Database**
```bash
# Copy file contoh konfigurasi
copy includes\db.example.php includes\db.php
```

Edit file `includes/db.php` sesuai konfigurasi lokal kamu:
```php
<?php
$host = "localhost";
$user = "root";
$pass = "";         // isi password MySQL kamu (default XAMPP: kosong)
$db   = "db_mkwk";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());
?>
```

**5. Jalankan di browser**
```
http://localhost/mkwk-reborn
```

**6. Akses Panel Admin**
```
http://localhost/mkwk-reborn/admin
Username: admin
Password: (sesuai database)
```

---

## 📁 Struktur Folder

```
mkwk-reborn/
├── admin/              # Panel administrasi
│   ├── login.php
│   ├── matkul.php
│   ├── soal.php
│   └── tambah.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   │   └── uploads/    # Gambar artikel (tidak di-push)
│   └── js/
│       └── script.js
├── docs/
│   └── db_mkwk.sql     # Skema & data database
├── includes/
│   ├── db.example.php  # Template konfigurasi DB
│   ├── header.php
│   └── footer.php
├── baca.php
├── berita.php
├── detail-berita.php
├── index.php
├── kegiatan.php
├── materi.php
├── mulai_ujian.php
├── panduan.php
├── pencarian.php
├── profil.php
├── proses_ujian.php
├── tes.php
├── .gitignore
└── README.md
```

---

## 🗄️ Struktur Database

| Tabel | Keterangan |
|---|---|
| `admin` | Data akun administrator |
| `artikel` | Artikel/konten berita |
| `berita` | Berita dan kegiatan kampus |
| `mahasiswa` | Data peserta ujian |
| `mata_kuliah` | Daftar mata kuliah aktif |
| `soal_ujian` | Bank soal untuk evaluasi |
| `hasil_ujian` | Rekap hasil ujian mahasiswa |

---

## 🔒 Keamanan

- File `includes/db.php` tidak di-push ke repository (ada di `.gitignore`)
- Upload gambar tidak di-push (gunakan folder lokal)
- Gunakan `db.example.php` sebagai template konfigurasi

---

## 🤝 Kontribusi

Pull request sangat diterima! Untuk perubahan besar, buka issue terlebih dahulu untuk mendiskusikan apa yang ingin diubah.

1. Fork repo ini
2. Buat branch baru (`git checkout -b fitur/nama-fitur`)
3. Commit perubahan (`git commit -m 'Tambah fitur X'`)
4. Push ke branch (`git push origin fitur/nama-fitur`)
5. Buka Pull Request

---

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).

---

<p align="center">Dibuat dengan ❤️ untuk MKWK Universitas Indraprasta PGRI</p>