<?php
require_once "koneksi.php";
require_once "utils.php";
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laporan</h1>
    <!-- <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Components</li>
        <li class="breadcrumb-item active">Cards</li>
      </ol>
    </nav> -->
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-4">

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_surat_masuk.php" target="_blank" method="POST">
              <h5 class="card-title">Laporan Surat Masuk</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="dari">Dari</label>
                  <input type="date" value="2000-01-01" name="dari" id="dari" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="sampai">Sampai</label>
                  <input type="date" value="<?= Date("Y-m-d"); ?>" name="sampai" id="sampai" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_surat_disposisi.php" target="_blank" method="POST">
              <h5 class="card-title">Laporan Surat Disposisi</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="dari">Dari</label>
                  <input type="date" value="2000-01-01" name="dari" id="dari" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="sampai">Sampai</label>
                  <input type="date" value="<?= Date("Y-m-d"); ?>" name="sampai" id="sampai" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_arsip.php" target="_blank" method="POST">
              <h5 class="card-title">Laporan Arsip</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="dari">Dari</label>
                  <input type="date" value="2000-01-01" name="dari" id="dari" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="sampai">Sampai</label>
                  <input type="date" value="<?= Date("Y-m-d"); ?>" name="sampai" id="sampai" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->
      </div>

      <div class="col-lg-4">

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_surat_keluar.php" target="_blank" method="POST">
              <h5 class="card-title">Laporan Surat Keluar</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="dari">Dari</label>
                  <input type="date" value="2000-01-01" name="dari" id="dari" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="sampai">Sampai</label>
                  <input type="date" value="<?= Date("Y-m-d"); ?>" name="sampai" id="sampai" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <?php
                  $sql = "SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC";
                  $result = $mysqli->query($sql);
                  ?>
                  <label for="id_ruangan">Unit Pengolah</label>
                  <select name="id_ruangan" id="id_ruangan" class="form-control">
                    <option value="">Semua Unit</option>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                      <option value="<?= $row['id_ruangan']; ?>"><?= $row['nama_ruangan']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <?php
                  $sql = "SELECT * FROM tabel_kode_surat ORDER BY id_kode_surat DESC";
                  $result = $mysqli->query($sql);
                  ?>
                  <label for="id_kode_surat">Kode Surat</label>
                  <select name="id_kode_surat" id="id_kode_surat" class="form-control">
                    <option value="">Semua Jenis</option>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                      <option value="<?= $row['id_kode_surat']; ?>"><?= $row['jenis_surat']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_agenda.php" target="_blank" method="POST">
              <h5 class="card-title">Laporan Agenda</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="dari">Dari</label>
                  <input type="date" value="2000-01-01" id="dari" name="dari" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="sampai">Sampai</label>
                  <input type="date" value="<?= Date("Y-m-d"); ?>" name="sampai" id="sampai" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <?php
                  $sql = "SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC";
                  $result = $mysqli->query($sql);
                  ?>
                  <label for="id_ruangan">Ruangan</label>
                  <select name="id_ruangan" id="id_ruangan" class="form-control">
                    <option value="">Semua Ruangan</option>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                      <option value="<?= $row['id_ruangan']; ?>"><?= $row['nama_ruangan']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->
      </div>

      <div class="col-lg-4">

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_peminjaman_inventaris.php" method="POST" target="_blank">
              <h5 class="card-title">Laporan Peminjaman Inventaris</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="dari">Dari</label>
                  <input type="date" value="2000-01-01" name="dari" id="dari" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="sampai">Sampai</label>
                  <input type="date" value="<?= Date("Y-m-d"); ?>" name="sampai" id="sampai" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_inventaris.php" target="_blank">
              <h5 class="card-title">Laporan Inventaris</h5>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->


        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_jumlah_inventaris_yang_dipinjam.php" method="POST" target="_blank">
              <h5 class="card-title">Laporan Jumlah Inventaris yang Dipinjam</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="dari">Dari</label>
                  <input type="date" value="2000-01-01" name="dari" id="dari" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="sampai">Sampai</label>
                  <input type="date" value="<?= Date("Y-m-d"); ?>" name="sampai" id="sampai" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary w-100">Cetak</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- End Default Card -->


      </div>
    </div>
  </section>

</main><!-- End #main -->