<?php

$id = $_GET["id"];
$data = query ("SELECT * FROM tugas WHERE id=$id")[0];

if ( isset($_POST["submit"]) ) {

  if ( edittugas($_POST) > 0 ) {
    echo "
    <script>
            alert('Data berhasil diubah!');
            document.location.href= 'indexkru.php';
            </script>
            ";
  } else {
    echo "
    <script>
            alert('Data Gagal diubah!');
            document.location.href='indexkru.php';
            </script>
            ";
          }
  }
?>
<div class="block-header">
    <h2 style="font-size: 28px;">Tugas</h2>
</div>
<ol class="breadcrumb">
    <li><a href="indexkru.php">Kru</a></li>
    <li><a href="indexkru.php">Tugas</a></li>
    <li class="active">Edit Tugas</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Edit Tugas</h4></b><hr>
                <form action="" method="POST">
                    <label for="nama">Kru Yang Bertugas</label>
                    <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    <div class="form-group">
                        <div class="form-line">
                            <select class="form-control show-tick" name="nama">
                            <?php
                            $status = 'Y';
                            $divisi = $data["divisi"];
                            $nama = query("SELECT * FROM user WHERE status = '$status' AND divisi='$divisi'");
    
                            foreach ($nama as $v) {
                            ?>
                            <option value="<?php echo $v['nama']; ?>"

                                <?php echo (($data['nama'] == $v['nama']) ? 'selected' : ''); ?> >
                                <?php echo $v['nama']; ?>
                                    
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="divisi" value="<?= $data["divisi"]; ?>">

                    <label for="date">Jadwal Tugas</label>
                    <div class="form-group form-float">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-line">
                                    <input type="date" name="tanggal" id="date" value="<?= $data["tanggal"]; ?>" required>
                                </div>
                            </div>
                        </div>
                        <label for="keterangan">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keterangan" class="form-control" placeholder="Masukkan keterangan tugas" name="ket" value="<?= $data["ket"]; ?>" required>
                            </div>
                        </div>
                    </div>
                    <a href="indexkru.php" class="btn bg-red waves-effect"><i class="material-icons">cancel</i><span>Batal</span></a>
                    <button class="btn bg-blue waves-effect" type="submit" name="submit"><i class="material-icons">save</i><span>Simpan</span></button>
                </form>
            </div>
        </div>
    </div>
</div>