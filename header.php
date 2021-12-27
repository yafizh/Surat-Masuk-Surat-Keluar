<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block"></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Beranda</span>
        </a>
      </li><!-- End Tampil Surat Nav -->
      <li class="nav-item">
        <a id="tampil_surat" class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-mail-line"></i><span>Data Surat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a id="tampil_surat_masuk" href="index.php?page=tampil_surat&item=tampil_surat_masuk">
              <i class="bi bi-circle"></i><span>Surat Masuk</span>
            </a>
          </li>
          <li>
            <a id="tampil_surat_keluar" href="index.php?page=tampil_surat&item=tampil_surat_keluar">
              <i class="bi bi-circle"></i><span>Surat Keluar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item" id="x">
        <a id="tambah_surat" class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-mail-add-line"></i><span>Tambah Surat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a id="tambah_surat_masuk" href="index.php?page=tambah_surat&item=tambah_surat_masuk">
              <i class="bi bi-circle"></i><span>Surat Masuk</span>
            </a>
          </li>
          <li>
            <a id="tambah_surat_keluar" href="index.php?page=tambah_surat&item=tambah_surat_keluar">
              <i class="bi bi-circle"></i><span>Surat Keluar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="laporan/laporan_surat_masuk_hari_ini.php" target="_blank">
              <i class="bi bi-circle"></i><span>Surat Masuk Hari ini</span>
            </a>
          </li>
          <li>
            <a href="laporan/laporan_surat_masuk_bulan_ini.php" target="_blank">
              <i class="bi bi-circle"></i><span>Surat Masuk Bulan ini</span>
            </a>
          </li>
          <li>
            <a href="laporan/laporan_seluruh_surat_masuk.php" target="_blank">
              <i class="bi bi-circle"></i><span>Seluruh Surat Masuk</span>
            </a>
          </li>
          <li>
            <a href="laporan/laporan_surat_keluar_hari_ini.php" target="_blank">
              <i class="bi bi-circle"></i><span>Surat Keluar Hari ini</span>
            </a>
          </li>
          <li>
            <a href="laporan/laporan_surat_keluar_bulan_ini.php" target="_blank">
              <i class="bi bi-circle"></i><span>Surat Keluar Bulan ini</span>
            </a>
          </li>
          <li>
            <a href="laporan/laporan_seluruh_surat_keluar.php" target="_blank">
              <i class="bi bi-circle"></i><span>Seluruh Surat Keluar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
    </ul>

  </aside><!-- End Sidebar-->