CREATE DATABASE `db_surat_masuk_keluar`;
USE `db_surat_masuk_keluar`;

CREATE TABLE `tabel_ruangan` (
    id_ruangan INT NOT NULL AUTO_INCREMENT,
    nama_ruangan VARCHAR(255) NOT NULL,
    singkatan VARCHAR(10) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_ruangan)
);

CREATE TABLE `tabel_kode_surat` (
    id_kode_surat INT NOT NULL AUTO_INCREMENT,
    jenis_surat VARCHAR(50) NOT NULL,
    singkatan VARCHAR(10) NOT NULL,
    PRIMARY KEY(id_kode_surat)
);

CREATE TABLE `tabel_surat_masuk` (
    id_surat_masuk INT NOT NULL AUTO_INCREMENT,
    nomor_surat VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    perihal VARCHAR(255) NOT NULL,
    jenis_surat ENUM('SURAT TERBUKA','SURAT TERTUTUP') NOT NULL,
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
    sifat_surat ENUM('PRIBADI','RESMI PRIBADI', 'DINAS', 'NIAGA') NOT NULL,
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
    PRIMARY KEY(id_agenda)
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
    status_user ENUM('ADMIN', 'PETUGAS') NOT NULL,
    PRIMARY KEY(id_user)
);

INSERT INTO `tabel_user` VALUES (null, 'admin', 'admin', 'admin' , 'ADMIN');

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