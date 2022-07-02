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
            <h5 class="card-title">Surat Keluar</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Unit Pengolah</th>
                  <th scope="col">Nomor Surat</th>
                  <th scope="col">Tanggal Surat</th>
                  <th scope="col">Jenis Surat</th>
                  <th scope="col">Sifat Surat</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "koneksi.php";
                $no = 1;
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
                    <td class="d-flex justify-content-center gap-1">
                      <a href="surat_keluar/uploads/<?= $row['dokumen_surat']; ?>" target="_blank" class="btn btn-secondary"><i class="bi bi-file-earmark"></i></a>
                      <a href="index.php?page=surat_keluar&item=edit_surat_keluar&id_surat_keluar=<?= $row['id_surat_keluar']; ?>" class="btn btn-warning text-light"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=surat_keluar&item=delete_surat_keluar&id_surat_keluar=<?= $row['id_surat_keluar']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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