<?php
$status = 'Y';
$divisi = 'news';
$nama = query("SELECT * FROM user WHERE status = '$status' AND divisi='$divisi'");

if ( isset($_POST["submit"]) ) {

    if ( liputan($_POST) > 0 ) {
        echo "<script> alert('Data berhasil disimpan!');
        document.location.href= 'indexnews.php?news=laporan';
        </script>";
    } else {
        echo "<script> alert('Data Gagal disimpan!');
        document.location.href='indexnews.php?news=laporan';
        </script>";
    }
}
?>
<div class="block-header">
	<h2 style="font-size: 28px;">Tambah Kegiatan Liputan</h2>
</div>
<ol class="breadcrumb">
	<li><a href="javascript:void(0);">News</a></li>
    <li><a href="javascript:void(0);">Kegiatan Liputan</a></li>
	<li class="active">Tambah Kegiatan Liputan</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h4><b>Data Kegiatan</b></h4>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="id">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="acara">
                            <label class="form-label">Nama Kegiatan</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>Reporter</p>
                            <select class="form-control show-tick" name="reporter">
                                <?php
                                    foreach ($nama as $v){
                                        echo '<option value="'.$v['nama'].'">'.$v['nama'].'</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                        <p>Kampers</p>
                        <select class="form-control show-tick" name="kamper">
                                <?php
                                    foreach ($nama as $v){
                                        echo '<option value="'.$v['nama'].'">'.$v['nama'].'</option>';
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