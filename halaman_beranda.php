<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <?php require_once "koneksi.php"; ?>
          <!-- Sales Card -->
          <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Surat Masuk</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-mail-unread-line"></i>
                  </div>
                  <?php
                  $sql = "SELECT COUNT(*) AS surat_masuk FROM tabel_surat_masuk";
                  $result = $mysqli->query($sql);
                  $row = $result->fetch_assoc();
                  $surat_masuk = $row['surat_masuk'];

                  $sql = "SELECT COUNT(*) AS surat_masuk_hari_ini FROM tabel_surat_masuk WHERE tanggal_surat='" . Date("Y-m-d") . "'";
                  $result = $mysqli->query($sql);
                  $row = $result->fetch_assoc();
                  $surat_masuk_hari_ini = $row['surat_masuk_hari_ini'];
                  ?>
                  <div class="ps-3">
                    <h6><?= $surat_masuk; ?> Surat</h6>
                    <span class="text-success small pt-1 fw-bold"><?= $surat_masuk_hari_ini; ?></span> <span class="text-muted small pt-2 ps-1">Surat Hari ini</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-6 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Surat Keluar</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-mail-send-line"></i>
                  </div>
                  <?php
                  $sql = "SELECT COUNT(*) AS surat_keluar FROM tabel_surat_keluar";
                  $result = $mysqli->query($sql);
                  $row = $result->fetch_assoc();
                  $surat_keluar = $row['surat_keluar'];

                  $sql = "SELECT COUNT(*) AS surat_keluar_hari_ini FROM tabel_surat_keluar WHERE tanggal_surat='" . Date("Y-m-d") . "'";
                  $result = $mysqli->query($sql);
                  $row = $result->fetch_assoc();
                  $surat_keluar_hari_ini = $row['surat_keluar_hari_ini'];
                  ?>
                  <div class="ps-3">
                    <h6><?= $surat_keluar; ?> Surat</h6>
                    <span class="text-success small pt-1 fw-bold"><?= $surat_keluar_hari_ini; ?></span> <span class="text-muted small pt-2 ps-1">Surat Hari ini</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body pb-0">
                <h5 class="card-title">Surat Masuk Terakhir</h5>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nomor Surat</th>
                      <th scope="col">Tanggal Surat</th>
                      <th scope="col">Perihal</th>
                      <th scope="col">Sifat Surat</th>
                      <th scope="col">Pengirim</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM tabel_surat_masuk ORDER BY id_surat_masuk DESC";
                    $result = $mysqli->query($sql);
                    ?>

                    <?php while ($row = $result->fetch_assoc()) : ?>
                      <tr>
                        <th class="align-middle" scope="row"><?= $no++; ?></th>
                        <td class="align-middle"><?= $row['nomor_surat']; ?></td>
                        <td class="align-middle"><?= $row['tanggal_surat']; ?></td>
                        <td class="align-middle"><?= $row['perihal']; ?></td>
                        <td class="align-middle"><?= $row['sifat_surat']; ?></td>
                        <td class="align-middle"><?= $row['pengirim']; ?></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- End Top Selling -->

          <div class="col-12">
            <div class="card top-selling">

              <div class="card-body pb-0">
                <h5 class="card-title">Surat Keluar Terakhir</h5>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Unit Pengolah</th>
                      <th scope="col">Nomor Surat</th>
                      <th scope="col">Tanggal Surat</th>
                      <th scope="col">Jenis Surat</th>
                      <th scope="col">Sifat Surat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "
                    SELECT 
                      * 
                    FROM 
                      tabel_surat_keluar 
                    LEFT JOIN 
                      tabel_ruangan 
                    ON tabel_ruangan.id_ruangan=tabel_surat_keluar.id_ruangan 
                    LEFT JOIN 
                      tabel_kode_surat 
                    ON tabel_kode_surat.id_kode_surat=tabel_surat_keluar.id_kode_surat 
                    ORDER BY id_surat_keluar DESC";
                    $result = $mysqli->query($sql);
                    ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                      <tr>
                        <th class="align-middle" scope="row"><?= $no++; ?></th>
                        <td class="align-middle"><?= $row['nama_ruangan']; ?></td>
                        <td class="align-middle"><?= $row['nomor_surat']; ?></td>
                        <td class="align-middle"><?= $row['tanggal_surat']; ?></td>
                        <td class="align-middle"><?= $row['jenis_surat']; ?></td>
                        <td class="align-middle"><?= $row['sifat_surat']; ?></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->
        </div>
      </div><!-- End Left side columns -->
      <div class="col-lg-4">
        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Agenda Hari ini</h5>

            <div class="activity">

              <?php
              $warna = ['text-success', 'text-danger', 'text-primary', 'text-info', 'text-warning', 'text-muted'];
              $sql = "
                    SELECT 
                      * 
                    FROM 
                      tabel_agenda 
                    WHERE 
                      tanggal = CURRENT_DATE() 
                    ORDER BY id_agenda DESC";
              $result = $mysqli->query($sql);
              ?>
              <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="activity-item d-flex">
                  <div class="activite-label"><?= explode(':', $row['waktu'])[0] . ':' . explode(':', $row['waktu'])[1]; ?></div>
                  <i class="bi bi-circle-fill activity-badge <?= $warna[rand(0, 5)]; ?> align-self-start"></i>
                  <div class="activity-content">
                    <?= $row['detail_acara']; ?>
                  </div>
                </div><!-- End activity item-->
              <?php endwhile; ?>
            </div>

          </div>
        </div>
      </div>

    </div>
  </section>

</main><!-- End #main -->