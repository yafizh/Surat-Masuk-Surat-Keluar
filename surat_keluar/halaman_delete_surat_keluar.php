<?php

if (isset($_GET['id_surat_keluar'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_surat_keluar WHERE id_surat_keluar=" . $_GET['id_surat_keluar'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Surat Keluar berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=surat_keluar&item=tampil_surat_keluar';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=surat_keluar&item=tampil_surat_keluar';" .
        "</script>";