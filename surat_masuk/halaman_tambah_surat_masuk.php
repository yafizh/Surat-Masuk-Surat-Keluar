<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_POST['submit'])) {
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $perihal = $_POST['perihal'];
    $sifat_surat = $_POST['sifat_surat'];
    $pengirim = $_POST['pengirim'];

    $target_dir = "surat_masuk/uploads/";
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
                INSERT INTO tabel_surat_masuk (
                    nomor_surat, 
                    tanggal_surat, 
                    perihal, 
                    sifat_surat, 
                    pengirim, 
                    dokumen_surat
                ) VALUES (
                    '$nomor_surat', 
                    '$tanggal_surat',
                    '$perihal',
                    '$sifat_surat', 
                    '$pengirim', 
                    '$file_name'
                )";

            if ($mysqli->query($sql) === TRUE) echo "<script>alert('Surat Masuk berhasil ditambahkan.')</script>";
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
                <h5 class="card-title">Surat Masuk</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <?php
                            $sql = "
                                SELECT 
                                    SUBSTRING_INDEX(nomor_surat,'/',1) AS data_jumlah_surat 
                                FROM 
                                    tabel_surat_masuk
                            ";
                            $result = $mysqli->query($sql);
                            $data_jumlah_surat =  ($result->num_rows > 0) ? (int)$result->fetch_assoc()['data_jumlah_surat'] : 0;
                            $data_jumlah_surat += 1;
                            ?>
                            <input type="text" class="form-control" id="nomor_surat" value="SM<?= $data_jumlah_surat; ?>/XX/XX" readonly required name="nomor_surat">
                            <div class="invalid-feedback">
                                Harap isi Nomor Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_surat" required name="tanggal_surat">
                            <div class="invalid-feedback">
                                Harap isi Tanggal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perihal" required name="perihal">
                            <div class="invalid-feedback">
                                Harap isi Perihal Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Sifat Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sifat_surat" required>
                            <div class="invalid-feedback">
                                Harap pilih Jenis Surat.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pengirim" required name="pengirim">
                            <div class="invalid-feedback">
                                Harap isi Pengirim.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_surat" class="col-sm-2 col-form-label">Dokumen Surat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" accept=".pdf" id="dokumen_surat" required name="dokumen_surat">
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
        temp[1] = romanize((this.value).split("-")[1]);
        nomor_surat.value = temp.join("/");

        temp = (nomor_surat.value).split('/');
        temp[2] = (this.value).split("-")[0];
        nomor_surat.value = temp.join("/");
    });
</script>