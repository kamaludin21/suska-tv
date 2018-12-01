<?php
$idlogin = $_SESSION["id"];
$user = query ("SELECT * FROM user WHERE id='$idlogin'");
?>
<div class="block-header">
<h2 style="font-size: 28px;">Profil saya</h2>
</div>
 <ol class="breadcrumb">
    <li><a href="indexprofil.php">Profil</a></li>
    <li class="active">Profil Saya</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    <b>Informasi Umum</b>
                </h4>
            </div>
            <div class="body">
                <div class="row clearfix" >
                    <table class="table">
                      <?php
                        foreach ($user as $users) :
                      ?>
                      <tr>
                        <td align="right">Nama : </td>
                        <td> <?= $users["nama"];?></td>
                      </tr>
                      <tr>
                        <td align="right">Username : </td>
                        <td> <?= $users["username"];?></td>
                      </tr>
                      <tr>
                        <td align="right">Email : </td>
                        <td> <?= $users["email"];?></td>
                      </tr>
                      <tr>
                        <td align="right">Nomor HP : </td>
                        <td> <?= $users["nohp"];?></td>
                      </tr>
                      <tr>
                        <td align="right">Jenis Kelamin : </td>
                        <td> <?= (($users ['jk'] == 'lk') ? 'Laki-laki' : 'Perempuan');?></td>
                      </tr>
                      <tr>
                        <td align="right">Tanggal Lahir : </td>
                        <td> <?= indonesian_date($users["tgl"], true);?></td>
                      </tr>
                    <?php endforeach; ?>
                    </table>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="indexprofil.php?profilcase=profilcase&task=edit">
                      <button type="button" class="btn btn-block btn-primary waves-effect align-center">
                      <i class="material-icons">mode_edit</i>
                      <span>Edit</span>
                    </button></a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    <b>Foto Profil</b>
                </h4>

            </div>
            <div class="body">
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="#!" data-sub-html="Demo Description">
                          <img class="img-responsive thumbnail" src="../../images/profil/<?= $data["gambar"]; ?>">
                        </a>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- isi -->
