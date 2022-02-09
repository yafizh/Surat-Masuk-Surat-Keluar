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
            <a id="kode_surat" class="nav-link collapsed" data-bs-target="#kode-surat-nav" data-bs-toggle="collapse" href="#">
                <i class="ri ri-mail-line"></i><span>Kode Surat</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="kode-surat-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a id="tampil_kode_surat" href="index.php?page=kode_surat&item=tampil_kode_surat">
                        <i class="bi bi-circle"></i><span>Data Kode Surat</span>
                    </a>
                </li>
                <li>
                    <a id="tambah_kode_surat" href="index.php?page=kode_surat&item=tambah_kode_surat">
                        <i class="bi bi-circle"></i><span>Tambah Kode Surat</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a id="ruangan" class="nav-link collapsed" data-bs-target="#ruangan-nav" data-bs-toggle="collapse" href="#">
                <i class="ri ri-mail-line"></i><span>Ruangan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ruangan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a id="tampil_ruangan" href="index.php?page=ruangan&item=tampil_ruangan">
                        <i class="bi bi-circle"></i><span>Data Ruangan</span>
                    </a>
                </li>
                <li>
                    <a id="tambah_ruangan" href="index.php?page=ruangan&item=tambah_ruangan">
                        <i class="bi bi-circle"></i><span>Tambah Ruangan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item" id="x">
            <a id="user" class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-mail-add-line"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a id="tampil_user" href="index.php?page=user&item=tampil_user">
                        <i class="bi bi-circle"></i><span>Data User</span>
                    </a>
                </li>
                <li>
                    <a id="tambah_user" href="index.php?page=user&item=tambah_user">
                        <i class="bi bi-circle"></i><span>Tambah User</span>
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
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a id="laporan" class="nav-link collapsed" href="index.php?page=laporan">
                <i class="bi bi-journal-text"></i>
                <span>Laporan</span>
            </a>
        </li><!-- End Tampil Surat Nav -->
    </ul>

</aside><!-- End Sidebar-->