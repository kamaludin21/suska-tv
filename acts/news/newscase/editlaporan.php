<?php
$id = $_GET["id"];
$data = query ("SELECT * FROM kegliputan WHERE id='$id'")[0];

if ( isset($_POST["submit"]) ) {

  if ( edlip($_POST) > 0 ) {
    echo "
    <script>
            alert('Data berhasil diubah!');
            document.location.href= 'indexnews.php?news=laporan';
            </script>
            ";
  } else {
    echo "
    <script>
            alert('Data Gagal diubah!');
            document.location.href='indexnews.php?news=laporan';
            </script>
            ";
          }
  }
?>
<div class="block-header">
	<h2 style="font-size: 28px;">Edit Kegiatan Liputan</h2>
</div>
<ol class="breadcrumb">
	<li><a href="javascript:void(0);">News</a></li>
    <li><a href="javascript:void(0);">Kegiatan Liputan</a></li>
    <li class="active">Edit Kegiatan Liputan</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>News1</h4></b>
                <hr>
                <form action="" method="post">
                    
                    <div class="form-group form-float">
                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                        <div class="form-line">
                            <input type="text" class="form-control" value="<?= $data["acara"]; ?>" name="acara" >
                            <label class="form-label">Nama Kegiatan</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="date" class="form-control" value="<?= $data["tanggal"]; ?>" name="tanggal">
                            <label class="form-label">Tanggal</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>Reporter</p>
                            <select class="form-control show-tick" name="reporter">
                                    <?php
                                    $status = 'Y';
                                    $nama = query("SELECT * FROM user WHERE status = '$status'");
            
                                    foreach ($nama as $v) {
                                    ?>
                                    <option value="<?php echo $v['nama']; ?>"

                                        <?php echo (($data['reporter'] == $v['nama']) ? 'selected' : ''); ?> >
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
                            <p>Reporter</p>
                            <select class="form-control show-tick" name="kamper">
                            <?php
                            $status = 'Y';
                            $nama = query("SELECT * FROM user WHERE status = '$status'");
    
                            foreach ($nama as $v) {
                            ?>
                            <option value="<?php echo $v['nama']; ?>"

                                <?php echo (($data['kamper'] == $v['nama']) ? 'selected' : ''); ?> >
                                <?php echo $v['nama']; ?>
                                    
                                </option>
                                <?php
                            }
                            ?>
                            </select>
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