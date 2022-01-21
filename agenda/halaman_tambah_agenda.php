<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $id_ruangan = $_POST['id_ruangan'];
    $detail_acara = $_POST['detail_acara'];
    $peserta = $_POST['peserta'];

    $sql = "
        INSERT INTO tabel_agenda (
            tanggal, 
            waktu, 
            detail_acara, 
            id_ruangan 
        ) VALUES (
            '$tanggal', 
            '$waktu',
            '$detail_acara',
            '$id_ruangan' 
        )";

    if ($mysqli->query($sql) === TRUE) {
        $id_agenda = $mysqli->insert_id;
        foreach ($peserta as $pes) {
            $sql = "INSERT INTO tabel_peserta VALUES (null, $pes, $id_agenda)";
            if (!($mysqli->query($sql) === TRUE)) {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
                exit;
            }
        }
        echo "<script>alert('Agenda berhasil ditambahkan.')</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Agenda</h1>
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
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Agenda.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="waktu" class="col-sm-2 col-form-label">waktu</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="waktu" name="waktu" required>
                            <div class="invalid-feedback">
                                Harap isi Waktu Agenda.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_ruangan" class="col-sm-2 col-form-label">Ruangan</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <select class="form-select" name="id_ruangan" required>
                                <option value="" selected disabled>Pilih Ruangan</option>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <option value="<?= $row['id_ruangan']; ?>"><?= $row['nama_ruangan']; ?></option>
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
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" name="peserta[]" type="checkbox" id="<?= $row['nama_ruangan']; ?>" value="<?= $row['id_ruangan']; ?>">
                                    <label class="form-check-label" for="<?= $row['nama_ruangan']; ?>">
                                        Pegawai <?= $row['nama_ruangan']; ?>
                                    </label>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="detail_acara" class="col-sm-2 col-form-label">Detail Acara</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="detail_acara" id="waktu" name="waktu" required></textarea>
                            <div class="invalid-feedback">
                                Harap isi Detail Acara.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Agenda</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </section>

</main><!-- End #main -->