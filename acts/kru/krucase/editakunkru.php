<?php
$id = $_GET["id"];
$data = query ("SELECT * FROM user WHERE id=$id")[0];

if ( isset($_POST["submit"]) ) {

  if ( ubah($_POST) > 0 ) {
    echo "
    <script>
            alert('Data berhasil diubah!');
            document.location.href= 'indexkru.php?kru=akunkru';
            </script>
            ";
  } else {
    echo "
    <script>
            alert('Data Gagal diubah!');
            document.location.href='indexkru.php?kru=akunkru';
            </script>
            ";
          }
  }
?>
<div class="block-header">
<h2 style="font-size: 28px;">Data Kru</h2>
</div>
<ol class="breadcrumb">
    <li><a href="indexkru.php">Kru</a></li>
    <li><a href="indexkru.php?kru=akunkru">Data Kru</a></li>
    <li class="active">Edit Akun</li>
</ol>

<div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Edit Akun</h4></b><hr>
                <div class="row clearfix" >
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form action="" method="POST">
                      <input type="hidden" name="id" value="<?= $data["id"]; ?>" readonly>

                      <label for="nama">Nama Lengkap</label>
                      <div class="form-group">
                          <div class="form-line disabled">
                              <input type="text" id="nama" class="form-control" value="<?= $data["nama"]; ?>" name="nama" disabled="">
                          </div>
                      </div>

                      <label for="username">Username</label>
                      <div class="form-group">
                          <div class="form-line disabled">
                              <input type="text" id="username" class="form-control" value="<?= $data["username"]; ?>" name="username" disabled="">
                          </div>
                      </div>
                      
                      <label for="divisi">Posisi Akun</label>
                      <div class="form-group">
                        <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <div class="form-line">
                              <select class="form-control show-tick" id="divisi" name="divisi">
                              <option value="kru" <?= (($data['divisi'] == 'kru') ? 'selected' : ''); ?> >Kru</option>  
                              <option value="admin" <?= (($data['divisi'] == 'admin') ? 'selected' : ''); ?> >Admin</option>
                              <option value="produksi" <?= (($data['divisi'] == 'produksi') ? 'selected' : ''); ?> >Produksi</option>
                              <option value="humas" <?= (($data['divisi'] == 'humas') ? 'selected' : ''); ?> >Humas</option>
                              </select>
                            </div>
                          </div>
                          </div>
                      </div>
                      <label for="status">Status Akun</label>
                      <div class="form-group">
                        <div class="row clearfix">
                          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <div class="form-line">
                              <select class="form-control show-tick" id="status" name="status">
                              <option value="Y" <?= (($data['status'] == 'Y') ? 'selected' : ''); ?> >Aktif</option>
                                  <option value="N" <?= (($data['status'] == 'N') ? 'selected' : ''); ?> >Tidak Aktif</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      </div>

                      <input type="hidden" name="password" value="<?= $data["password"]; ?>" >
                      <input type="hidden" name="email" value="<?= $data["email"]; ?>" >
                      <input type="hidden" name="nohp" value="<?= $data["nohp"]; ?>" >
                      <input type="hidden" name="jk" value="<?= $data["jk"]; ?>" >
                      <input type="hidden" name="tgl" value="<?= $data["tgl"]; ?>" >
                      <input type="hidden" name="gambar" value="<?= $data["gambar"]; ?>" >


                      <a href="indexkru.php?kru=akunkru" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                      <button class="btn bg-blue waves-effect align-center" type="submit" name="submit"><i class="material-icons">save</i><span>Simpan</span></button>
                      </form>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
