<?php
$id = $_GET["id"];

if (hapusprog($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexproduksi.php';
          </script>";
} else {
  echo "<script>
          alert('Data Gagal dihapus!');
          document.location.href='indexproduksi.php';
          </script>";
}

?>
