<?php
$id = $_GET["id"];

if (hapus($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexkru.php?kru=akunkru';
          </script>";
} else {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexkru.php?kru=akunkru';
          </script>";
}

?>
