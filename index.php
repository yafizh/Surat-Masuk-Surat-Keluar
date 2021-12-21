<?php include_once "header.php"; ?>
<?php 
  if(isset($_GET['page'])){
    if($_GET['page'] == 'tambah_surat' && $_GET['item'] == 'tambah_surat_masuk') {
      include_once "halaman_tambah_surat_masuk.php";      
    } else if($_GET['page'] == 'tambah_surat' && $_GET['item'] == 'tambah_surat_keluar') {
      include_once "halaman_tambah_surat_keluar.php";      
    } else if($_GET['page'] == 'tampil_surat' && $_GET['item'] == 'tampil_surat_masuk') {
      include_once "halaman_tampil_surat_masuk.php";      
    } else if($_GET['page'] == 'tampil_surat' && $_GET['item'] == 'tampil_surat_keluar') {
      include_once "halaman_tampil_surat_keluar.php";      
    }
  } else {
    include_once "halaman_beranda.php";
  }

?>
<?php include_once "footer.php"; ?>