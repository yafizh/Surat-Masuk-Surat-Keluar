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
            <a id="surat_keluar" class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="ri ri-mail-line"></i><span>Surat Keluar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a id="tampil_surat_keluar" href="index.php?page=surat_keluar&item=tampil_surat_keluar">
                        <i class="bi bi-circle"></i><span>Data Surat Keluar</span>
                    </a>
                </li>
                <li>
                    <a id="tambah_surat_keluar" href="index.php?page=surat_keluar&item=tambah_surat_keluar">
                        <i class="bi bi-circle"></i><span>Tambah Surat Keluar</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item" id="x">
            <a id="surat_masuk" class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-mail-add-line"></i><span>Surat Masuk</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a id="tampil_surat_masuk" href="index.php?page=surat_masuk&item=tampil_surat_masuk">
                        <i class="bi bi-circle"></i><span>Data Surat Masuk</span>
                    </a>
                </li>
                <li>
                    <a id="tambah_surat_masuk" href="index.php?page=surat_masuk&item=tambah_surat_masuk">
                        <i class="bi bi-circle"></i><span>Tambah Surat Masuk</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->
        <li class="nav-item" id="x">
            <a id="agenda" class="nav-link collapsed" data-bs-target="#agenda-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-mail-add-line"></i><span>Agenda</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="agenda-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a id="tampil_agenda" href="index.php?page=agenda&item=tampil_agenda">
                        <i class="bi bi-circle"></i><span>Data Agenda</span>
                    </a>
                </li>
                <li>
                    <a id="tambah_agenda" href="index.php?page=agenda&item=tambah_agenda">
                        <i class="bi bi-circle"></i><span>Tambah Agenda</span>
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
                    <a href="index.php?page=laporan" target="_blank">
                        <i class="bi bi-circle"></i><span>Laporan</span>
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