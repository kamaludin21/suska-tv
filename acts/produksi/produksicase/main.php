<?php
    $produksi = @$_GET['produksi'];
    switch ($produksi) {

      case 'program':
      include 'program.php';
      break;

      case 'tambahprogram':
      include 'tambahprogram.php';
      break;

      case 'editprogram':
      include 'editprogram.php';
      break;

      case 'hapusprogram':
      include 'hapusprogram.php';
      break;

      case 'tabelprogram': // = infoprogram
      include 'tabelprogram.php';
      break;

      case 'tambahepisode':
      include 'tambahepisode.php';
      break;

      case 'editepisode':
      include 'editepisode.php';
      break;

      case 'hapusinfo':
      include 'hapusinfo.php';
      break;

      case 'jadwal':
      include 'jadwal.php';
      break;

      case 'tambahjadwal':
      include 'tambahjadwal.php';
      break;

      case 'editjadwal':
      include 'editjadwal.php';
      break;

      case 'kegliputan':
      include 'kegiatanliputan.php';
      break;

      case 'tambahliputan':
      include 'tambahliputan.php';
      break;

      case 'ubahliputan':
      include 'ubahliputan.php';
      break;

      case 'hapusliputan':
      include 'hapusliputan.php';
      break;

      case 'laporan':
      include 'laporan.php';
      break;

      case 'video':
      include 'videoplayer.php';
      break;

      default:
      include 'program.php';
      break;
    }
    ?>
