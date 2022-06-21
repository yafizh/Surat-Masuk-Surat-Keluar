<?php

if (isset($_GET['id_inventaris'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_inventaris WHERE id_inventaris=" . $_GET['id_inventaris'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Inventaris berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=inventaris&item=tampil_inventaris';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=inventaris&item=tampil_inventaris';" .
        "</script>";