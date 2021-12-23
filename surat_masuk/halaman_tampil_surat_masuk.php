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
            <h5 class="card-title">Surat Masuk</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Asal Surat</th>
                  <th scope="col">Nomor Surat</th>
                  <th scope="col">Tanggal Surat</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "koneksi.php";
                require_once "utils.php";

                $no = 1;
                $sql = "SELECT * FROM tabel_surat_masuk";
                $result = $mysqli->query($sql);
                ?>

                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <th class="align-middle" scope="row"><?= $no++; ?></th>
                    <td class="align-middle"><?= $row['asal_surat']; ?></td>
                    <td class="align-middle"><?= $row['nomor_surat']; ?></td>
                    <td class="align-middle"><?= $row['tanggal_surat']; ?></td>
                    <td class="d-flex justify-content-center gap-1">
                      <button onclick="showDetail({
                          'id_surat_masuk': '<?= $row['id_surat_masuk']; ?>',
                          'asal_surat' : '<?= $row['asal_surat']; ?>',
                          'nomor_surat' : '<?= $row['nomor_surat']; ?>',
                          'tanggal_surat' : '<?= $row['tanggal_surat']; ?>',
                          'perihal' : '<?= $row['perihal']; ?>',
                          'dokumen_surat' : '<?= $row['dokumen_surat']; ?>'
                        })" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-eye"></i></button>
                      <a href="index.php?page=edit_surat&item=edit_surat_masuk&id_surat_masuk=<?= $row['id_surat_masuk']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=delete_surat&item=delete_surat_masuk&id_surat_masuk=<?= $row['id_surat_masuk']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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
  const showDetail = (surat_masuk) => {
    document.querySelector(".modal-title #judul_nomor_surat").textContent = surat_masuk.nomor_surat;
    document.querySelector(".modal-body #asal_surat").textContent = surat_masuk.asal_surat;
    document.querySelector(".modal-body #nomor_surat").textContent = surat_masuk.nomor_surat;
    document.querySelector(".modal-body #tanggal_surat").textContent = surat_masuk.tanggal_surat;
    document.querySelector(".modal-body #perihal").textContent = surat_masuk.perihal;
    document.querySelector(".modal-body #dokumen_surat").setAttribute('href', 'surat_masuk/uploads/' + surat_masuk.dokumen_surat);
  }
</script>