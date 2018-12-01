<?php
$news = @$_GET['news'];
switch ($news) {

	case 'naskah':
	include 'naskah.php';
	break;

	case 'editnaskah':
	include 'editnaskah.php';
	break;

	case 'create':
	include 'create.php';
	break;

	case 'inputlaporan':
	include 'inputlaporan.php';
	break;

	case 'editlaporan':
	include 'editlaporan.php';
	break;

	case 'laporan':
	include 'laporan.php';
	break;

	case 'hapusl':
	include 'hapuskegliputan.php';
	break;

	default:
	include 'naskah.php';
	break;
	
}
?>
