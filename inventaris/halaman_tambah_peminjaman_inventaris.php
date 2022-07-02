<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_POST['submit'])) {
    $id_inventaris = $_POST['id_inventaris'];
    $nama = $_POST['nama'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $sampai = $_POST['sampai'];
    $keperluan = $_POST['keperluan'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "
    INSERT INTO tabel_peminjaman_inventaris (
        id_inventaris, 
        nama, 
        nomor_telepon, 
        tanggal_pinjam, 
        sampai,
        keperluan,
        status 
    ) VALUES (
        '$id_inventaris', 
        '$nama', 
        '$nomor_telepon', 
        '$tanggal_pinjam',
        '$sampai',
        '$keperluan', 
        'PENGAJUAN' 
    )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Pengajuan Peminjaman Inventaris berhasil.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
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
                <h5 class="card-title">Inventaris</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="id_inventaris" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_inventaris ORDER BY id_inventaris DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <select class="form-select" name="id_inventaris" required>
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <option value="<?= $row['id_inventaris']; ?>"><?= $row['nama']; ?></option>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Harap Pilih Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Peminjam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" required name="nama">
                            <div class="invalid-feedback">
                                Harap isi Nama Peminjam.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_telepon" required name="nomor_telepon">
                            <div class="invalid-feedback">
                                Harap isi Nomor Telepon Peminjam.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sampai" class="col-sm-2 col-form-label">Sampai</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="sampai" name="sampai" required>
                            <div class="invalid-feedback">
                                Harap isi Lama Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                            <div class="invalid-feedback">
                                Harap isi Keperluan Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Peminjaman Barang</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->