<?php
$id = $_GET["id"];
$user = query ("SELECT * FROM user WHERE id='$id'");
?>
<div class="block-header">
<h2 style="font-size: 28px;">Data Kru</h2>
</div>
 <ol class="breadcrumb">
    <li><a href="indexkru.php">Kru</a></li>
    <li><a href="indexkru.php?kru=akunkru">Data Kru</a></li>
    <li class="active">Profil</li>
</ol>
<div class="row clearfix">
      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    <b>Foto Profil</b>
                </h4>
            </div>
            <div class="body">
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="#!" data-sub-html="Demo Description" >
                          <?php
                        foreach ($user as $users) :
                      ?>
                          <img class="img-responsive thumbnail" style="width: 184px;" src="../../images/profil/<?= $users["gambar"]; ?>">
                          <?php endforeach; ?>
                        </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
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
                </div>
            </div>
        </div>
    </div>

  </div>