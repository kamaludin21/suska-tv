<?php
$id = $_GET["id"];
$data = query ("SELECT program FROM infoprogram WHERE id='$id'")[0];
$program = $data["program"];

if ( hapusinfo ($id) > 0) {
  echo "<script>
          alert('Data telah dihapus!');
          document.location.href='indexproduksi.php?produksi=tabelprogram&program=$program';
          </script>";
} else {
  echo "<script>
          alert('Data Gagal dihapus!');
          document.location.href='indexproduksi.php?produksi=program';
          </script>";
}

?>