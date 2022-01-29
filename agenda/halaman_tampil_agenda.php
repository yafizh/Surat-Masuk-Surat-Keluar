<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_GET['id_agenda'])) {
  $sql = "UPDATE tabel_agenda 
          SET 
            terverifikasi=1 
          WHERE 
              id_agenda=" . $_GET['id_agenda'];
  if ($mysqli->query($sql) === TRUE) {
    echo "<script>alert('Agenda berhasil disetujui.')</script>";
    echo "<script>" .
      "window.location.href='index.php?page=agenda&item=tampil_agenda';" .
      "</script>";
  } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Agenda</h1>
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
            <h5 class="card-title" style="flex: 1;">Agenda</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = "SELECT * FROM tabel_agenda INNER JOIN tabel_ruangan ON tabel_ruangan.id_ruangan=tabel_agenda.id_ruangan ORDER BY id_agenda DESC";
                $result = $mysqli->query($sql);
                ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <th class="align-middle" scope="row"><?= $no++; ?></th>
                    <td class="align-middle"><?= $row['tanggal']; ?></td>
                    <td class="align-middle"><?= $row['waktu']; ?></td>
                    <td class="align-middle"><?= $row['nama_ruangan']; ?></td>
                    <td class="align-middle"><?= ($row['terverifikasi'] == 0) ? "Menunggu Persetujuan" : "Disetujui"; ?></td>
                    <td class="d-flex justify-content-center gap-1">
                      <?php if ($_SESSION['status_user'] == 'ADMIN' && $row['terverifikasi'] == 0) : ?>
                        <a href="index.php?page=agenda&item=tampil_agenda&id_agenda=<?= $row['id_agenda']; ?>" class="btn btn-success"><i class="bi bi-check2"></i></a>
                        <a href="index.php?page=agenda&item=delete_agenda&id_agenda=<?= $row['id_agenda']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menolak agenda ini?')"><i class="bi bi-x"></i></a>
                      <?php endif; ?>
                      <a href="index.php?page=agenda&item=edit_agenda&id_agenda=<?= $row['id_agenda']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=agenda&item=delete_agenda&id_agenda=<?= $row['id_agenda']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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