<?php
$idlogin = $_SESSION["id"];
$data = query ("SELECT * FROM user WHERE id=$idlogin")[0];
if ( isset($_POST["submit"]) ) {
if ( ubahprofil($_POST) > 0 ) {
echo "
<script>
alert('Data berhasil diubah!');
document.location.href= 'indexprofil.php';
</script>
";
} else {
echo "
<script>
alert('Data Gagal diubah!');
document.location.href='indexprofil.php';
</script>
";
}
}
?>
<div class="block-header">
  <h2 style="font-size: 28px;">Edit Profil</h2>
</div>
<ol class="breadcrumb">
  <li><a href="indexprofil.php">Profil</a></li>
  <li><a href="indexprofil.php?profilcase=profilcase&task">Profil Saya</a></li>
  <li class="active">Edit</li>
</ol>
<div class="row clearfix">
  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
        <b>Edit Profil</b>
        </h2>
      </div>
      <div class="body">
        <div class="row clearfix" >
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $data["id"];?>" readonly>
              <input type="hidden" name="gambarlama" value="<?= $data["gambar"]; ?>">

              <label for="nama">Nama Lengkap</label>
              <div class="form-group">
                  <div class="form-line">
                      <input type="text" id="nama" class="form-control" placeholder="Masukkan nama lengkap anda" name="nama" value="<?= $data["nama"]; ?>" required autofocus>
                  </div>
              </div>

              <label for="username">Username</label>
              <div class="form-group">
                  <div class="form-line">
                      <input type="text" id="username" class="form-control" placeholder="Masukkan username anda" name="username" value="<?= $data["username"]; ?>" required>
                  </div>
              </div>
              
              <input type="hidden" name="password" value="<?= $data["password"]; ?>" readonly>
              <input type="hidden" name="divisi" value="<?= $data["divisi"]; ?>" readonly>
              <input type="hidden" name="status" value="<?= $data["status"]; ?>" readonly>

              <label for="email">Email</label>
              <div class="form-group">
                  <div class="form-line">
                      <input type="email" id="email" class="form-control" placeholder="Masukkan email anda" name="email" value="<?= $data["email"]; ?>" required>
                  </div>
              </div>

              <label for="nohp">Nomor HP</label>
              <div class="form-group">
                  <div class="form-line">
                      <input type="number" id="nohp" class="form-control" placeholder="Masukkan nomor hp anda" name="nohp" value="<?= $data["nohp"]; ?>" required>
                  </div>
              </div>

              <div class="form-group form-float">
                <div class="row clearfix">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-line">
                      <p>Jenis Kelamin</p>
                      <select class="form-control show-tick" name="jk" required>
                        <option value="lk" <?= (($data['jk'] == 'lk') ? 'selected' : ''); ?> >Laki-laki</option>
                        <option value="pr" <?= (($data['jk'] == 'pr') ? 'selected' : ''); ?>>Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <p>Tanggal Lahir</p>
                    <div class="form-line show-tick">
                      <input type="date" name="tgl" id="date" value="<?= $data["tgl"]; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <p>Foto Profil : </p>
                <div class="form-line">
                  <input type="file" id="gambar" name="gambar">
                </div>
                <br>
                <!-- progres bar -->
                <!-- <div class="progress">
                    <div id="progressBar" class="progress-bar bg-orange progress-bar-striped active" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                         aria-valuemax="100" style="width: 85%">
                        Upload File
                    </div>
                </div> -->
              </div>
              </div>

              <a href="indexprofil.php" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
              <button type="submit" name="submit" class="btn bg-blue waves-effect"><i class="material-icons">save</i><span>Simpan</span>
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
        <b>Foto Profil</b>
        </h2>
      </div>
      <div class="body">
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="#" data-sub-html="Demo Description">
              <img class="img-responsive thumbnail" src="../../images/profil/<?= $data["gambar"]; ?>">
            </a>
          </div><center>
          <label>Rekomendasi Ukuran : 700 X 750</label></center>
        </div>
        
      </div>
    </div>
  </div>
</div>