# Gambaran Aplikasi Sistem Manajemen Perbaikan IT

## Deskripsi Aplikasi

Aplikasi ini adalah sistem manajemen perbaikan dan pemeliharaan aset IT yang dibangun menggunakan framework Laravel. Sistem ini dirancang untuk mengelola inventaris barang IT, mengelola pengajuan perbaikan, melakukan pemeriksaan rutin, serta menghasilkan laporan dalam format PDF.

## Teknologi yang Digunakan

- **Framework**: Laravel 12.0
- **Bahasa Pemrograman**: PHP 8.2+
- **Database**: MySQL (berdasarkan struktur migrasi)
- **Frontend**: Blade Templates, CSS, JavaScript
- **PDF Generation**: Laravel DOMPDF
- **Authentication**: Laravel Sanctum/Breeze

## Fitur Utama

### 1. Manajemen Barang (Items Management)
- **Model**: `Barang`
- **Fitur**:
  - Tambah, edit, hapus barang
  - Kategori barang
  - Kode barang unik
  - Lokasi penyimpanan
  - Soft delete untuk data safety
- **Fields**: nama_barang, kode_barang, kategori, lokasi

### 2. Pengajuan Perbaikan (Repair Requests)
- **Model**: `PengajuanPerbaikan`
- **Fitur**:
  - Pengajuan perbaikan barang
  - Tracking status perbaikan
  - Relasi dengan barang
  - Departemen pengaju
- **Fields**: barang_id, nama_pengaju, deskripsi_kerusakan, status, departemen

### 3. Pemeriksaan Rutin (Routine Inspections)
- **Model**: `PemeriksaanRutin`
- **Fitur**:
  - Inspeksi berkala hardware dan software
  - Status pemeriksaan
  - Keterangan detail
- **Fields**: barang_id, nama_barang, kode_barang, kategori, lokasi, status, software_status, software_keterangan, hardware_status, hardware_keterangan

### 4. Sistem Laporan (Reporting System)
- **Model**: `Laporan`
- **Fitur**:
  - Export laporan ke PDF
  - Laporan barang, pengajuan perbaikan, pemeriksaan rutin
- **Export**: Menggunakan Laravel DOMPDF

### 5. Manajemen Pengguna (User Management)
- **Model**: `User`
- **Role-based Access**:
  - Admin: Mengelola semua fitur
  - User: Mengajukan perbaikan
  - Teknisi: Melakukan perbaikan
- **Fields**: name, email, username, role, dll.

## Struktur Database

### Tabel Utama:
1. **users** - Data pengguna dengan role
2. **barangs** - Inventaris barang IT
3. **pengajuan_perbaikans** - Data pengajuan perbaikan
4. **pemeriksaan_rutins** - Data pemeriksaan rutin
5. **laporans** - Data laporan

### Relasi:
- Barang hasMany PengajuanPerbaikan
- Barang hasMany PemeriksaanRutin
- PengajuanPerbaikan belongsTo Barang
- PemeriksaanRutin belongsTo Barang

## Arsitektur Aplikasi

### Controllers:
- `BarangController` - CRUD barang
- `PengajuanPerbaikanController` - CRUD pengajuan perbaikan
- `PemeriksaanRutinController` - CRUD pemeriksaan rutin
- `LaporanController` - Manajemen laporan
- `Admin\UserController` - Manajemen user (admin)
- `Admin\TeknisiController` - Manajemen teknisi (admin)
- `LoginController` - Authentication

### Middleware:
- `Authenticate` - Proteksi route yang butuh login
- `IsAdmin` - Proteksi route admin
- `IsUser` - Proteksi route user

### Views:
- Blade templates dengan layout utama
- Dashboard untuk admin dan user
- CRUD interfaces untuk semua modul
- PDF templates untuk export

## Routing Structure

```
/ (redirect to login)
/login - Authentication
/dashboard - Main dashboard

/barang* - Resource routes untuk barang
/pengajuanperbaikan* - Resource routes untuk pengajuan perbaikan
/pemeriksaanrutin* - Resource routes untuk pemeriksaan rutin
/laporan* - Resource routes untuk laporan

/admin/users* - Admin routes untuk user management
/admin/teknisi* - Admin routes untuk teknisi management

*-export - Routes untuk export PDF
```

## Fitur Tambahan

- **Soft Deletes**: Data tidak benar-benar dihapus dari database
- **PDF Export**: Semua laporan dapat diexport ke PDF
- **Role-based Access Control**: Sistem hak akses berdasarkan role
- **Responsive Design**: Interface yang responsive
- **Seeders**: Data awal untuk development/testing

## Status Pengembangan

Berdasarkan TODO.md, fitur "Login as Guest" telah dihapus. Aplikasi dalam kondisi production-ready dengan fitur lengkap untuk manajemen aset IT.

## Kesimpulan

Aplikasi ini merupakan sistem manajemen perbaikan IT yang komprehensif, cocok untuk organisasi yang membutuhkan tracking aset IT, pengajuan perbaikan, dan pemeliharaan berkala. Dengan arsitektur MVC Laravel yang robust dan fitur PDF export, aplikasi ini siap digunakan untuk operasional sehari-hari.
