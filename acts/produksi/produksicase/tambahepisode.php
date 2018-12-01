<?php
$judul = $_GET["program"];
$nama = query ("SELECT * FROM user WHERE status ='Y' AND divisi ='produksi'");
$kreatif = query("SELECT pj FROM program WHERE program='$judul'")[0];

if ( isset($_POST["submit"]) ) {

    if ( tambaheps ($_POST) > 0 ) {
        echo "<script> alert('Data berhasil disimpan!');
        document.location.href= 'indexproduksi.php?produksi=tabelprogram&program=$judul';
        </script>";
    } else {
        echo "<script> alert('Data Gagal disimpan!');
        document.location.href='indexproduksi.php?produksi=tabelprogram&program=$judul';
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
    <li><a href="indexproduksi.php?produksi=tabelprogram&program=<?=$judul;?>">Info Program</a></li>
    <li class="active">Tambah Episode</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Tambah Episode - <?= $judul; ?></h4></b>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id">
                <input type="hidden" name="program" value="<?= $judul; ?>">

                <label for="episode">Episode Ke - </label>
                <div class="form-group">
                  <div class="form-line">
                      <input type="number" id="episode" class="form-control" placeholder="Masukkan episode" name="eps" required autofocus>
                  </div>
                </div>

                <label for="tema">Tema</label>
                <div class="form-group">
                  <div class="form-line">
                      <input type="text" id="tema" class="form-control" placeholder="Masukkan tema episode" name="tema" required autofocus>
                  </div>
                </div>

                <label for="editor">Editor</label>
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" name="editor">
                        <?php
                        foreach ($nama as $v){
                            echo '<option value="'.$v['nama'].'">'.$v['nama'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
                
                <?php 
                foreach ($kreatif as $shows) { ?>
                <input type="hidden" name="kreatif" value="<?= $shows; ?>">
                <?php } ?>

                <label for="video">File Video</label>
                <div class="form-group">
                  <div class="form-line">
                      <input type="file" id="video" class="form-control" placeholder="Masukkan episode" name="video" required autofocus>
                  </div>
                </div>
                <a href="indexproduksi.php?produksi=tabelprogram&program=<?=$judul;?>" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                <button class="btn bg-blue waves-effect" type="submit" name="submit"><i class="material-icons">save</i><span>Simpan</span></button>
                </form>
            </div>
        </div>
    </div>
</div>