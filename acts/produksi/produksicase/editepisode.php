<?php 
$id = $_GET["id"];
$data = query ("SELECT * FROM infoprogram WHERE id='$id'")[0];
$judul = $data["program"];

if ( isset($_POST["submit"]) ) {

    if ( editeps ($_POST) > 0 ) {
        echo "<script> alert('Data berhasil diubah!');
        document.location.href= 'indexproduksi.php?produksi=tabelprogram&program=$judul';
        </script>";
    } else {
        echo "<script> alert('Data Gagal diubah!');
        document.location.href= 'indexproduksi.php?produksi=tabelprogram&program=$judul';
        </script>";
    }
}

?>
<div class="block-header">
    <h2 style="font-size: 28px;">Edit Episode</h2>
</div>
<ol class="breadcrumb">
    <li><a href="javascript:void(0);">Produksi</a></li>
    <li><a href="javascript:void(0);">Program</a></li>
    <li><a href="javascript:void(0)">Info Program</a></li>
    <li class="active">Edit Episode</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Suska News</h4></b>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                <input type="hidden" name="program" value="<?= $data["program"]; ?>">

                <label for="episode">Episode Ke - </label>
                <div class="form-group">
                  <div class="form-line">
                      <input type="number" id="episode" class="form-control" placeholder="Masukkan episode" name="eps" value="<?= $data["eps"]; ?>" required autofocus>
                  </div>
                </div>

                <label for="tema">Tema</label>
                <div class="form-group">
                  <div class="form-line">
                      <input type="text" id="tema" class="form-control" placeholder="Masukkan tema episode" name="tema" value="<?= $data["tema"]; ?>" required autofocus>
                  </div>
                </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <b><p>Editor</p></b>
                            <select class="form-control show-tick" name="editor">
                                    <?php
                                    $status = 'Y';
                                    $divisi = 'produksi';
                                    $nama = query("SELECT * FROM user WHERE status = '$status' AND divisi = '$divisi'");
            
                                    foreach ($nama as $v) {
                                    ?>
                                    <option value="<?php echo $v['nama']; ?>"

                                        <?php echo (($data['editor'] == $v['nama']) ? 'selected' : ''); ?> >
                                        <?php echo $v['nama']; ?>
                                            
                                        </option>
                                        <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <b><p>Kreatif</p></b>
                            <select class="form-control show-tick" name="kreatif">
                                    <?php
                                    $status = 'Y';
                                    $divisi = 'produksi';
                                    $nama = query("SELECT * FROM user WHERE status = '$status' AND divisi = '$divisi'");
            
                                    foreach ($nama as $v) {
                                    ?>
                                    <option value="<?php echo $v['nama']; ?>"

                                        <?php echo (($data['editor'] == $v['nama']) ? 'selected' : ''); ?> >
                                        <?php echo $v['nama']; ?>
                                            
                                        </option>
                                        <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    
                    <input type="hidden" name="videolama" value="<?= $data["video"]; ?>">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="file" class="form-control" name="video">
                        </div>
                    </div>
                    <a href="#" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                    <button class="btn bg-blue waves-effect" type="submit" name="submit">
                    <i class="material-icons">save</i><span>Simpan</span></button>
                </form>
            </div>
        </div>
    </div>
</div>