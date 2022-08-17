<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jumlah Peminjaman Inventaris</title>
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
        <?php include_once "header.php"; ?>

        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Riwayat Peminjaman Barang <?= $_POST['nama_barang'] ?></h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Peminjam</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Pinjam</th>
                    <th>Keperluan Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dari = $_POST['dari'];
                $sampai = $_POST['sampai'];
                $id_inventaris = $_POST['id_inventaris'];
                $no = 1;
                require_once "../../koneksi.php";
                $result = $mysqli->query("
                    SELECT 
                        * 
                    FROM 
                        tabel_peminjaman_inventaris 
                    WHERE 
                        id_inventaris = $id_inventaris 
                        AND 
                        (tanggal_pinjam >= '$dari' AND tanggal_pinjam <= '$sampai')
                    ");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['nomor_telepon']; ?></td>
                            <?php
                            $day = explode('-', $row['tanggal_pinjam'])[2];
                            $month = explode('-', $row['tanggal_pinjam'])[1];
                            $year = explode('-', $row['tanggal_pinjam'])[0];
                            ?>
                            <td class="text-center"><?= $day . ' ' . BULAN_DALAM_INDONESIA[$month - 1] . ' ' . $year;  ?></td>
                            <td class="text-center"><?= $row['keperluan']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
        <?php include_once "footer.php"; ?>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>