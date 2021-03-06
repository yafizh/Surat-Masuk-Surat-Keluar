<?php

if (isset($_GET['id_surat_disposisi'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_surat_disposisi WHERE id_surat_disposisi=" . $_GET['id_surat_disposisi'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=surat_disposisi&item=tampil_surat_disposisi';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nomor_surat = $_POST['nomor_surat'];
    $nomor_disposisi = $_POST['nomor_disposisi'];
    $tanggal = $_POST['tanggal'];
    $tujuan = $_POST['tujuan'];
    $pengirim = $_POST['pengirim'];
    $nomor_telepon = $_POST['nomor_telepon'];

    // $_FILES['dokumen_surat']['error'] == 4, artinya tidak ada dokumen yang diupload
    if ($_FILES['dokumen_surat']['error'] == 4) {
        $file_name = $row['dokumen_surat'];

        $sql = "UPDATE tabel_surat_disposisi 
            SET 
                nomor_surat='$nomor_surat', 
                nomor_disposisi='$nomor_disposisi', 
                tanggal='$tanggal', 
                tujuan='$tujuan', 
                nomor_telepon='$nomor_telepon', 
                pengirim='$pengirim', 
                dokumen_surat='$file_name' 
            WHERE 
                id_surat_disposisi=" . $_GET['id_surat_disposisi'];

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>alert('Surat Disposisi berhasil diedit.')</script>";
            echo "<script>" .
                "window.location.href='index.php?page=surat_disposisi&item=tampil_surat_disposisi';" .
                "</script>";
        } else echo "Error: " . $sql . "<br>" . $mysqli->error;
    } else {
        $target_dir = "surat_disposisi/uploads/";
        $file_name = Date("YmdHis_") . basename($_FILES["dokumen_surat"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $sizeOk = checkFileSize($_FILES["dokumen_surat"]["size"], 500000);
        $typeOk = allowedFileType($file_type, ['pdf']);

        // Check if $uploadOk is set to 0 by an error
        if ($sizeOk != 0 && $typeOk != 0) {
            if (move_uploaded_file($_FILES["dokumen_surat"]["tmp_name"], $target_file)) {
                $sql = "UPDATE tabel_surat_disposisi 
                        SET 
                            nomor_surat='$nomor_surat', 
                            nomor_disposisi='$nomor_disposisi', 
                            tanggal='$tanggal', 
                            tujuan='$tujuan', 
                            pengirim='$pengirim', 
                            dokumen_surat='$file_name' 
                        WHERE 
                            id_surat_disposisi=" . $_GET['id_surat_disposisi'];
                if ($mysqli->query($sql) === TRUE) {
                    echo "<script>alert('Surat Disposisi berhasil diedit.')</script>";
                    echo "<script>" .
                        "window.location.href='index.php?page=tampil_surat&item=tampil_surat_disposisi';" .
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
                <h5 class="card-title">Surat Disposisi</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_surat" value="<?= $row['nomor_surat']; ?>" name="nomor_surat" required>
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomor_disposisi" class="col-sm-2 col-form-label">Nomor Disposisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_disposisi" readonly value="<?= $row['nomor_disposisi']; ?>" name="nomor_disposisi" required>
                            <div class="invalid-feedback">
                                Harap isi Nomor Disposisi.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" value="<?= $row['tanggal']; ?>" name="tanggal" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tujuan" value="<?= $row['tujuan']; ?>" name="tujuan" required>
                            <div class="invalid-feedback">
                                Harap isi Tujuan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_telepon" required name="nomor_telepon">
                            <div class="invalid-feedback">
                                Harap isi Nomor Telepon.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pengirim" value="<?= $row['pengirim']; ?>" name="pengirim" required>
                            <div class="invalid-feedback">
                                Harap isi Pengirim.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_surat" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="dokumen_surat" type="file" accept=".pdf" name="dokumen_surat">
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