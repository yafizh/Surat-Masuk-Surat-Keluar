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
                <tr>
                  <th class="align-middle" scope="row">1</th>
                  <td class="align-middle">PT ABC INDO SUKSES</td>
                  <td class="align-middle">80/SPD/X/2018</td>
                  <td class="align-middle">5 Desember 2021</td>
                  <td class="d-flex justify-content-center gap-1">
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-eye"></i></button>
                    <a href="index.php?page=edit_surat&item=edit_surat_masuk" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <a href="index.php?page=delete_surat&item=delete_surat_masuk" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th class="align-middle" scope="row">2</th>
                  <td class="align-middle">Bridie Kessler</td>
                  <td class="align-middle">Developer</td>
                  <td class="align-middle">9 Desember 2021</td>
                  <td class="d-flex justify-content-center gap-1">
                    <a type="button" class="btn btn-secondary"><i class="bi bi-eye"></i></a>
                    <a type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <a type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th class="align-middle" scope="row">3</th>
                  <td class="align-middle">Ashleigh Langosh</td>
                  <td class="align-middle">Finance</td>
                  <td class="align-middle">30 Desember 2021</td>
                  <td class="d-flex justify-content-center gap-1">
                    <a type="button" class="btn btn-secondary"><i class="bi bi-eye"></i></a>
                    <a type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <a type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th class="align-middle" scope="row">4</th>
                  <td class="align-middle">Angus Grady</td>
                  <td class="align-middle">HR</td>
                  <td class="align-middle">15 Februari 2022</td>
                  <td class="d-flex justify-content-center gap-1">
                    <a type="button" class="btn btn-secondary"><i class="bi bi-eye"></i></a>
                    <a type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <a type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th class="align-middle" scope="row">5</th>
                  <td class="align-middle">Raheem Lehner</td>
                  <td class="align-middle">Dynamic Division Officer</td>
                  <td class="align-middle">1 Januari 2022</td>
                  <td class="d-flex justify-content-center gap-1">
                    <a type="button" class="btn btn-secondary"><i class="bi bi-eye"></i></a>
                    <a type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <a type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
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
        <h5 class="modal-title">Nomor Surat 80/SPD/X/2018</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Asal Surat</label>
          <label class="col-sm-8 col-form-label">: PT ABC INDO SUKSES</label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Nomor Surat</label>
          <label class="col-sm-8 col-form-label">: 80/SPD/X/2018</label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Tanggal Surat</label>
          <label class="col-sm-8 col-form-label">: 5 Desember 2021</label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Perihal</label>
          <label class="col-sm-8 col-form-label">: Surat Pengantar Dokumen</label>
        </div>
        <div class="row mb-3">
          <label class="col-sm-4 col-form-label">Dokumen Surat</label>
          <label class="col-sm-8 col-form-label"><a href="#">: Klik disini</a></label>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->