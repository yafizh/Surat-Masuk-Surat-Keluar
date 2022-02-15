<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Detail Surat Keluar</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        #kop {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="kop" class="d-flex justify-content-center gap-5">
            <img src="../../assets/img/Banjarbaru.png" height="150" alt="">
            <div class="text-center" style="flex: 1;">
                <h2>
                    DINAS ARSIP DAN PERPUSTAKAAN DAERAH
                    <br>
                    BANJARBARU
                </h2>
                <p>
                    Alamat: Jl. Wijaya Kusuma No.7
                    <br>
                    Email: darpusdabjb@banjarbarukota.go.id
                </p>
            </div>
        </div>
        <hr>
        <?php
        require_once "../../koneksi.php";
        require_once "../../utils.php";
        $sql = "
          SELECT * FROM tabel_surat_keluar WHERE id_surat_keluar=".$_GET['id_surat_keluar'];
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <img src="../../surat_keluar/uploads/<?= $row['dokumen_surat']; ?>">
    </div>
    <script>
        window.print();
    </script>
</body>

</html>