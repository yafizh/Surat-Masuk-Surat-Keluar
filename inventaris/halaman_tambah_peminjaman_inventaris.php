<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_POST['submit'])) {
    $id_inventaris = $_POST['id_inventaris'];
    $nama = $_POST['nama'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $lama_pinjam = $_POST['lama_pinjam'];
    $keperluan = $_POST['keperluan'];

    $sql = "
    INSERT INTO tabel_peminjaman_inventaris (
        id_inventaris, 
        nama, 
        tanggal_pinjam, 
        lama_pinjam,
        keperluan 
    ) VALUES (
        '$id_inventaris', 
        '$nama', 
        '$tanggal_pinjam',
        '$lama_pinjam',
        '$keperluan' 
    )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Peminjaman Inventaris berhasil ditambahkan.')</script>";
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
                        <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lama_pinjam" class="col-sm-2 col-form-label">Lama Pinjam</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="lama_pinjam" name="lama_pinjam" required>
                            <div class="invalid-feedback">
                                Harap isi Lama Peminjaman Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="keperluan" name="keperluan" required>
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