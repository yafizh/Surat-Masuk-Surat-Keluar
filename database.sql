CREATE DATABASE `db_surat_masuk_keluar`;
USE `db_surat_masuk_keluar`;

CREATE TABLE `tabel_surat_masuk` (
    id_surat_masuk INT NOT NULL AUTO_INCREMENT,
    asal_surat VARCHAR(255) NOT NULL,
    nomor_surat VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    perihal VARCHAR(255) NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_masuk)
);

INSERT INTO `tabel_surat_masuk` (
    asal_surat, 
    nomor_surat, 
    tanggal_surat, 
    perihal, 
    dokumen_surat
) VALUES 
('PT ABC INDO SUKSES','80/SPD/X/2018','2018-09-01','Surat Pengantar Dokumen','surat_masuk1.pdf'),
('PEMERINTAH KABUPATEN KULON PROGO','221/SMAKP/SU/VI/2017','2017-06-12','Pengantar Pembuatan Kartu Suami (Karsu)','surat_masuk2.pdf'),
('Naufal Hidayat','','2017-06-12','Permohonan Magang Kerja','surat_masuk2.pdf'),
('Dinas Kesehatan','440/7181/KD.D','2015-12-07','Pemberitahuan Layanan Kesehatan','surat_masuk4.pdf'),
('Rumah Sakit','445/03279','2017-05-05','Laporan dan Evaluasi Pelayanan Informasi Publik Tahun 2016','surat_masuk5.pdf');

CREATE TABLE `tabel_surat_keluar` (
    id_surat_keluar INT NOT NULL AUTO_INCREMENT,
    unit_pengolah VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    nomor_surat VARCHAR(255) NOT NULL,
    perihal VARCHAR(255) NOT NULL,
    tujuan_surat VARCHAR(255) NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_keluar)
);