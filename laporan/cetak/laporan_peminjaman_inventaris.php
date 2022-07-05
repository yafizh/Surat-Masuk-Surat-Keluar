<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Inventaris</title>
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

        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Peminjaman Inventaris</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Barang</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Sampai</th>
                    <th>Keperluan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dari = $_POST['dari'];
                $sampai = $_POST['sampai'];
                $no = 1;
                require_once "../../koneksi.php";
                $result = $mysqli->query("
                    SELECT 
                        tabel_peminjaman_inventaris.*,
                        tabel_inventaris.nama AS nama_barang  
                    FROM 
                        tabel_peminjaman_inventaris 
                    INNER JOIN 
                        tabel_inventaris 
                    ON 
                        tabel_inventaris.id_inventaris=tabel_peminjaman_inventaris.id_inventaris 
                    WHERE 
                        tabel_peminjaman_inventaris.tanggal_pinjam >= '$dari' 
                        AND 
                        tabel_peminjaman_inventaris.tanggal_pinjam <= '$sampai' 
                    ORDER BY tabel_peminjaman_inventaris.id_peminjaman_inventaris DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $row['nama_barang']; ?></td>
                            <td class="text-center"><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['tanggal_pinjam']; ?></td>
                            <td class="text-center"><?= $row['sampai']; ?></td>
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