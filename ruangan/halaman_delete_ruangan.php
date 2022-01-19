<?php

if (isset($_GET['id_ruangan'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_ruangan WHERE id_ruangan=" . $_GET['id_ruangan'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Ruangan berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=ruangan&item=tampil_ruangan';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=ruangan&item=tampil_ruangan';" .
        "</script>";