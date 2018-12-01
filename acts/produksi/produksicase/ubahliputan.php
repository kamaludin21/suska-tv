<?php
$id = $_GET["id"];
$data = query ("SELECT * FROM kegliputan WHERE id='$id'")[0];

if ( isset($_POST["submit"]) ) {

  if ( edlip($_POST) > 0 ) {
    echo "
    <script>
            alert('Data berhasil diubah!');
            document.location.href= 'indexproduksi.php?produksi=kegliputan';
            </script>
            ";
  } else {
    echo "
    <script>
            alert('Data Gagal diubah!');
            document.location.href='indexproduksi.php?produksi=kegliputan';
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
                    <input type="hidden" name="id" value="<?= $data["id"]; ?>">

                    <label for="tgl">Nama Kegiatan</label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" class="form-control" name="acara" value="<?= $data["acara"]; ?>" placeholder="Masukkan nama kegiatan" required autofocus>
                      </div>
                    </div>

                    <label for="date">Tanggal</label>
                    <div class="form-group form-float">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="form-line">
                                <input type="date" name="tanggal" id="date" value="<?= $data["tanggal"]; ?>" required>
                            </div>
                        </div>
                    </div>

                    <label for="tgl">Reporter</label>
                    <div class="form-group">
                      <div class="form-line">
                        <select class="form-control show-tick" name="reporter">
                            <option value="null">Pilih Reporter</option>
                                <?php
                                    $status = 'Y';
                                    $divisi = 'kru';
                                    $nama = query("SELECT * FROM user WHERE status = '$status' AND divisi !='$divisi'");
            
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

                    <label for="tgl">Kamera Person</label>
                    <div class="form-group">
                      <div class="form-line">
                        <select class="form-control show-tick" name="kamper">
                            <option value="null">Pilih Kamper</option>
                                <?php
                             $status = 'Y';
                                    $divisi = 'kru';
                                    $nama = query("SELECT * FROM user WHERE status = '$status' AND divisi !='$divisi'");
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
                    
                    <a href="indexproduksi.php?produksi=kegliputan" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                    <button class="btn bg-blue waves-effect" type="submit" name="submit">
                    <i class="material-icons">save</i><span>Simpan</span></button>
                </form>
            </div>
        </div>
    </div>
</div>