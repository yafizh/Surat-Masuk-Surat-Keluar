<?php

function checkFileSize($size, $max_size)
{
    if ($size > $max_size) {
        echo "<script>alert('File yang diupload harus kurang dari " . ($max_size/1000) . "KB')</script>";
        return 0;
    } else return 1;
}

function allowedFileType($file_type, $allowed_type)
{
    $allowed = 0;
    foreach ($allowed_type as $type) {
        if ($file_type == $type) $allowed = 1;
    }

    if($allowed === 1) return 1;
    else {
        echo "<script>alert('Hanya menerima file ".implode(', ', $allowed_type)."')</script>";
        return 0;
    }
}
