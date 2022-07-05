<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_GET['id_arsip'])) {
  $sql = "UPDATE tabel_arsip 
          SET 
            terverifikasi=1 
          WHERE 
              id_arsip=" . $_GET['id_arsip'];
  if ($mysqli->query($sql) === TRUE) {
    echo "<script>alert('arsip berhasil disetujui.')</script>";
    echo "<script>" .
      "window.location.href='index.php?page=arsip&item=tampil_arsip';" .
      "</script>";
  } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Arsip</h1>
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
            <h5 class="card-title" style="flex: 1;">Arsip</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nomor Dokumen</th>
                  <th scope="col">Nama Dokumen</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Size</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = "SELECT * FROM tabel_arsip ORDER BY id_arsip DESC";
                $result = $mysqli->query($sql);
                ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <th class="align-middle" scope="row"><?= $no++; ?></th>
                    <td class="align-middle"><?= $row['nomor_dokumen']; ?></td>
                    <td class="align-middle"><?= $row['nama_dokumen']; ?></td>
                    <td class="align-middle"><?= $row['lokasi']; ?></td>
                    <td class="align-middle"><?= $row['size']; ?></td>
                    <td class="align-middle"><?= $row['keterangan']; ?></td>
                    <td class="d-flex justify-content-center gap-1">
                      <a href="index.php?page=arsip&item=edit_arsip&id_arsip=<?= $row['id_arsip']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=arsip&item=delete_arsip&id_arsip=<?= $row['id_arsip']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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