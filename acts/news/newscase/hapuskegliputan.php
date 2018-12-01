<?php
$id = $_GET["id"];

if (hapusl($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexnews.php?news=laporan';
          </script>";
} else {
  echo "<script>
          alert('Data Gagal dihapus!');
          document.location.href='indexnews.php?news=laporan';
          </script>";
}

?>
