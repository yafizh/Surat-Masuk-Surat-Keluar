<?php

if (isset($_POST['submit'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $nomor_surat = $_POST['nomor_surat'];
    $nomor_disposisi = $_POST['nomor_disposisi'];
    $tanggal = $_POST['tanggal'];
    $tujuan = $_POST['tujuan'];
    $pengirim = $_POST['pengirim'];

    $target_dir = "surat_disposisi/uploads/";
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
                INSERT INTO tabel_surat_disposisi (
                    nomor_surat, 
                    nomor_disposisi, 
                    tanggal, 
                    tujuan, 
                    pengirim, 
                    dokumen_surat
                ) VALUES (
                    '$nomor_surat', 
                    '$nomor_disposisi', 
                    '$tanggal',
                    '$tujuan',
                    '$pengirim', 
                    '$file_name'
                )";

            if ($mysqli->query($sql) === TRUE) echo "<script>alert('Surat Disposisi berhasil ditambahkan.')</script>";
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
                <h5 class="card-title">Surat Disposisi</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_surat" required name="nomor_surat">
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomor_disposisi" class="col-sm-2 col-form-label">Nomor Disposisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_disposisi" required name="nomor_disposisi">
                            <div class="invalid-feedback">
                                Harap isi Nomor Disposisi.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" required name="tanggal">
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tujuan" required name="tujuan">
                            <div class="invalid-feedback">
                                Harap isi Tujuan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pengirim" required name="pengirim">
                            <div class="invalid-feedback">
                                Harap isi Pengirim.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_surat" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" accept=".pdf" id="dokumen_surat" required name="dokumen_surat">
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