CREATE DATABASE `db_surat_masuk_keluar`;
USE `db_surat_masuk_keluar`;

CREATE TABLE `tabel_arsip` (
    id_arsip INT NOT NULL AUTO_INCREMENT,
    lokasi varchar(255),
    nomor_dokumen VARCHAR(255),
    nama_dokumen VARCHAR(255),
    size int,
    tanggal DATE,
    upload VARCHAR(255),
    PRIMARY KEY(id_arsip)
);

CREATE TABLE `tabel_inventaris` (
    id_inventaris INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    merk VARCHAR(255) NOT NULL,
    jumlah int NOT NULL,
    harga int NOT NULL,
    tanggal_pembelian DATE NOT NULL,
    gambar VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NULL,
    PRIMARY KEY (id_inventaris)
);

CREATE TABLE `tabel_peminjaman_inventaris` (
    id_peminjaman_inventaris INT NOT NULL AUTO_INCREMENT,
    id_inventaris INT NOT NULL,
    nama VARCHAR(255) NOT NULL,
    tanggal_pinjam DATE NOT NULL,
    lama_pinjam int NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_peminjaman_inventaris),
    FOREIGN KEY (id_inventaris) REFERENCES tabel_inventaris (id_inventaris)
);

CREATE TABLE `tabel_ruangan` (
    id_ruangan INT NOT NULL AUTO_INCREMENT,
    nama_ruangan VARCHAR(255) NOT NULL,
    singkatan VARCHAR(10) UNIQUE NOT NULL,
    fasilitas VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NULL,
    PRIMARY KEY(id_ruangan)
);

INSERT INTO `tabel_ruangan` (
    nama_ruangan,
    singkatan,
    keterangan 
) VALUES 
('Umum dan Kepegawaian', 'UK', ''),
('Perencanaan dan Keuangan', 'PK', ''),
('Sekretaris', 'S1', ''),
('Fungsional', 'F', ''),
('Ruang Kepala Dinas', 'RKD', ''),
('Studio Mini', 'SM', ''),
('Musholla', 'M', ''),
('Wakapitu', 'W', ''),
('Aula', 'A', ''),
('Brailie Corner', 'BC', ''),
('Perpustakaan Keliling', 'PTK', ''),
('Sirkulasi', 'S2', ''),
('Ruangan Anak', 'RA', ''),
('Depo Arsip', 'DA', '');

CREATE TABLE `tabel_kode_surat` (
    id_kode_surat INT NOT NULL AUTO_INCREMENT,
    jenis_surat VARCHAR(50) NOT NULL,
    singkatan VARCHAR(10) UNIQUE NOT NULL,
    PRIMARY KEY(id_kode_surat)
);

INSERT INTO `tabel_kode_surat` (
    jenis_surat,
    singkatan
) VALUES 
('Surat Keputusan', 'SK'),
('Surat Undangan', 'SU'),
('Surat Permohonan', 'SPm'),
('Surat Pemberitahuan', 'SPb'),
('Surat Peminjaman', 'SPp'),
('Surat Pernyataan', 'SPn'),
('Surat Mandat', 'SM'),
('Surat Tugas', 'ST'),
('Surat Keterangan', 'Sket'),
('Surat Rekomendasi', 'SR'),
('Surat Balasan', 'SB'),
('Surat Perintah Perjalanan Dinas', 'SPPD'),
('Sertifikat', 'SRT'),
('Surat Perjanjian Kerja ', 'PK'),
('Surat Pengantar ', 'Speng');

CREATE TABLE `tabel_surat_masuk` (
    id_surat_masuk INT NOT NULL AUTO_INCREMENT,
    nomor_surat VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    perihal VARCHAR(255) NOT NULL,
    sifat_surat VARCHAR(255) NOT NULL,
    pengirim VARCHAR(255) NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_masuk)
);

CREATE TABLE `tabel_surat_keluar` (
    id_surat_keluar INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    id_kode_surat INT NOT NULL,
    nomor_surat VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    sifat_surat VARCHAR(255) NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_keluar),
    FOREIGN KEY(id_ruangan) REFERENCES tabel_ruangan(id_ruangan),
    FOREIGN KEY(id_kode_surat) REFERENCES tabel_kode_surat(id_kode_surat)
);

CREATE TABLE `tabel_surat_disposisi` (
    id_surat_disposisi INT NOT NULL AUTO_INCREMENT,
    nomor_surat VARCHAR(255) NOT NULL,
    nomor_disposisi VARCHAR(255) NOT NULL,
    tanggal VARCHAR(255) NOT NULL,
    tujuan VARCHAR(255) NOT NULL,
    pengirim VARCHAR(255) NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_disposisi)
);

CREATE TABLE `tabel_agenda` (
    id_agenda INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    detail_acara TEXT NOT NULL,
    terverifikasi TINYINT(1) NOT NULL,
    PRIMARY KEY(id_agenda),
    FOREIGN KEY(id_ruangan) REFERENCES tabel_ruangan(id_ruangan)
);

CREATE TABLE `tabel_peserta` (
    id_peserta INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    id_agenda INT NOT NULL,
    PRIMARY KEY(id_peserta),
    FOREIGN KEY(id_ruangan) REFERENCES tabel_ruangan(id_ruangan),
    FOREIGN KEY(id_agenda) REFERENCES tabel_agenda(id_agenda) ON DELETE CASCADE
);

CREATE TABLE `tabel_user` (
    id_user INT NOT NULL AUTO_INCREMENT,
    nama_user VARCHAR(255) NOT NULL,
    username_user VARCHAR(255) NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    status_user ENUM('ADMIN', 'PETUGAS', 'PIMPINAN') NOT NULL,
    PRIMARY KEY(id_user)
);

INSERT INTO `tabel_user` VALUES 
(null, 'admin', 'admin', 'admin' , 'ADMIN'),
(null, 'Muhammad Iqbal', 'iqbal', 'iqbal' , 'PETUGAS'),
(null, 'Muhammad Iqbal Pimpinan', 'pimpinan', 'pimpinan' , 'PIMPINAN');