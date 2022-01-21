<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Surat</h1>
    <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> -->
  </div><!-- End Page Title -->
  <br>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Surat Disposisi</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nomor Surat</th>
                  <th scope="col">Nomor Disposisi</th>
                  <th scope="col">Tanggal Surat</th>
                  <th scope="col">Tujuan</th>
                  <th scope="col">Pengirim</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "koneksi.php";
                require_once "utils.php";

                $no = 1;
                $sql = "SELECT * FROM tabel_surat_disposisi ORDER BY id_surat_disposisi DESC";
                $result = $mysqli->query($sql);
                ?>

                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <th class="align-middle" scope="row"><?= $no++; ?></th>
                    <td class="align-middle"><?= $row['nomor_surat']; ?></td>
                    <td class="align-middle"><?= $row['nomor_disposisi']; ?></td>
                    <td class="align-middle"><?= $row['tanggal']; ?></td>
                    <td class="align-middle"><?= $row['tujuan']; ?></td>
                    <td class="align-middle"><?= $row['pengirim']; ?></td>
                    <td class="d-flex justify-content-center gap-1">
                      <a href="surat_disposisi/uploads/<?= $row['dokumen_surat']; ?>" target="_blank" class="btn btn-secondary"><i class="bi bi-file-earmark"></i></a>
                      <a href="index.php?page=surat_disposisi&item=edit_surat_disposisi&id_surat_disposisi=<?= $row['id_surat_disposisi']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=surat_disposisi&item=delete_surat_disposisi&id_surat_disposisi=<?= $row['id_surat_disposisi']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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