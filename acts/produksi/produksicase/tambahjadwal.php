<?php
$status = 'Y';
$divisi = 'produksi';
$nama = query("SELECT * FROM user WHERE status = '$status' AND divisi='$divisi'");

if ( isset($_POST["submit"]) ) {

    if ( jadwalproduksi($_POST) > 0 ) {
        echo "<script> alert('Data berhasil disimpan!');
        document.location.href= 'indexproduksi.php?produksi=jadwal';
        </script>";
    } else {
        echo "<script> alert('Data Gagal disimpan!');
        document.location.href='indexproduksi.php?produksi=jadwal';
        </script>";
        exit();
    }
}
?>
<div class="block-header">
    <h2 style="font-size: 28px;">Jadwal Produksi</h2>
</div>
<ol class="breadcrumb">
    <li><a href="indexproduksi.php">Produksi</a></li>
    <li><a href="indexproduksi.php?produksi=jadwal">Jadwal Produksi</a></li>
    <li class="active">Tambah Jadwal</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Tambah Jadwal</h4></b>
                <hr>
                <form action="" method="post">

                <input type="hidden" name="id">
                <label for="program">Program</label>
                <div class="form-group">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <select class="form-control show-tick" name="program" required>
                            <option value="null">Pilih Program</option>
                            <?php
                            
                            $program = query ("SELECT * FROM program");
                            foreach ($program as $v) {
                              echo '<option value="'.$v['program'].'">'.$v['program'].'</option>';
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
                                <select class="form-control show-tick scroll" id="kreatif" name="kreatif" >
                                    <?php
                                    
                                    foreach ($nama as $v) {
                                      echo '<option value="'.$v['nama'].'">'.$v['nama'].'</option>';
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
                                    foreach ($nama as $v) {
                                      echo '<option value="'.$v['nama'].'">'.$v['nama'].'</option>';
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
                                <input type="date" name="tglTap" id="date" required>
                            </div>
                        </div>
                    </div>
                    <label for="keterangan">Keterangan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="keterangan" class="form-control" placeholder="Masukkan keterangan tugas" name="ket" required>
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