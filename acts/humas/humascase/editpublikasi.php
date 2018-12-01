<?php
$id = $_GET["id"];
$data = query ("SELECT * FROM publikasi WHERE id=$id")[0];

if ( isset($_POST["submit"]) ) {

  if ( editpub ($_POST) > 0 ) {
    echo "
    <script>
            alert('Data berhasil diubah!');
            document.location.href= 'indexhumas.php?humas=publikasi';
            </script>
            ";
  } else {
    echo "
    <script>
            alert('Data Gagal diubah!');
            document.location.href='indexhumas.php?humas=publikasi';
            </script>
            ";
          }
  }
?>

<div class="block-header">
    <h2 style="font-size: 28px;">Edit Publikasi</h2>
</div>
<ol class="breadcrumb">
    <li><a href="javascript:void(0);">Humas & Administrasi</a></li>
    <li><a href="javascript:void(0);">Daftar Publikasi</a></li>
    <li><a href="javascript:void(0);">Detail Publikasi</a></li>
    <li class="active">Edit Publikasi</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Ubah - <?= $data["agenda"]; ?></h4></b>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    <input type="hidden" name="doclama" value="<?= $data["file"]; ?>" >

                    <label for="agenda">Agenda</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="agenda" class="form-control" placeholder="Masukkan nama agenda" name="agenda" value="<?= $data["agenda"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="isu">Isu</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="isu" class="form-control" placeholder="Masukkan isu publikasi" name="isu" value="<?= $data["isu"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="tanggal">Tanggal</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tanggal" class="form-control" placeholder="Masukkan tanggal agenda" name="tgl" value="<?= $data["tgl"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="tempat">Tempat</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="tempat" class="form-control" placeholder="Masukkan nama tempat" name="tempat" value="<?= $data["tempat"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="file">Dokumentasi</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" id="file" class="form-control" placeholder="Unggah file anda" name="doc">
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