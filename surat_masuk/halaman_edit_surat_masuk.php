<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Surat</h1>
        <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Surat Masuk</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Asal Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="PT ABC INDO SUKSES" required>
                            <div class="invalid-feedback">
                                Harap isi Asal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="80/SPD/X/2018" required>
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" value="2021-12-05" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="Surat Pengantar Dokumen" required>
                            <div class="invalid-feedback">
                                Harap isi Perihal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" accept=".pdf">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" class="btn btn-primary">Edit Surat</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->