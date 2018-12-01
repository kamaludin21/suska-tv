<?php
$idlogin = $_SESSION["id"];
$data = query ("SELECT * FROM user WHERE id=$idlogin")[0];

if ( isset($_POST["submit"]) ) {
  if ( pass ($_POST) > 0 ) {
    echo "<script>
            alert('Berhasil ubah password');
            document.location.href= 'indexprofil.php';
          </script>";

        } else {
          echo "<script>
                  alert('Gagal ubah password');
            document.location.href='indexprofil.php';
            </script>";
          }
        }
?>
<div class="block-header">
<h2 style="font-size: 28px;">Ubah Password</h2>
</div>
 <ol class="breadcrumb">
    <li><a href="indexprofil.php">Profil</a></li>
    <li class="active">Ubah Password</li>
</ol>
<div class="row clearfix">
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h4>
                <b>Ubah Password</b>
            </h4>
        </div>
        <div class="body">
            <div class="row clearfix" >
                <div class="col-sm-12">
                    <form action="" method="POST">
                    <input type="hidden" value="<?= $data["id"];?>" name="id">

                    <label for="password">Password</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" id="password" class="form-control" placeholder="Masukkan password lama anda" name="password" required autofocus>
                        </div>
                    </div>

                    <label for="password">Password Baru</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" id="password" class="form-control" placeholder="Masukkan password baru" name="pwbaru" required autofocus>
                        </div>
                    </div>

                    <label for="konfirmasi">Konfirmasi Password</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" id="konfirmasi" class="form-control" placeholder="Masukkan sekali lagi password baru" name="pwkonf" required autofocus>
                        </div>
                    </div>

                    <a href="indexprofil.php" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                    <button class="btn bg-blue waves-effect align-center" type="submit" name="submit"><i class="material-icons">save</i><span>Simpan</span>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
