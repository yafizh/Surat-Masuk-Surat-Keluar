<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_POST['submit'])) {
    $id_ruangan = $_POST['id_ruangan'];
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $jenis_surat = $_POST['jenis_surat'];
    $sifat_surat = $_POST['sifat_surat'];

    $target_dir = "surat_keluar/uploads/";
    $file_name = Date("YmdHis_") . basename($_FILES["dokumen_surat"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $sizeOk = checkFileSize($_FILES["dokumen_surat"]["size"], 500000);
    $typeOk = allowedFileType($file_type, ['pdf']);

    // Check if $uploadOk is set to 0 by an error
    if ($sizeOk != 0 && $typeOk != 0) {
        if (move_uploaded_file($_FILES["dokumen_surat"]["tmp_name"], $target_file)) {
            $sql = "
                INSERT INTO tabel_surat_keluar (
                    id_ruangan, 
                    nomor_surat, 
                    tanggal_surat, 
                    jenis_surat, 
                    sifat_surat, 
                    dokumen_surat
                ) VALUES (
                    '$id_ruangan', 
                    '$nomor_surat', 
                    '$tanggal_surat',
                    '$jenis_surat',
                    '$sifat_surat',
                    '$file_name'
                )";

            if ($mysqli->query($sql) === TRUE) echo "<script>alert('Surat Keluar berhasil ditambahkan.')</script>";
            else echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
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
                <h5 class="card-title">Surat Keluar</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="id_ruangan" class="col-sm-2 col-form-label">Unit Pengolah</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC";
                            $result = $mysqli->query($sql);
                            ?>
                            <select class="form-select" name="id_ruangan" required>
                                <option value="" selected disabled>Pilih Unit Pengolah</option>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <?php
                                    $sql = "
                                        SELECT 
                                                SUBSTRING_INDEX(SUBSTRING_INDEX(nomor_surat,'/',2),'/',-1) AS data_jumlah_surat 
                                            FROM 
                                                tabel_surat_keluar 
                                        WHERE 
                                            SUBSTRING_INDEX(nomor_surat,'/',1) = '" . $row['singkatan'] . "'";
                                    $result2 = $mysqli->query($sql);
                                    $data_jumlah_surat =  ($result2->num_rows > 0) ? (int)$result2->fetch_assoc()['data_jumlah_surat'] : 0;
                                    $data_jumlah_surat += 1;
                                    ?>
                                    <option data-jumlah-surat="<?= $data_jumlah_surat; ?>" data-singkatan="<?= $row['singkatan']; ?>" value="<?= $row['id_ruangan']; ?>"><?= $row['nama_ruangan']; ?></option>
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
                            <input type="text" value="XX/XX/XX/XX" class="form-control" id="nomor_surat" name="nomor_surat" required readonly>
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="jenis_surat" required>
                                <option value="SURAT TERBUKA">Surat Terbuka</option>
                                <option value="SURAT TERTUTUP">Surat Tertutup</option>
                            </select>
                            <div class="invalid-feedback">
                                Harap isi Jenis Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sifat_surat" class="col-sm-2 col-form-label">Sifat Surat</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="sifat_surat" required>
                                <option value="PRIBADI">Pribadi</option>
                                <option value="RESMI PRIBADI">Resmi Pribadi</option>
                                <option value="DINAS">Dinas</option>
                                <option value="NIAGA">Niaga</option>
                            </select>
                            <div class="invalid-feedback">
                                Harap isi Sifat Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_surat" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="dokumen_surat" type="file" name="dokumen_surat" accept=".pdf" required>
                            <div class="invalid-feedback">
                                Harap Tambahkan Dokumen Surat.
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Surat</button>
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
        temp[0] = this.options[this.selectedIndex].getAttribute('data-singkatan');
        nomor_surat.value = temp.join("/");

        temp = (nomor_surat.value).split('/');
        temp[1] = this.options[this.selectedIndex].getAttribute('data-jumlah-surat');
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
        temp[2] = romanize((this.value).split("-")[1]);
        nomor_surat.value = temp.join("/");

        temp = (nomor_surat.value).split('/');
        temp[3] = (this.value).split("-")[0];
        nomor_surat.value = temp.join("/");
    });
</script>