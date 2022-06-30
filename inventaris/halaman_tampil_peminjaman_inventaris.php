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
                  <th scope="col">Nomor Telepon</th>
                  <th scope="col">Tanggal Pinjam</th>
                  <th scope="col">Sampai</th>
                  <th scope="col">Status</th>
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
                    <td class="align-middle"><?= $row['nomor_telepon']; ?></td>
                    <td class="align-middle"><?= $row['tanggal_pinjam']; ?></td>
                    <td class="align-middle"><?= $row['sampai']; ?></td>
                    <td class="align-middle">
                      <?php if ($row['status'] === 'DITERIMA') : ?>
                        <span class="badge bg-success">Diterima</span>
                      <?php elseif ($row['status'] === 'DITOLAK') : ?>
                        <span class="badge bg-danger">Ditolak</span>
                      <?php elseif ($row['status'] === 'PENGAJUAN') : ?>
                        <span class="badge bg-warning">Pengajuan</span>
                      <?php endif; ?>
                    </td>
                    <td class="d-flex justify-content-center gap-1">
                      <a href="index.php?page=inventaris&item=detail_peminjaman_inventaris&id_peminjaman_inventaris=<?= $row['id_peminjaman_inventaris']; ?>" class="btn btn-info"><i class="bi bi-eye"></i></a>
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