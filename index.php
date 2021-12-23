<?php include_once "header.php"; ?>
<?php 
  if(isset($_GET['page'])){
    if($_GET['page'] == 'tambah_surat' && $_GET['item'] == 'tambah_surat_masuk') {
      include_once "surat_masuk/halaman_tambah_surat_masuk.php";      
    } else if($_GET['page'] == 'tambah_surat' && $_GET['item'] == 'tambah_surat_keluar') {
      include_once "surat_keluar/halaman_tambah_surat_keluar.php";      
    } else if($_GET['page'] == 'tampil_surat' && $_GET['item'] == 'tampil_surat_masuk') {
      include_once "surat_masuk/halaman_tampil_surat_masuk.php";      
    } else if($_GET['page'] == 'tampil_surat' && $_GET['item'] == 'tampil_surat_keluar') {
      include_once "surat_keluar/halaman_tampil_surat_keluar.php";      
    } else if($_GET['page'] == 'edit_surat' && $_GET['item'] == 'edit_surat_masuk') {
      include_once "surat_masuk/halaman_edit_surat_masuk.php";      
    } else if($_GET['page'] == 'delete_surat' && $_GET['item'] == 'delete_surat_masuk') {
      include_once "surat_masuk/halaman_delete_surat_masuk.php";      
    }
  } else {
    include_once "halaman_beranda.php";
  }

?>
<?php include_once "footer.php"; ?>