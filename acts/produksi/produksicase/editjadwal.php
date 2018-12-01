<?php
$id = $_GET["id"];
$data = query ("SELECT * FROM jadwalproduksi WHERE id=$id")[0];

if ( isset($_POST["submit"]) ) {

    if ( editjadwal ($_POST) > 0 ) {
        echo "<script> alert('Data berhasil diubah!');
        document.location.href= 'indexproduksi.php?produksi=jadwal';
        </script>";
    } else {
        echo "<script> alert('Data Gagal diubah!');
        document.location.href='indexproduksi.php?produksi=jadwal';
        </script>";
        exit();
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
                <b><h4>Edit Jadwal</h4></b>
                <hr>
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                <label for="program">Program</label>
                <div class="form-group">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <select class="form-control show-tick" name="program" required>
                            <option value="null">Pilih Program</option>
                            <?php
                            
                            $program = query("SELECT * FROM program");

                            foreach ($program as $v) {
                            ?>
                            <option value="<?php echo $v['program']; ?>"

                                <?php echo (($data['program'] == $v['program']) ? 'selected' : ''); ?> >
                                <?php echo $v['program']; ?>
                                    
                                </option>
                                <?php
                            }
                            ?>
                          </select>
                        </div>
                    </div>
                </div>
                
                <label for="kreatif">Kreatif</label>
                <div class="form-group">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-line">
                                <select class="form-control show-tick" id="kreatif" name="kreatif">
                                    <?php
                                    $status = 'Y';
                                    $divisi = 'produksi';
                                    $user = query("SELECT * FROM user WHERE status = '$status' AND divisi='$divisi'");

                                    foreach ($user as $v) {
                                    ?>
                                    <option value="<?= $v['kreatif']; ?>"

                                        <?= (($data['kreatif'] == $v['nama']) ? 'selected' : ''); ?> >
                                        <?= $v['nama']; ?>
                                            
                                        </option>
                                        <?php
                                    }
                                    ?>        
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <label for="editor">Editor</label>
                <div class="form-group">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-line">
                                <select class="form-control show-tick" id="editor" name="editor">
                                  <?php 
                                  foreach ($user as $v) {
                                     ?>
                                    <option value="<?= $v['editor']; ?>"

                                        <?= (($data['editor'] == $v['nama']) ? 'selected' : ''); ?> >
                                        <?= $v['nama']; ?>
                                            
                                        </option>
                                        <?php
                                    }
                                    ?>        
                                </select>
                            </div>
                        </div>
                    </div>
                </div>                 

                <label for="date">Tanggal Tapping</label>
                <div class="form-group form-float">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="form-line">
                                <input type="date" name="tglTap" id="date" value="<?= $data["tglTap"]; ?>" required>
                            </div>
                        </div>
                    </div>
                    <label for="keterangan">Keterangan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="keterangan" class="form-control" placeholder="Masukkan keterangan tugas" name="ket" value="<?= $data["ket"]; ?>" required>
                        </div>
                    </div>
                </div>            
                
                <a href="indexproduksi.php?produksi=jadwal" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                <button class="btn bg-blue waves-effect" type="submit" name="submit"><i class="material-icons">save</i><span>Simpan</span></button>
                </form>
            </div>
        </div>
    </div>
</div>