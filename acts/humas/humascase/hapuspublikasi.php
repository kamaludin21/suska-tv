<?php
$id = $_GET["id"];

if ( hapuspublikasi ($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexhumas.php?humas=publikasi';
          </script>";
} else {
  echo "<script>
          alert('Data Gagal dihapus!');
          document.location.href='indexhumas.php?humas=publikasi';
          </script>";
}

?>