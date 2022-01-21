<?php

if (isset($_GET['id_surat_disposisi'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_surat_disposisi WHERE id_surat_disposisi=" . $_GET['id_surat_disposisi'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Surat Disposisi berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=surat_disposisi&item=tampil_surat_disposisi';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=surat_disposisi&item=tampil_surat_disposisi';" .
        "</script>";