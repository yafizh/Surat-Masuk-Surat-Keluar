<?php

if (isset($_GET['id_surat_masuk'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_surat_masuk WHERE id_surat_masuk=" . $_GET['id_surat_masuk'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Surat Masuk berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=surat_masuk&item=tampil_surat_masuk';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=surat_masuk&item=tampil_surat_masuk';" .
        "</script>";