<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Peminjaman Inventaris</h1>
  </div><!-- End Page Title -->
  <br>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Peminjaman Inventaris</h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Nama Peminjam</th>
                  <th scope="col">Tanggal Pinjam</th>
                  <th scope="col">Lama Pinjam</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "koneksi.php";
                require_once "utils.php";

                $no = 1;
                $sql = "SELECT tabel_peminjaman_inventaris.*, tabel_inventaris.nama AS nama_barang FROM tabel_peminjaman_inventaris INNER JOIN tabel_inventaris ON tabel_peminjaman_inventaris.id_inventaris=tabel_inventaris.id_inventaris ORDER BY tabel_peminjaman_inventaris.id_peminjaman_inventaris DESC";
                $result = $mysqli->query($sql);
                ?>

                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <th class="align-middle" scope="row"><?= $no++; ?></th>
                    <td class="align-middle"><?= $row['nama_barang']; ?></td>
                    <td class="align-middle"><?= $row['nama']; ?></td>
                    <td class="align-middle"><?= $row['tanggal_pinjam']; ?></td>
                    <td class="align-middle"><?= $row['lama_pinjam']; ?></td>
                    <td class="d-flex justify-content-center gap-1">
                      <a href="index.php?page=inventaris&item=edit_peminjaman_inventaris&id_peminjaman_inventaris=<?= $row['id_peminjaman_inventaris']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=inventaris&item=delete_peminjaman_inventaris&id_peminjaman_inventaris=<?= $row['id_peminjaman_inventaris']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<!-- Basic Modal -->
<div class="modal fade" id="basicModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nomor Surat <span id="judul_nomor_surat"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Asal Surat</label>
          <label class="col-sm-8 col-form-label" id="asal_surat"></label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Nomor Surat</label>
          <label class="col-sm-8 col-form-label" id="nomor_surat"></label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Tanggal Surat</label>
          <label class="col-sm-8 col-form-label" id="tanggal_surat"></label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Perihal</label>
          <label class="col-sm-8 col-form-label" id="perihal"></label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Dokumen Surat</label>
          <label class="col-sm-8 col-form-label"><a href="#" target="_blank" id="dokumen_surat">Klik Disini</a></label>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->

<script>
  const showDetail = (inventaris) => {
    document.querySelector(".modal-title #judul_nomor_surat").textContent = inventaris.nomor_surat;
    document.querySelector(".modal-body #asal_surat").textContent = inventaris.asal_surat;
    document.querySelector(".modal-body #nomor_surat").textContent = inventaris.nomor_surat;
    document.querySelector(".modal-body #tanggal_surat").textContent = inventaris.tanggal_surat;
    document.querySelector(".modal-body #perihal").textContent = inventaris.perihal;
    document.querySelector(".modal-body #dokumen_surat").setAttribute('href', 'inventaris/uploads/' + inventaris.dokumen_surat);
  }
</script>