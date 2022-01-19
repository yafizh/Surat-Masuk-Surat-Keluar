<?php

if (isset($_GET['id_kode_surat'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_kode_surat WHERE id_kode_surat=" . $_GET['id_kode_surat'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Kode Surat berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=kode_surat&item=tampil_kode_surat';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=kode_surat&item=tampil_kode_surat';" .
        "</script>";