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
    </style>
</head>

<body>
    <div class="container">
        <div id="kop" class="d-flex justify-content-center gap-5">
            <img src="../kpu.png" height="100" alt="">
            <div class="text-center">
                <h2>
                    NAMA INSTANSI
                    <br>
                    KABUPATEN BANJAR
                </h2>
                <p>
                    Alamat: Jalan Mentri 4
                    <br>
                    Email: instansi@gmail.com
                </p>
            </div>
        </div>

        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Surat Keluar</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Unit Pengolah</th>
                    <th>Tanggal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Perihal</th>
                    <th>Tujuan Surat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                require_once "../koneksi.php";
                $result = $mysqli->query("SELECT * FROM tabel_surat_keluar");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['unit_pengolah']; ?></td>
                            <td class="text-center"><?= $row['tanggal_surat']; ?></td>
                            <td class="text-center"><?= $row['nomor_surat']; ?></td>
                            <td class="text-center"><?= $row['perihal']; ?></td>
                            <td class="text-center"><?= $row['tujuan_surat']; ?></td>
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