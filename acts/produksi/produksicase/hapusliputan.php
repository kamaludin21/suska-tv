<?php
$id = $_GET["id"];

if (hapusl($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexproduksi.php?produksi=kegliputan';
          </script>";
} else {
  echo "<script>
          alert('Data Gagal dihapus!');
          document.location.href='indexproduksi.php?produksi=kegliputan';
          </script>";
}

?>
