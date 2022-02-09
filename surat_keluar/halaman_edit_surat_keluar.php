<?php

if (isset($_GET['id_surat_keluar'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_surat_keluar WHERE id_surat_keluar=" . $_GET['id_surat_keluar'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=surat_keluar&item=tampil_surat_keluar';" .
        "</script>";

if (isset($_POST['submit'])) {
    $id_ruangan = $_POST['id_ruangan'];
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $id_kode_surat = $_POST['id_kode_surat'];
    $sifat_surat = $_POST['sifat_surat'];


    // $_FILES['dokumen_surat']['error'] == 4, artinya tidak ada dokumen yang diupload
    if ($_FILES['dokumen_surat']['error'] == 4) {
        $file_name = $row['dokumen_surat'];

        $sql = "UPDATE tabel_surat_keluar 
            SET 
                id_ruangan='$id_ruangan', 
                nomor_surat='$nomor_surat', 
                tanggal_surat='$tanggal_surat', 
                id_kode_surat='$id_kode_surat', 
                sifat_surat='$sifat_surat', 
                dokumen_surat='$file_name' 
            WHERE 
                id_surat_keluar=" . $_GET['id_surat_keluar'];

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>alert('Surat Keluar berhasil diedit.')</script>";
            echo "<script>" .
                "window.location.href='index.php?page=surat_keluar&item=tampil_surat_keluar';" .
                "</script>";
        } else echo "Error: " . $sql . "<br>" . $mysqli->error;
    } else {
        $target_dir = "surat_keluar/uploads/";
        $file_name = Date("YmdHis_") . basename($_FILES["dokumen_surat"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $sizeOk = checkFileSize($_FILES["dokumen_surat"]["size"], 500000);
        $typeOk = allowedFileType($file_type, ['pdf']);

        // Check if $uploadOk is set to 0 by an error
        if ($sizeOk != 0 && $typeOk != 0) {
            if (move_uploaded_file($_FILES["dokumen_surat"]["tmp_name"], $target_file)) {
                $sql = "UPDATE tabel_surat_keluar 
                        SET 
                            id_ruangan='$id_ruangan', 
                            nomor_surat='$nomor_surat', 
                            tanggal_surat='$tanggal_surat', 
                            id_kode_surat='$id_kode_surat', 
                            sifat_surat='$sifat_surat', 
                            dokumen_surat='$file_name' 
                        WHERE 
                            id_surat_keluar=" . $_GET['id_surat_keluar'];
                if ($mysqli->query($sql) === TRUE) {
                    echo "<script>alert('Surat Keluar berhasil diedit.')</script>";
                    echo "<script>" .
                        "window.location.href='index.php?page=tampil_surat&item=tampil_surat_keluar';" .
                        "</script>";
                } else echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
        }
    }
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Surat</h1>
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
                <h5 class="card-title">Surat Keluar</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="unit_pengolah" class="col-sm-2 col-form-label">Unit Pengolah</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <select class="form-select" name="id_ruangan" required>
                                <?php while ($row_ruangan = $result->fetch_assoc()) : ?>
                                    <?php if ($row_ruangan['id_ruangan'] == $row['id_ruangan']) : ?>
                                        <option selected data-singkatan="<?= $row_ruangan['singkatan']; ?>" value="<?= $row_ruangan['id_ruangan']; ?>"><?= $row_ruangan['nama_ruangan']; ?></option>
                                    <?php else : ?>
                                        <option data-singkatan="<?= $row_ruangan['singkatan']; ?>" value="<?= $row_ruangan['id_ruangan']; ?>"><?= $row_ruangan['nama_ruangan']; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Harap isi Unit Pengolah Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat Keluar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_surat" readonly name="nomor_surat" required value="<?= $row['nomor_surat']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required value="<?= $row['tanggal_surat']; ?>">
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_kode_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_kode_surat ORDER BY id_kode_surat DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <select class="form-select" name="id_kode_surat" required>
                                <?php while ($row_kode_surat = $result->fetch_assoc()) : ?>
                                    <?php if ($row_kode_surat['id_kode_surat'] == $row['id_kode_surat']) : ?>
                                        <option selected data-singkatan="<?= $row_kode_surat['singkatan']; ?>" value="<?= $row_kode_surat['id_kode_surat']; ?>"><?= $row_kode_surat['jenis_surat']; ?></option>
                                    <?php else : ?>
                                        <option data-singkatan="<?= $row_kode_surat['singkatan']; ?>" value="<?= $row_kode_surat['id_kode_surat']; ?>"><?= $row_kode_surat['jenis_surat']; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Harap pilih Jenis Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sifat_surat" class="col-sm-2 col-form-label">Sifat Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sifat_surat" required>
                            <div class="invalid-feedback">
                                Harap isi Sifat Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_surat" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="dokumen_surat" type="file" name="dokumen_surat" accept=".pdf">
                            <div class="invalid-feedback">
                                Harap Tambahkan Dokumen Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Surat</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </section>

</main><!-- End #main -->
<script>
    const nomor_surat = document.querySelector("input[name=nomor_surat]");
    let temp = "";
    document.querySelector("select[name=id_ruangan]").addEventListener('change', function(value) {
        temp = (nomor_surat.value).split('/');
        temp[2] = this.options[this.selectedIndex].getAttribute('data-singkatan');
        nomor_surat.value = temp.join("/");
    });

    document.querySelector("select[name=id_kode_surat]").addEventListener('change', function(value) {
        temp = (nomor_surat.value).split('/');
        temp[1] = this.options[this.selectedIndex].getAttribute('data-singkatan');
        nomor_surat.value = temp.join("/");
    });

    function romanize(num) {
        if (isNaN(num))
            return NaN;
        var digits = String(+num).split(""),
            key = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM",
                "", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC",
                "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"
            ],
            roman = "",
            i = 3;
        while (i--)
            roman = (key[+digits.pop() + (i * 10)] || "") + roman;
        return Array(+digits.join("") + 1).join("M") + roman;
    }

    document.querySelector("input[name=tanggal_surat]").addEventListener('input', function(value) {
        temp = (nomor_surat.value).split('/');
        temp[3] = romanize((this.value).split("-")[1]);
        nomor_surat.value = temp.join("/");

        temp = (nomor_surat.value).split('/');
        temp[4] = (this.value).split("-")[0];
        nomor_surat.value = temp.join("/");
    });
</script>