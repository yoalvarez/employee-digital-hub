-- =====================================================
-- Employee Digital Hub - Database Schema
-- Version: 1.0
-- Database: MySQL 8.0 / MariaDB 10.x
-- =====================================================

-- Set timezone dan charset
SET NAMES utf8mb4;
SET time_zone = '+07:00';

-- =====================================================
-- DROP TABLES (untuk development/reset)
-- =====================================================
DROP TABLE IF EXISTS `ticket_responses`;
DROP TABLE IF EXISTS `tickets`;
DROP TABLE IF EXISTS `asset_assignments`;
DROP TABLE IF EXISTS `assets`;
DROP TABLE IF EXISTS `vehicle_bookings`;
DROP TABLE IF EXISTS `vehicles`;
DROP TABLE IF EXISTS `articles`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `seksi`;

-- =====================================================
-- TABLE: roles
-- Deskripsi: Master data role untuk RBAC
-- =====================================================
CREATE TABLE `roles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL COMMENT 'Nama role: admin, pegawai, pimpinan',
    `description` VARCHAR(255) NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_roles_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: seksi
-- Deskripsi: Master data seksi/bagian di KPP
-- =====================================================
CREATE TABLE `seksi` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `kode` VARCHAR(10) NOT NULL COMMENT 'Kode seksi',
    `nama` VARCHAR(100) NOT NULL COMMENT 'Nama seksi/bagian',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_seksi_kode` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: users
-- Deskripsi: Data pegawai/pengguna sistem
-- =====================================================
CREATE TABLE `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nip` VARCHAR(18) NOT NULL COMMENT 'Nomor Induk Pegawai (18 digit)',
    `nama` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NULL,
    `password` VARCHAR(255) NOT NULL COMMENT 'Hashed password',
    `role_id` INT UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Default: pegawai',
    `seksi_id` INT UNSIGNED NULL,
    `jabatan` VARCHAR(100) NULL COMMENT 'Jabatan/posisi',
    `no_telepon` VARCHAR(20) NULL,
    `foto` VARCHAR(255) NULL COMMENT 'Path foto profil',
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `last_login` DATETIME NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` DATETIME NULL COMMENT 'Soft delete',
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_users_nip` (`nip`),
    UNIQUE KEY `uk_users_email` (`email`),
    KEY `idx_users_role` (`role_id`),
    KEY `idx_users_seksi` (`seksi_id`),
    KEY `idx_users_active` (`is_active`),
    CONSTRAINT `fk_users_role` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_users_seksi` FOREIGN KEY (`seksi_id`) REFERENCES `seksi`(`id`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: assets
-- Deskripsi: Master data aset IT
-- =====================================================
CREATE TABLE `assets` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `kode_asset` VARCHAR(50) NOT NULL COMMENT 'Kode inventaris unik',
    `nama` VARCHAR(100) NOT NULL COMMENT 'Nama/deskripsi aset',
    `kategori` ENUM('PC', 'Laptop', 'Printer', 'Scanner', 'Monitor', 'UPS', 'Router', 'Switch', 'Lainnya') NOT NULL,
    `merk` VARCHAR(50) NULL,
    `model` VARCHAR(100) NULL,
    `serial_number` VARCHAR(100) NULL,
    `spesifikasi` TEXT NULL COMMENT 'Detail spesifikasi teknis',
    `tahun_perolehan` YEAR NULL,
    `nilai_perolehan` DECIMAL(15,2) NULL COMMENT 'Harga/nilai aset',
    `lokasi` VARCHAR(100) NULL COMMENT 'Lokasi fisik aset',
    `kondisi` ENUM('Baik', 'Rusak Ringan', 'Rusak Berat', 'Sedang Diperbaiki', 'Afkir') NOT NULL DEFAULT 'Baik',
    `status` ENUM('Tersedia', 'Digunakan', 'Dipinjam', 'Dihapuskan') NOT NULL DEFAULT 'Tersedia',
    `catatan` TEXT NULL,
    `foto` VARCHAR(255) NULL COMMENT 'Path foto aset',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_assets_kode` (`kode_asset`),
    KEY `idx_assets_kategori` (`kategori`),
    KEY `idx_assets_kondisi` (`kondisi`),
    KEY `idx_assets_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: asset_assignments
-- Deskripsi: History penugasan/assignment aset ke pegawai
-- =====================================================
CREATE TABLE `asset_assignments` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `asset_id` INT UNSIGNED NOT NULL,
    `user_id` INT UNSIGNED NOT NULL COMMENT 'Pegawai yang menerima aset',
    `assigned_by` INT UNSIGNED NULL COMMENT 'Admin yang melakukan assignment',
    `tanggal_serah` DATE NOT NULL COMMENT 'Tanggal penyerahan',
    `tanggal_kembali` DATE NULL COMMENT 'Tanggal pengembalian (null jika masih digunakan)',
    `kondisi_serah` ENUM('Baik', 'Rusak Ringan', 'Rusak Berat') NOT NULL DEFAULT 'Baik',
    `kondisi_kembali` ENUM('Baik', 'Rusak Ringan', 'Rusak Berat') NULL,
    `catatan` TEXT NULL,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1=masih digunakan, 0=sudah dikembalikan',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_assignments_asset` (`asset_id`),
    KEY `idx_assignments_user` (`user_id`),
    KEY `idx_assignments_active` (`is_active`),
    CONSTRAINT `fk_assignments_asset` FOREIGN KEY (`asset_id`) REFERENCES `assets`(`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_assignments_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_assignments_admin` FOREIGN KEY (`assigned_by`) REFERENCES `users`(`id`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: tickets
-- Deskripsi: Tiket layanan IT (service desk)
-- =====================================================
CREATE TABLE `tickets` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nomor_tiket` VARCHAR(20) NOT NULL COMMENT 'Format: TKT-YYYYMMDD-XXXX',
    `user_id` INT UNSIGNED NOT NULL COMMENT 'Pegawai yang melapor',
    `asset_id` INT UNSIGNED NULL COMMENT 'Aset yang bermasalah (opsional)',
    `kategori` ENUM('Hardware', 'Software', 'Jaringan', 'Akun', 'Lainnya') NOT NULL,
    `judul` VARCHAR(200) NOT NULL,
    `deskripsi` TEXT NOT NULL,
    `prioritas` ENUM('Rendah', 'Sedang', 'Tinggi', 'Urgent') NOT NULL DEFAULT 'Sedang',
    `status` ENUM('Open', 'In Progress', 'Pending', 'Resolved', 'Closed') NOT NULL DEFAULT 'Open',
    `assigned_to` INT UNSIGNED NULL COMMENT 'Teknisi yang menangani',
    `lampiran` VARCHAR(255) NULL COMMENT 'Path file lampiran/foto',
    `resolved_at` DATETIME NULL,
    `closed_at` DATETIME NULL,
    `rating` TINYINT NULL COMMENT 'Rating kepuasan (1-5)',
    `feedback` TEXT NULL COMMENT 'Feedback dari user',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_tickets_nomor` (`nomor_tiket`),
    KEY `idx_tickets_user` (`user_id`),
    KEY `idx_tickets_asset` (`asset_id`),
    KEY `idx_tickets_status` (`status`),
    KEY `idx_tickets_assigned` (`assigned_to`),
    KEY `idx_tickets_created` (`created_at`),
    CONSTRAINT `fk_tickets_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_tickets_asset` FOREIGN KEY (`asset_id`) REFERENCES `assets`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT `fk_tickets_assigned` FOREIGN KEY (`assigned_to`) REFERENCES `users`(`id`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: ticket_responses
-- Deskripsi: Respons/komentar pada tiket
-- =====================================================
CREATE TABLE `ticket_responses` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `ticket_id` INT UNSIGNED NOT NULL,
    `user_id` INT UNSIGNED NOT NULL COMMENT 'User yang memberikan respons',
    `pesan` TEXT NOT NULL,
    `lampiran` VARCHAR(255) NULL,
    `is_internal` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '1=catatan internal admin',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_responses_ticket` (`ticket_id`),
    KEY `idx_responses_user` (`user_id`),
    CONSTRAINT `fk_responses_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT `fk_responses_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: vehicles
-- Deskripsi: Master data kendaraan dinas
-- =====================================================
CREATE TABLE `vehicles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nomor_polisi` VARCHAR(15) NOT NULL,
    `nama` VARCHAR(100) NOT NULL COMMENT 'Nama/jenis kendaraan',
    `merk` VARCHAR(50) NULL,
    `tipe` VARCHAR(50) NULL,
    `warna` VARCHAR(30) NULL,
    `tahun` YEAR NULL,
    `kapasitas` TINYINT NULL COMMENT 'Kapasitas penumpang',
    `nomor_bpkb` VARCHAR(50) NULL,
    `nomor_stnk` VARCHAR(50) NULL,
    `tanggal_pajak` DATE NULL COMMENT 'Tanggal jatuh tempo pajak',
    `kondisi` ENUM('Baik', 'Perlu Service', 'Rusak') NOT NULL DEFAULT 'Baik',
    `status` ENUM('Tersedia', 'Digunakan', 'Service', 'Tidak Aktif') NOT NULL DEFAULT 'Tersedia',
    `foto` VARCHAR(255) NULL,
    `catatan` TEXT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_vehicles_nopol` (`nomor_polisi`),
    KEY `idx_vehicles_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: vehicle_bookings
-- Deskripsi: Data peminjaman kendaraan dinas
-- =====================================================
CREATE TABLE `vehicle_bookings` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `kode_booking` VARCHAR(20) NOT NULL COMMENT 'Format: VHC-YYYYMMDD-XXXX',
    `vehicle_id` INT UNSIGNED NOT NULL,
    `user_id` INT UNSIGNED NOT NULL COMMENT 'Pegawai yang meminjam',
    `keperluan` VARCHAR(255) NOT NULL,
    `tujuan` VARCHAR(255) NOT NULL,
    `jumlah_penumpang` TINYINT NULL,
    `tanggal_mulai` DATE NOT NULL,
    `jam_mulai` TIME NOT NULL,
    `tanggal_selesai` DATE NOT NULL,
    `jam_selesai` TIME NOT NULL,
    `status` ENUM('Pending', 'Approved', 'Rejected', 'Ongoing', 'Completed', 'Cancelled') NOT NULL DEFAULT 'Pending',
    `approved_by` INT UNSIGNED NULL,
    `approved_at` DATETIME NULL,
    `catatan_approval` TEXT NULL,
    `km_awal` INT NULL COMMENT 'Kilometer awal',
    `km_akhir` INT NULL COMMENT 'Kilometer akhir',
    `catatan` TEXT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_bookings_kode` (`kode_booking`),
    KEY `idx_bookings_vehicle` (`vehicle_id`),
    KEY `idx_bookings_user` (`user_id`),
    KEY `idx_bookings_status` (`status`),
    KEY `idx_bookings_tanggal` (`tanggal_mulai`, `tanggal_selesai`),
    CONSTRAINT `fk_bookings_vehicle` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles`(`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_bookings_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE,
    CONSTRAINT `fk_bookings_approver` FOREIGN KEY (`approved_by`) REFERENCES `users`(`id`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- TABLE: articles
-- Deskripsi: Knowledge base / artikel tips IT
-- =====================================================
CREATE TABLE `articles` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `judul` VARCHAR(200) NOT NULL,
    `slug` VARCHAR(220) NOT NULL COMMENT 'URL-friendly title',
    `konten` TEXT NOT NULL,
    `ringkasan` VARCHAR(500) NULL COMMENT 'Excerpt/ringkasan',
    `kategori` ENUM('Tips & Trik', 'Tutorial', 'Troubleshooting', 'Pengumuman', 'FAQ') NOT NULL,
    `thumbnail` VARCHAR(255) NULL,
    `author_id` INT UNSIGNED NOT NULL,
    `is_published` TINYINT(1) NOT NULL DEFAULT 0,
    `published_at` DATETIME NULL,
    `view_count` INT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_articles_slug` (`slug`),
    KEY `idx_articles_kategori` (`kategori`),
    KEY `idx_articles_published` (`is_published`),
    KEY `idx_articles_author` (`author_id`),
    FULLTEXT KEY `ft_articles_search` (`judul`, `konten`),
    CONSTRAINT `fk_articles_author` FOREIGN KEY (`author_id`) REFERENCES `users`(`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- SEED DATA: Roles
-- =====================================================
INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator sistem (GA/IT)'),
(2, 'pegawai', 'Pegawai biasa'),
(3, 'pimpinan', 'Pimpinan/atasan (view & approval)');

-- =====================================================
-- SEED DATA: Seksi KPP Pratama
-- =====================================================
INSERT INTO `seksi` (`kode`, `nama`) VALUES
('SUBUM', 'Subbagian Umum dan Kepatuhan Internal'),
('PDI', 'Seksi Pengolahan Data dan Informasi'),
('PELAYANAN', 'Seksi Pelayanan'),
('PENAGIHAN', 'Seksi Penagihan'),
('PEMERIKSAAN', 'Seksi Pemeriksaan'),
('PENGAWASAN1', 'Seksi Pengawasan I'),
('PENGAWASAN2', 'Seksi Pengawasan II'),
('PENGAWASAN3', 'Seksi Pengawasan III'),
('PENGAWASAN4', 'Seksi Pengawasan IV'),
('PENGAWASAN5', 'Seksi Pengawasan V'),
('PENGAWASAN6', 'Seksi Pengawasan VI');

-- =====================================================
-- SEED DATA: Default Admin User
-- Password: admin123 (hashed dengan password_hash)
-- =====================================================
INSERT INTO `users` (`nip`, `nama`, `email`, `password`, `role_id`, `seksi_id`, `jabatan`, `is_active`) VALUES
('000000000000000000', 'Administrator', 'admin@kpp.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, 'Administrator Sistem', 1);

-- =====================================================
-- VIEWS (Optional - untuk reporting)
-- =====================================================

-- View: Aset dengan pemegang saat ini
CREATE OR REPLACE VIEW `v_asset_current_holder` AS
SELECT 
    a.*,
    aa.user_id as holder_id,
    u.nama as holder_nama,
    u.nip as holder_nip,
    s.nama as holder_seksi,
    aa.tanggal_serah
FROM assets a
LEFT JOIN asset_assignments aa ON a.id = aa.asset_id AND aa.is_active = 1
LEFT JOIN users u ON aa.user_id = u.id
LEFT JOIN seksi s ON u.seksi_id = s.id;

-- View: Statistik tiket per status
CREATE OR REPLACE VIEW `v_ticket_stats` AS
SELECT 
    status,
    COUNT(*) as jumlah,
    DATE(created_at) as tanggal
FROM tickets
GROUP BY status, DATE(created_at);

-- View: Booking kendaraan aktif
CREATE OR REPLACE VIEW `v_active_bookings` AS
SELECT 
    vb.*,
    v.nama as kendaraan_nama,
    v.nomor_polisi,
    u.nama as peminjam_nama,
    u.nip as peminjam_nip,
    s.nama as peminjam_seksi
FROM vehicle_bookings vb
JOIN vehicles v ON vb.vehicle_id = v.id
JOIN users u ON vb.user_id = u.id
LEFT JOIN seksi s ON u.seksi_id = s.id
WHERE vb.status IN ('Pending', 'Approved', 'Ongoing')
AND vb.tanggal_selesai >= CURDATE();