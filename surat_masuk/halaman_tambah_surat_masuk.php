<?php

if (isset($_POST['submit'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $asal_surat = $_POST['asal_surat'];
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $perihal = $_POST['perihal'];

    $target_dir = "surat_masuk/uploads/";
    $file_name = Date("YmdHis_") . basename($_FILES["dokumen_surat"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $sizeOk = checkFileSize($_FILES["dokumen_surat"]["size"], 500000);
    $typeOk = allowedFileType($file_type, ['pdf']);

    // Check if $uploadOk is set to 0 by an error
    if ($sizeOk != 0 && $typeOk != 0) {
        if (move_uploaded_file($_FILES["dokumen_surat"]["tmp_name"], $target_file)) {
            $sql = "
                INSERT INTO tabel_surat_masuk (
                    asal_surat, 
                    nomor_surat, 
                    tanggal_surat, 
                    perihal, 
                    dokumen_surat
                ) VALUES (
                    '$asal_surat', 
                    '$nomor_surat', 
                    '$tanggal_surat',
                    '$perihal',
                    '$file_name'
                )";

            if ($mysqli->query($sql) === TRUE) "<script>alert('Surat Masuk berhasil ditambahkan.')</script>";
            else echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}

?>
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
                <h5 class="card-title">Surat Masuk</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Asal Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="asal_surat">
                            <div class="invalid-feedback">
                                Harap isi Asal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="nomor_surat">
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" required name="tanggal_surat">
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="perihal">
                            <div class="invalid-feedback">
                                Harap isi Perihal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" accept=".pdf" required name="dokumen_surat">
                            <div class="invalid-feedback">
                                Harap Tambahkan Dokumen Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Surat</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->