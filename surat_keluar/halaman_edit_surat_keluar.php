<?php

if (isset($_GET['id_surat_keluar'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_surat_keluar WHERE id_surat_keluar=" . $_GET['id_surat_keluar'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=tampil_surat&item=tampil_surat_keluar';" .
        "</script>";

if (isset($_POST['submit'])) {
    $unit_pengolah = $_POST['unit_pengolah'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $nomor_surat = $_POST['nomor_surat'];
    $perihal = $_POST['perihal'];
    $tujuan_surat = $_POST['tujuan_surat'];


    // $_FILES['dokumen_surat']['error'] == 4, artinya tidak ada dokumen yang diupload
    if ($_FILES['dokumen_surat']['error'] == 4) {
        $file_name = $row['dokumen_surat'];

        $sql = "UPDATE tabel_surat_keluar 
            SET 
                unit_pengolah='$unit_pengolah', 
                tanggal_surat='$tanggal_surat', 
                nomor_surat='$nomor_surat', 
                perihal='$perihal', 
                tujuan_surat='$tujuan_surat', 
                dokumen_surat='$file_name' 
            WHERE 
                id_surat_keluar=" . $_GET['id_surat_keluar'];

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>alert('Surat Keluar berhasil diedit.')</script>";
            echo "<script>" .
                "window.location.href='index.php?page=tampil_surat&item=tampil_surat_keluar';" .
                "</script>";
        } else echo "Error: " . $sql . "<br>" . $mysqli->error;
    } else {
        $target_dir = "surat_keluar/uploads/";
        $file_name = Date("YmdHis_") . basename($_FILES["dokumen_surat"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $sizeOk = checkFileSize($_FILES["dokumen_surat"]["size"], 500000);
        $typeOk = allowedFileType($file_type, ['pdf']);

        // Check if $uploadOk is set to 0 by an error
        if ($sizeOk != 0 && $typeOk != 0) {
            if (move_uploaded_file($_FILES["dokumen_surat"]["tmp_name"], $target_file)) {
                $sql = "UPDATE tabel_surat_keluar 
                        SET 
                            unit_pengolah='$unit_pengolah', 
                            tanggal_surat='$tanggal_surat', 
                            nomor_surat='$nomor_surat', 
                            perihal='$perihal', 
                            tujuan_surat='$tujuan_surat', 
                            dokumen_surat='$file_name' 
                        WHERE 
                            id_surat_keluar=" . $_GET['id_surat_keluar'];
                if ($mysqli->query($sql) === TRUE) {
                    echo "<script>alert('Surat Keluar berhasil diedit.')</script>";
                    echo "<script>" .
                        "window.location.href='index.php?page=tampil_surat&item=tampil_surat_keluar';" .
                        "</script>";
                } else echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
        }
    }
}

?>
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
                <h5 class="card-title">Surat Keluar</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Unit Pengolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="unit_pengolah" required value="<?= $row['unit_pengolah']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Unt Pengolah Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nomor Surat Keluar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_surat" required value="<?= $row['nomor_surat']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_surat" required value="<?= $row['tanggal_surat']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="perihal" required value="<?= $row['perihal']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Perihal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tujuan_surat" required value="<?= $row['tujuan_surat']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Tujuan Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="dokumen_surat" accept=".pdf">
                            <div class="invalid-feedback">
                                Harap Tambahkan Dokumen Surat.
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Surat</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->