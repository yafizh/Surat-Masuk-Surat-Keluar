<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_POST['submit'])) {
    $lokasi = $_POST['lokasi'];
    $nama_dokumen = $_POST['nama_dokumen'];
    $nomor_dokumen = $_POST['nomor_dokumen'];
    $size = $_POST['size'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $sql = "
        INSERT INTO tabel_arsip (
            lokasi,
            nama_dokumen,
            nomor_dokumen, 
            size, 
            tanggal, 
            keterangan  
        ) VALUES (
            '$lokasi',
            '$nama_dokumen',
            '$nomor_dokumen',
            '$size', 
            '$tanggal',
            '$keterangan' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Arsip berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Arsip</h1>
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
                <h5 class="card-title">Arsip</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                            <div class="invalid-feedback">
                                Harap isi Lokasi.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomor_dokumen" class="col-sm-2 col-form-label">Nomor Dokumen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen" required>
                            <div class="invalid-feedback">
                                Harap isi Nomor Dokumen.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_dokumen" class="col-sm-2 col-form-label">Nama Dokumen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" required>
                            <div class="invalid-feedback">
                                Harap isi Nama Dokumen.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="size" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="size" name="size" required>
                            <div class="invalid-feedback">
                                Harap isi Nama Dokumen.
                            </div>
                        </div>
                        <label for="size" class="col-sm-1 col-form-label">Lembar</label>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Arsip.
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
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Arsip</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </section>

</main><!-- End #main -->