<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Surat</h1>
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
                <h5 class="card-title">Surat Keluar</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Unit Pengolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="unit_pengolah" required>
                            <div class="invalid-feedback">
                                Harap isi Unt Pengolah Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nomor Surat Keluar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_surat" required>
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_surat" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="perihal" required>
                            <div class="invalid-feedback">
                                Harap isi Perihal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tujuan" required>
                            <div class="invalid-feedback">
                                Harap isi Tujuan Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="dokumen" accept=".pdf" required>
                            <div class="invalid-feedback">
                                Harap Tambahkan Dokumen Surat.
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" class="btn btn-primary">Tambah Surat</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->