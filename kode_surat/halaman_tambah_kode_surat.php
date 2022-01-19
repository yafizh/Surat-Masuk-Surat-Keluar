<?php

if (isset($_POST['submit'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $jenis_surat = $_POST['jenis_surat'];
    $singkatan = $_POST['singkatan'];
    $keterangan = $_POST['keterangan'];

    $sql = "
        INSERT INTO tabel_kode_surat (
            jenis_surat, 
            singkatan 
        ) VALUES (
            '$jenis_surat', 
            '$singkatan' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Kode Surat berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Kode Surat</h1>
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
                <h5 class="card-title">Kode Surat</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" required>
                            <div class="invalid-feedback">
                                Harap isi Jenis Surat.
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
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Kode Surat</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->