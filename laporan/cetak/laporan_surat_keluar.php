<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar</title>
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

        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Surat Keluar</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Unit Pengolah</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Jenis Surat</th>
                    <th>Sifat Surat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dari = $_POST['dari'];
                $sampai = $_POST['sampai'];
                $id_ruangan = $_POST['id_ruangan'];
                $id_kode_surat = $_POST['id_kode_surat'];
                $no = 1;
                require_once "../../koneksi.php";
                $result = $mysqli->query("
                    SELECT 
                        * 
                    FROM 
                        tabel_surat_keluar 
                    LEFT JOIN 
                        tabel_ruangan 
                    ON tabel_ruangan.id_ruangan=tabel_surat_keluar.id_ruangan 
                    LEFT JOIN 
                        tabel_kode_surat 
                    ON tabel_kode_surat.id_kode_surat=tabel_surat_keluar.id_kode_surat
                    WHERE 
                        tabel_ruangan.id_ruangan LIKE '%$id_ruangan%' 
                        AND 
                        tabel_kode_surat.id_kode_surat LIKE '%$id_kode_surat%' 
                        AND 
                        tanggal_surat >= '$dari' 
                        AND 
                        tanggal_surat <= '$sampai' 
                    ORDER BY id_surat_keluar DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $row['nama_ruangan']; ?></td>
                            <td class="text-center"><?= $row['nomor_surat']; ?></td>
                            <td class="text-center"><?= $row['tanggal_surat']; ?></td>
                            <td class="text-center"><?= $row['jenis_surat']; ?></td>
                            <td class="text-center"><?= $row['sifat_surat']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>