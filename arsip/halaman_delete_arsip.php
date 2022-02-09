<?php

if (isset($_GET['id_arsip'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_arsip WHERE id_arsip=" . $_GET['id_arsip'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Arsip berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=arsip&item=tampil_arsip';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=arsip&item=tampil_arsip';" .
        "</script>";