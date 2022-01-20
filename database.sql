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
    nomor_surat VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    jenis_surat ENUM('SURAT TERBUKA','SURAT TERTUTUP') NOT NULL,
    sifat_surat ENUM('PRIBADI','RESMI PRIBADI', 'DINAS', 'NIAGA') NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_keluar)
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