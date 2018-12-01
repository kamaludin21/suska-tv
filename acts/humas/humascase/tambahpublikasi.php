<?php

if ( isset($_POST["submit"]) ) {

    if ( tambahpub ($_POST) > 0 ) {
        echo "<script> alert('Data berhasil ditambah!');
        document.location.href= 'indexhumas.php?humas=publikasi';
        </script>";
    } else {
        echo "<script> alert('Data Gagal ditambah!');
        document.location.href='indexhumas.php?humas=publikasi';
        </script>";
    }
}

?>
<div class="block-header">
    <h2 style="font-size: 28px;">Tambah Publikasi</h2>
</div>
<ol class="breadcrumb">
    <li><a href="javascript:void(0);">Humas & Administrasi</a></li>
    <li><a href="javascript:void(0);">Daftar Publikasi</a></li>
    <li class="active">Tambah Publikasi</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Program</h4></b>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">

                    <label for="agenda">Agenda</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="agenda" class="form-control" placeholder="Masukkan nama agenda" name="agenda" required autofocus>
                        </div>
                    </div>

                    <label for="isu">Isu</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="isu" class="form-control" placeholder="Masukkan isu publikasi" name="isu" required autofocus>
                        </div>
                    </div>

                    <label for="tanggal">Tanggal</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tanggal" class="form-control" placeholder="Masukkan tanggal agenda" name="tgl" required autofocus>
                        </div>
                    </div>

                    <label for="tempat">Tempat</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="tempat" class="form-control" placeholder="Masukkan nama tempat" name="tempat" required autofocus>
                        </div>
                    </div>

                    <label for="file">File</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" id="file" class="form-control" placeholder="Unggah file anda" name="doc" required autofocus>
                        </div>
                    </div>
                    
                    <a href="indexhumas.php?humas=publikasi" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                    <button type="submit" name="submit" class="btn bg-blue waves-effect"><i class="material-icons">save</i><span>Simpan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>