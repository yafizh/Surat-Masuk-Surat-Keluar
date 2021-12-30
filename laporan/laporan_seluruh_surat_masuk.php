<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Masuk</title>
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
            <img src="../assets/img/Banjarbaru.png" height="150" alt="">
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

        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Surat Masuk</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Asal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                require_once "../koneksi.php";
                $result = $mysqli->query("SELECT * FROM tabel_surat_masuk ORDER BY id_surat_masuk DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['asal_surat']; ?></td>
                            <td class="text-center"><?= $row['nomor_surat']; ?></td>
                            <td class="text-center"><?= $row['tanggal_surat']; ?></td>
                            <td class="text-center"><?= $row['perihal']; ?></td>
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