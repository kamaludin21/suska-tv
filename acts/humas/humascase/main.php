<?php
    $humas = @$_GET['humas'];
    switch ($humas) {

      case 'surat':
      include 'surat.php';
      break;

      case 'tambahsurat':
      include 'tambahsurat.php';
      break;

      case 'editsurat':
      include 'editsurat.php';
      break;

      case 'hapussurat':
      include 'hapussurat.php';
      break;

      case 'hapuspublikasi':
      include 'hapuspublikasi.php';
      break;

      case 'tambahpublikasi':
      include 'tambahpublikasi.php';
      break;

      case 'editpublikasi':
      include 'editpublikasi.php';
      break;

      case 'publikasi':
      include 'publikasi.php';
      break;

      case 'detail':
      include 'detailpublikasi.php';
      break;
      
      default:
      include 'surat.php';
      break;
    }
    ?>
