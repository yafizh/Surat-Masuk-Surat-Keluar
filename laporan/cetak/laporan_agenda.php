<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Agenda</title>
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
        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Agenda</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dari = $_POST['dari'];
                $sampai = $_POST['sampai'];
                $id_ruangan = $_POST['id_ruangan'];
                $no = 1;
                require_once "../../koneksi.php";
                require_once "../../utils.php";
                $result = $mysqli->query("
                    SELECT 
                        * 
                    FROM 
                        tabel_agenda 
                    INNER JOIN 
                        tabel_ruangan 
                    ON tabel_ruangan.id_ruangan=tabel_agenda.id_ruangan 
                    WHERE 
                        tabel_ruangan.id_ruangan LIKE '%$id_ruangan%' 
                        AND 
                        tanggal >= '$dari' 
                        AND 
                        tanggal <= '$sampai' 
                    ORDER BY id_agenda DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $row['tanggal']; ?></td>
                            <td class="text-center"><?= $row['waktu']; ?></td>
                            <td class="text-center"><?= $row['nama_ruangan']; ?></td>
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