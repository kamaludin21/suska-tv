

<div class="block-header">
    <h2 style="font-size: 22px;">Hai <?= $_SESSION["nama"];?>,
    <?php
    date_default_timezone_set('Asia/Jakarta');
                  $jam=date("H:i");
                  $tanggal= mktime(date("m"),date("d"),date("Y"));
                  $jam=date("H:i:s");
                  $a = date ("H");
                  if (($a>=6) && ($a<=10)) {
                    echo "Selamat Pagi";
                } else if (($a>10) && ($a<=11)) {
                    echo "Selamat Siang";
                } else if (($a>11) && ($a<=17)) {
                    echo "Selamat Sore";
                } else {
                    echo " Selamat Malam";
                }
    ?></h2>
    <hr>
</div>
<?php if ($_SESSION['divisi'] == 'kru') { ?>
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Hai Pendatang Baru <small><?= $_SESSION["nama"];?>...</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            Untuk saat ini akun anda belum terdaftar di divisi manapun, silahkan hubungi admin untuk informasi lebih lanjut. Terima kasih.
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
<?php if ($_SESSION['divisi'] == 'admin' || $_SESSION['divisi'] == 'produksi' || $_SESSION['divisi'] == 'humas' ) { ?>
<?php
$id =  $_SESSION["nama"];
$tugas = query ("SELECT * FROM tugas WHERE nama LIKE '%$id%'");
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h4>Tugas Saya
                </h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>                                
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tugas as $shows) :
                            ?>
                            <tr>
                                <td style="width: 5px;"><?= $i; ?>.</td>
                                <td><?= $shows["nama"]; ?></td>                                
                                <td><?= indonesian_date($shows["tanggal"]); ?></td>
                                <td><?= $shows["ket"]; ?></td>
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
<?php } ?>    