<?php
$id = $_GET["id"];
$data = query ("SELECT * FROM surat WHERE id=$id")[0];

if ( isset($_POST["submit"]) ) {

  if ( editsurat ($_POST) > 0 ) {
    echo "
    <script>
            alert('Data berhasil diubah!');
            document.location.href= 'indexhumas.php';
            </script>
            ";
  } else {
    echo "
    <script>
            alert('Data Gagal diubah!');
            document.location.href='indexhumas.php';
            </script>
            ";
          }
  }
?>
<div class="block-header">
    <h2 style="font-size: 28px;">Edit Surat</h2>
</div>
<ol class="breadcrumb">
    <li><a href="javascript:void(0);">Humas & Administrasi</a></li>
    <li><a href="javascript:void(0);">Kelola Surat</a></li>
    <li class="active">Edit Surat</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Ubah - <?= $data["kegiatan"]; ?></h4></b>
                <hr>
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    <label for="nama">Nama Pengaju</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="nama" class="form-control" placeholder="Masukkan nama pengaju" name="nama" value="<?= $data["nama"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="nohp">Nomor HP</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" id="nohp" class="form-control" placeholder="Masukkan nomor hp pengaju" name="nohp" value="<?= $data["nohp"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="kegiatan">Kegiatan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="kegiatan" class="form-control" placeholder="Masukkan nama kegiatan" name="kegiatan" value="<?= $data["kegiatan"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="tgl">Tanggal Acara</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tgl" class="form-control" placeholder="Masukkan tanggal acara" name="tgl" value="<?= $data["tgl"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="tempat">Tempat Acara</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="tempat" class="form-control" placeholder="Masukkan tempat acara" name="tempat" value="<?= $data["tempat"]; ?>" required autofocus>
                        </div>
                    </div>

                    <label for="ket">Keterangan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="ket" class="form-control" placeholder="Masukkan keterangan" name="ket" value="<?= $data["ket"]; ?>" required autofocus>
                        </div>
                    </div>
                    <a href="indexhumas.php" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                    <button type="submit" name="submit" class="btn bg-blue waves-effect"><i class="material-icons">save</i><span>Simpan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
