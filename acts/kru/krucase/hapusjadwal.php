<?php
$id = $_GET["id"];

if (hapust($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexkru.php';
          </script>";
} else {
  echo "<script>
          alert('Data Gagal dihapus!');
          document.location.href='indexkru.php';
          </script>";
}

?>
