<?php

if (isset($_GET['id_peminjaman_inventaris'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_peminjaman_inventaris WHERE id_peminjaman_inventaris=" . $_GET['id_peminjaman_inventaris'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Peminjaman Inventaris berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=inventaris&item=tampil_peminjaman_inventaris';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=inventaris&item=tampil_peminjaman_inventaris';" .
        "</script>";