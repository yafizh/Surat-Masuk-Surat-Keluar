<?php
require_once "koneksi.php";
require_once "utils.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];


    $sql = "
            INSERT INTO tabel_inventaris (
                nama, 
                merk, 
                jumlah,
                harga,
                tanggal_pembelian 
            ) VALUES (
                '$nama', 
                '$merk',
                '$jumlah',
                '$harga',
                '$tanggal_pembelian' 
            )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Inventaris berhasil ditambahkan.')</script>";
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
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" required name="nama">
                            <div class="invalid-feedback">
                                Harap isi Nama Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="merk" required name="merk">
                            <div class="invalid-feedback">
                                Harap isi Merk Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                            <div class="invalid-feedback">
                                Harap isi Jumlah Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" name="harga" required>
                            <div class="invalid-feedback">
                                Harap isi Harga Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_pembelian" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required>
                            <div class="invalid-feedback">
                                Harap isi Tanggal Pembelian Barang.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Barang</button>
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