<?php
$status = 'Y';
$divisi = 'produksi';
$nama = query("SELECT * FROM user WHERE status = '$status' AND divisi='$divisi'");

if ( isset($_POST["submit"]) ) {

    if ( tambahprog($_POST) > 0 ) {
        echo "<script> alert('Data berhasil disimpan!');
        document.location.href= 'indexproduksi.php';
        </script>";
    } else {
        echo "<script> alert('Data Gagal disimpan!');
        document.location.href='indexproduksi.php';
        </script>";
    }
}
?>
<div class="block-header">
    <h2 style="font-size: 28px;">Program</h2>
</div>
<ol class="breadcrumb">
    <li><a href="indexproduksi.php">Produksi</a></li>
    <li><a href="indexproduksi.php">Program</a></li>
    <li class="active">Tambah Program</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Tambah Program</h4></b>
                <hr>
                <form action="" method="post">
                <input type="hidden" name="id">

                <label for="program">Nama Program</label>
                <div class="form-group">
                  <div class="form-line">
                      <input type="text" id="program" class="form-control" placeholder="Masukkan nama program" name="program" required autofocus>
                  </div>
                </div>

                <label for="pj">Penanggung Jawab</label>
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" name="pj">
                        <?php
                        foreach ($nama as $v){
                            echo '<option value="'.$v['nama'].'">'.$v['nama'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>

                <label for="ket">Keterangan</label>
                <div class="form-group">
                  <div class="form-line">
                      <input type="text" id="ket" class="form-control" placeholder="Masukkan keterangan program" name="ket" required autofocus>
                  </div>
                </div>
                <a href="indexproduksi.php" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                <button class="btn bg-blue waves-effect" type="submit" name="submit"><i class="material-icons">save</i><span>Simpan</span></button>
                </form>
            </div>
        </div>
    </div>
</div>