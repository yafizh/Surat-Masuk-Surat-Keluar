<?php

if (isset($_POST['submit'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $nama_ruangan = $_POST['nama_ruangan'];
    $singkatan = $_POST['singkatan'];
    $keterangan = $_POST['keterangan'];

    $sql = "
        INSERT INTO tabel_ruangan (
            nama_ruangan, 
            singkatan, 
            keterangan 
        ) VALUES (
            '$nama_ruangan', 
            '$singkatan',
            '$keterangan' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Ruangan berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Ruangan</h1>
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
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="nama_ruangan" class="col-sm-2 col-form-label">Nama Ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
                            <div class="invalid-feedback">
                                Harap isi Nama Ruangan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="singkatan" class="col-sm-2 col-form-label">Singkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="singkatan" name="singkatan" required>
                            <div class="invalid-feedback">
                                Harap isi Singkatan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            <div class="invalid-feedback">
                                Harap isi Keterangan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Ruangan</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->