<?php

if (isset($_GET['id_inventaris'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_inventaris WHERE id_inventaris=" . $_GET['id_inventaris'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=inventaris&item=tampil_inventaris';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];

    $sql = "UPDATE tabel_inventaris 
            SET 
                nama='$nama', 
                merk='$merk', 
                jumlah='$jumlah', 
                harga='$harga', 
                tanggal_pembelian='$tanggal_pembelian' 
            WHERE 
                id_inventaris=" . $_GET['id_inventaris'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Inventaris berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=inventaris&item=tampil_inventaris';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Inventaris</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Inventaris</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" value="<?= $row['nama']; ?>" name="nama" required>
                            <div class="invalid-feedback">
                                Harap isi Nama Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="merk" class="col-sm-2 col-form-label">Merk Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="merk" value="<?= $row['merk']; ?>" name="merk" required>
                            <div class="invalid-feedback">
                                Harap isi Merk Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="jumlah" value="<?= $row['jumlah']; ?>" name="jumlah" required>
                            <div class="invalid-feedback">
                                Harap isi Jumlah Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" value="<?= $row['harga']; ?>" name="harga" required>
                            <div class="invalid-feedback">
                                Harap isi Harga Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_pembelian" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pembelian" value="<?= $row['tanggal_pembelian']; ?>" name="tanggal_pembelian" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Pembelian Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Inventaris</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->