<?php

if (isset($_GET['id_ruangan'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_ruangan WHERE id_ruangan=" . $_GET['id_ruangan'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=ruangan&item=tampil_ruangan';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama_ruangan = $_POST['nama_ruangan'];
    $singkatan = $_POST['singkatan'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE tabel_ruangan 
            SET 
                nama_ruangan='$nama_ruangan', 
                singkatan='$singkatan', 
                keterangan='$keterangan'  
            WHERE 
                id_ruangan=" . $_GET['id_ruangan'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Ruangan berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=ruangan&item=tampil_ruangan';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Ruangan</h1>
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
                <h5 class="card-title">Ruangan</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama_ruangan" class="col-sm-2 col-form-label">Nama Ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required value="<?= $row['nama_ruangan']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Nama Ruangan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="singkatan" class="col-sm-2 col-form-label">Singkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="singkatan" name="singkatan" required value="<?= $row['singkatan']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Singkatan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= $row['keterangan']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Keterangan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Rungan</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </section>

</main><!-- End #main -->