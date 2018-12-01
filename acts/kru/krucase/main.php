<?php
    $kru = @$_GET['kru'];
    switch ($kru) {

      case 'jadwal':
      include 'jadwal.php';
      break;

      case 'edittugas':
      include 'edittugas.php';
      break;

      case 'hapus':
      include 'hapusakunkru.php';
      break;

      case 'hapust':
      include 'hapusjadwal.php';
      break;

      case 'akunkru':
      include 'akunkru.php';
      break;

      case 'infokru':
      include 'infokru.php';
      break;

      case 'inputjadwal':
      include 'inputjadwal.php';
      break;

      // bagian divisi
      case 'produksi':
      include 'tugasproduksi.php';
      break;

      case 'humas':
      include 'tugashumas.php';
      break;

      case 'news':
      include 'tugasnews.php';
      break;
      // end bagian divisi

      case 'laporan':
      include 'laporan.php';
      break;

      case 'editakunkru':
      include 'editakunkru.php';
      break;

      default:
      include 'jadwal.php';
      break;
      
    }
    ?>
