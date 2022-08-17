<?php
require_once "koneksi.php";
require_once "utils.php";
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laporan</h1>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-4">

        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <form id="form-surat" action="" target="_blank" method="POST">
              <h5 class="card-title">Laporan Surat</h5>
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
                  <label for="jenis_surat">Jenis Surat</label>
                  <select name="jenis_surat" id="jenis_surat" class="form-control" required>
                    <option value="" selected disabled>Pilih Jenis Surat</option>
                    <option value="masuk">Surat Masuk</option>
                    <option value="keluar">Surat Keluar</option>
                    <option value="disposisi">Surat Disposisi</option>
                  </select>
                </div>
              </div>
              <script>
                document.querySelector("#jenis_surat").addEventListener('change', function() {
                  if (this.value == 'masuk')
                    document.querySelector('#form-surat').setAttribute('action', 'laporan/cetak/laporan_surat_masuk.php');
                  else if (this.value == 'disposisi')
                    document.querySelector('#form-surat').setAttribute('action', 'laporan/cetak/laporan_surat_disposisi.php');
                  else if (this.value == 'keluar')
                    document.querySelector('#form-surat').setAttribute('action', 'laporan/cetak/laporan_surat_keluar.php');
                });
              </script>
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

          <!-- Default Card -->
          <div class="card">
          <div class="card-body">
            <form action="laporan/cetak/laporan_riwayat_peminjaman_inventaris.php" method="POST" target="_blank">
              <h5 class="card-title">Laporan Riwayat Peminjaman Barang Inventaris</h5>
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
              <input hidden type="text" name="nama_barang">
              <div class="row mb-3">
                <div class="col-md-12">
                  <?php
                  $sql = "SELECT * FROM tabel_inventaris ORDER BY id_inventaris DESC";
                  $result = $mysqli->query($sql);
                  ?>
                  <label for="id_inventaris">Barang Inventaris</label>
                  <select name="id_inventaris" id="id_inventaris" class="form-control" required>
                    <option value="" selected disabled>Pilih Barang</option>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                      <option value="<?= $row['id_inventaris']; ?>"><?= $row['nama']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>
              <script>
                document.querySelector('#id_inventaris').addEventListener('change', function(){
                  document.querySelector('input[name=nama_barang]').value = this.options[this.selectedIndex].text;
                })
              </script>
              <div class="row mb-3">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary w-100">Cetak</button>
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