<?php

if (isset($_GET['id_peminjaman_inventaris'])) {
    require_once "koneksi.php";

    $sql = "SELECT tabel_peminjaman_inventaris.*, tabel_inventaris.nama AS nama_barang FROM tabel_peminjaman_inventaris INNER JOIN tabel_inventaris ON tabel_inventaris.id_inventaris=tabel_peminjaman_inventaris.id_inventaris WHERE id_peminjaman_inventaris=" . $_GET['id_peminjaman_inventaris'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=inventaris&item=tampil_inventaris';" .
        "</script>";
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail Peminjaman Inventaris</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Peminjaman Inventaris</h5>

                <!-- General Form Elements -->
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" value="<?= $row['nama_barang']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Peminjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" value="<?= $row['nama']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomor_telepon" value="<?= $row['nomor_telepon']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggal_pinjam" value="<?= $row['tanggal_pinjam']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampai" class="col-sm-2 col-form-label">Sampai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sampai" value="<?= $row['sampai']; ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keperluan" value="<?= $row['keperluan']; ?>" readonly>
                    </div>
                </div>
                <?php if ($row['status'] === 'PENGAJUAN' && $_SESSION['status_user'] === 'ADMIN') : ?>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex gap-3">
                            <form action="" method="POST">
                                <input type="text" hidden name="keperluan" value="<?= $row['keperluan']; ?>">
                                <input type="text" hidden name="sampai" value="<?= $row['sampai']; ?>">
                                <input type="text" hidden name="tanggal_pinjam" value="<?= $row['tanggal_pinjam']; ?>">
                                <input type="text" hidden name="nama_barang" value="<?= $row['nama_barang']; ?>">
                                <input type="text" hidden name="nama" value="<?= $row['nama']; ?>">
                                <input type="text" hidden name="nomor_telepon" value="<?= $row['nomor_telepon']; ?>">
                                <button type="submit" name="tolak" class="btn btn-danger">Tolak</button>
                            </form>
                            <form action="" method="POST">
                                <input type="text" hidden name="keperluan" value="<?= $row['keperluan']; ?>">
                                <input type="text" hidden name="sampai" value="<?= $row['sampai']; ?>">
                                <input type="text" hidden name="tanggal_pinjam" value="<?= $row['tanggal_pinjam']; ?>">
                                <input type="text" hidden name="nama_barang" value="<?= $row['nama_barang']; ?>">
                                <input type="text" hidden name="nama" value="<?= $row['nama']; ?>">
                                <input type="text" hidden name="nomor_telepon" value="<?= $row['nomor_telepon']; ?>">
                                <button type="submit" name="terima" class="btn btn-success">Terima</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php if (isset($_POST['tolak'])) : ?>
    <?php
    $sql = "UPDATE tabel_peminjaman_inventaris 
       SET 
          status='DITOLAK' 
       WHERE 
           id_peminjaman_inventaris=" . $_GET['id_peminjaman_inventaris'];
    ?>
    <?php if ($mysqli->query($sql) === TRUE) : ?>
        <script src="utils.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            const message = `Pengajuan peminjaman atas nama <?= $_POST['nama'] ?> untuk tanggal <?= $_POST['tanggal_pinjam'] ?> dengan barang <?= $_POST['nama_barang'] ?> untuk keperluan <?= $_POST['keperluan'] ?> ditolak.`;
            const url = `https://sms.indositus.com/sendsms.php?idmesin=${id_mesin}&pin=${pin}&to=<?= $_POST['nomor_telepon']; ?>&text=${message}`;
            $.ajax({
                url: url,
            }).done(function() {});
        </script>
        <script>
            console.log(url)
            alert('Peminjaman Inventaris berhasil ditolak.')
        </script>
        <!-- <script>
            setTimeout(function() {
                window.location.href = 'index.php?page=inventaris&item=tampil_peminjaman_inventaris';
            }, 1000);
        </script> -->
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($_POST['terima'])) : ?>
    <?php
    $sql = "UPDATE tabel_peminjaman_inventaris 
       SET 
          status='DITERIMA' 
       WHERE 
           id_peminjaman_inventaris=" . $_GET['id_peminjaman_inventaris'];
    ?>
    <?php if ($mysqli->query($sql) === TRUE) : ?>
        <script src="utils.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            const message = `Pengajuan peminjaman atas nama <?= $_POST['nama'] ?> untuk tanggal <?= $_POST['tanggal_pinjam'] ?> dengan barang <?= $_POST['nama_barang'] ?> untuk keperluan <?= $_POST['keperluan'] ?> diterima. Dikembalikan pada <?= explode(" ", $_POST['sampai'])[0]; ?> Jam <?= explode(" ", $_POST['sampai'])[1]; ?>`;
            const url = `https://sms.indositus.com/sendsms.php?idmesin=${id_mesin}&pin=${pin}&to=<?= $_POST['nomor_telepon']; ?>&text=${message}`;
            $.ajax({
                url: url,
            }).done(function() {});
        </script>
        <script>
            alert('Peminjaman Inventaris berhasil diterima.')
        </script>
        <script>
            setTimeout(function() {
                window.location.href = 'index.php?page=inventaris&item=tampil_peminjaman_inventaris';
            }, 1000);
        </script>
    <?php endif; ?>
<?php endif; ?>