<?php

if (isset($_GET['id_user'])) {
    require_once "koneksi.php";

    $sql = "DELETE FROM tabel_user WHERE id_user=" . $_GET['id_user'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('User berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=user&item=tampil_user';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=user&item=tampil_user';" .
        "</script>";