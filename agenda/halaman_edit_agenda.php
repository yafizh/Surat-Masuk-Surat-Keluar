<?php

if (isset($_GET['id_agenda'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_agenda WHERE id_agenda=" . $_GET['id_agenda'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=agenda&item=tampil_agenda';" .
        "</script>";

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $id_ruangan = $_POST['id_ruangan'];
    $detail_acara = $_POST['detail_acara'];
    $peserta = $_POST['peserta'];


    $sql = "UPDATE tabel_agenda 
            SET 
                tanggal='$tanggal', 
                waktu='$waktu', 
                id_ruangan='$id_ruangan',  
                detail_acara='$detail_acara'  
            WHERE 
                id_agenda=" . $_GET['id_agenda'];

    if ($mysqli->query($sql) === TRUE) {
        $sql = "DELETE FROM tabel_peserta WHERE id_agenda=" . $_GET['id_agenda'];
        if ($mysqli->query($sql) === TRUE) {
            foreach ($peserta as $pes) {
                $sql = "INSERT INTO tabel_peserta VALUES (null, $pes, " . $_GET['id_agenda'] . ")";
                if (!($mysqli->query($sql) === TRUE)) {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                    exit;
                }
            }
            echo "<script>alert('Agenda berhasil diedit.')</script>";
            echo "<script>" .
                "window.location.href='index.php?page=agenda&item=tampil_agenda';" .
                "</script>";
        }
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Agenda</h1>
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
                <h5 class="card-title">Agenda</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" value="<?= $row['tanggal']; ?>" name="tanggal" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Agenda.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="waktu" class="col-sm-2 col-form-label">waktu</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="waktu" value="<?= $row['waktu']; ?>" name="waktu" required>
                            <div class="invalid-feedback">
                                Harap isi Waktu Agenda.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_ruangan" class="col-sm-2 col-form-label">Unit Pengolah</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <select class="form-select" name="id_ruangan" required>
                                <?php while ($row_ruangan = $result->fetch_assoc()) : ?>
                                    <?php if ($row_ruangan['id_ruangan'] == $row['ruangan']) : ?>
                                        <option selected value="<?= $row_ruangan['id_ruangan']; ?>"><?= $row_ruangan['nama_ruangan']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row_ruangan['id_ruangan']; ?>"><?= $row_ruangan['nama_ruangan']; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Harap isi Ruangan.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="peserta" class="col-sm-2 col-form-label">Peserta</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <?php while ($row_ruangan = $result->fetch_assoc()) : ?>
                                <?php
                                $sql = "SELECT * FROM tabel_peserta WHERE id_agenda=" . $row['id_agenda'] . " AND id_ruangan=" . $row_ruangan['id_ruangan'];
                                $result2 = $mysqli->query($sql);
                                ?>
                                <?php if ($result2->num_rows > 0) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" checked name="peserta[]" type="checkbox" id="<?= $row_ruangan['nama_ruangan']; ?>" value="<?= $row_ruangan['id_ruangan']; ?>">
                                        <label class="form-check-label" for="<?= $row_ruangan['nama_ruangan']; ?>">
                                            Pegawai <?= $row_ruangan['nama_ruangan']; ?>
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" name="peserta[]" type="checkbox" id="<?= $row_ruangan['nama_ruangan']; ?>" value="<?= $row_ruangan['id_ruangan']; ?>">
                                        <label class="form-check-label" for="<?= $row_ruangan['nama_ruangan']; ?>">
                                            Pegawai <?= $row_ruangan['nama_ruangan']; ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="detail_acara" class="col-sm-2 col-form-label">Detail Acara</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="detail_acara" id="waktu" name="waktu" required><?= $row['detail_acara']; ?></textarea>
                            <div class="invalid-feedback">
                                Harap isi Detail Acara.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Agenda</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </section>

</main><!-- End #main -->