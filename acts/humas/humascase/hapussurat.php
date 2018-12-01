<?php
$id = $_GET["id"];

if ( hapussurat ($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexhumas.php';
          </script>";
} else {
  echo "<script>
          alert('Data Gagal dihapus!');
          document.location.href='indexhumas.php';
          </script>";
}

?>