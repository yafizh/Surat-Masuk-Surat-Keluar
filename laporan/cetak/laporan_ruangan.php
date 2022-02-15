<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Ruangan</title>
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

        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Ruangan</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Ruangan</th>
                    <th>Singkatan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                require_once "../../koneksi.php";
                $result = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY id_ruangan DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $row['nama_ruangan']; ?></td>
                            <td class="text-center"><?= $row['singkatan']; ?></td>
                            <td class="text-center"><?= $row['keterangan']; ?></td>
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