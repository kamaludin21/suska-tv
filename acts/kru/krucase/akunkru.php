<?php
$idlogin = $_SESSION["id"];
$user = query ("SELECT * FROM user WHERE id!='$idlogin'");
?>
<!-- breadcrumb -->
<div class="block-header">
  <h2 style="font-size: 28px;">Data Kru</h2>
</div>
<ol class="breadcrumb">
  <li><a href="indexkru.php">Kru</a></li>
  <li class="active">Data Kru</li>
</ol>
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">
        <h4>Daftar Akun Kru</h4>
        <hr>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
              <tr>
                <th style="width:5px;">No.</th>
                <th>Nama Lengkap</th>
                <th>Posisi</th>
                <th>Status</th>
                <th style="width: 140px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($user as $users) :
              ?>
              <tr>
                <td><?= $i; ?>.</td>
                <td><?= $users["nama"]; ?></td>
                <td><?= $users["divisi"]; ?></td>
                <td><?= (($users["status"]== 'Y')?'Aktif' : 'Tidak Aktif'); ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Klik <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      
                      <li><a href="indexkru.php?kru=infokru&id=<?= $users["id"]; ?>"><i class="material-icons">account_circle</i>Lihat Profil</a></li>
                      <?php if ($_SESSION['divisi'] == 'admin') { ?>
                      <li><a href="indexkru.php?krucase=krucase&kru=editakunkru&id=
                      <?= $users["id"]; ?>"><i class="material-icons">edit</i>Edit</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="indexkru.php?krucase=krucase&kru=hapus&id=<?= $users["id"];?>" onclick="return confirm('Anda Yakin?');"><i class="material-icons">delete</i>Hapus</a></li>
                      <<?php } ?>
                    </ul>
                  </div>
                </td>
              </tr>
              <?php $i++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>