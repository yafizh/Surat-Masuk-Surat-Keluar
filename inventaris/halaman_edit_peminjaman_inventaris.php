<?php

if (isset($_GET['id_peminjaman_inventaris'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_peminjaman_inventaris WHERE id_peminjaman_inventaris=" . $_GET['id_peminjaman_inventaris'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=inventaris&item=tampil_inventaris';" .
        "</script>";

if (isset($_POST['submit'])) {
    $id_inventaris = $_POST['id_inventaris'];
    $nama = $_POST['nama'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $sampai = $_POST['sampai'];
    $keperluan = $_POST['keperluan'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "UPDATE tabel_peminjaman_inventaris 
            SET 
                id_inventaris='$id_inventaris', 
                nama='$nama', 
                nomor_telepon='$nomor_telepon', 
                tanggal_pinjam='$tanggal_pinjam', 
                sampai='$sampai',  
                keperluan='$keperluan' 
            WHERE 
                id_peminjaman_inventaris=" . $_GET['id_peminjaman_inventaris'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Edit Pengajuan Peminjaman Inventaris berhasil.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=inventaris&item=tampil_peminjaman_inventaris';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Peminjaman Inventaris</h1>
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
                <h5 class="card-title">Peminjaman Inventaris</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_inventaris ORDER BY id_inventaris DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <select class="form-select" name="id_inventaris" required>
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php while ($barang = $result->fetch_assoc()) : ?>
                                    <?php if ($barang['id_inventaris'] === $row['id_inventaris']) : ?>
                                        <option selected value="<?= $barang['id_inventaris']; ?>"><?= $barang['nama']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $barang['id_inventaris']; ?>"><?= $barang['nama']; ?></option>
                                    <?php endif; ?>
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
                            <input type="text" class="form-control" id="nama" value="<?= $row['nama']; ?>" name="nama" required>
                            <div class="invalid-feedback">
                                Harap isi Nama Peminjam.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_telepon" value="<?= $row['nomor_telepon']; ?>" required name="nomor_telepon">
                            <div class="invalid-feedback">
                                Harap isi Nomor Telepon Peminjam.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pinjam" value="<?= $row['tanggal_pinjam']; ?>" name="tanggal_pinjam" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sampai" class="col-sm-2 col-form-label">Sampai</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="sampai" value="<?= date('Y-m-d\TH:i', strtotime($row['sampai'])) ?>" name="sampai" required>
                            <div class="invalid-feedback">
                                Harap isi Lama Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keperluan" value="<?= $row['keperluan']; ?>" name="keperluan" required>
                            <div class="invalid-feedback">
                                Harap isi Keperluan Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Peminjaman Inventaris</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->