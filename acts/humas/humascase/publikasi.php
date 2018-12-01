<?php
$publikasi = query ("SELECT * FROM publikasi");


if ( isset($_POST["submit"]) ) {

    if ( tambahpublikasi ($_POST) > 0 ) {
        echo "<script> alert('Data berhasil ditambah!');
        document.location.href= 'indexhumas.php';
        </script>";
    } else {
        echo "<script> alert('Data Gagal ditambah!');
        document.location.href='indexhumas.php';
        </script>";
    }
}

?>
<div class="block-header">
    <h2 style="font-size: 28px;">Daftar Publikasi</h2>
</div>
<ol class="breadcrumb">
    <li><a href="javascript:void(0);">Humas & Administrasi</a></li>
    <li class="active">Daftar Publikasi</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Daftar Publikasi
                    <?php if ($_SESSION['divisi'] == 'humas') { ?>
                    <div class="right">
                        <a href="indexhumas.php?humas=tambahpublikasi" class="btn btn-primary waves-effect"><i class="material-icons">add</i> <span>  Tambah</span></a>
                    </div><?php }?>
                    </h4></b>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Agenda</th>
                                    <th>Isu</th>
                                    <th>Tanggal</th>
                                    <th>Tempat</th>
                                    <th>Dokumen</th>
                                    <?php if ($_SESSION['divisi'] == 'humas') { ?>
                                    <th style="width: 100px;">Aksi</th><?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($publikasi as $shows) :
                                ?>
                                <tr>
                                    <td style="width: 5px;"><?= $i; ?>.</td>
                                    <td><?= $shows["agenda"]; ?></td>
                                    <td><?= $shows["isu"]; ?></td>
                                    <td><?= indonesian_date($shows["tgl"], true); ?></td>
                                    <td><?= $shows["tempat"]; ?></td>
                                    <td><a href="../../doc/<?= $shows["file"]; ?>" class="btn btn-primary waves-effect">
                        <i class="material-icons">file_download</i> <span> Dokumen</span></a></td>
                                    <?php if ($_SESSION['divisi'] == 'humas') { ?>
                                    <td>
                                        <a href="indexhumas.php?humas=editpublikasi&id=<?= $shows["id"]; ?>" class="btn bg-green">Edit</a>
                                        <a href="indexhumas.php?humas=hapuspublikasi&id=<?= $shows["id"]; ?>" onclick="return confirm('Anda Yakin?');" class="btn bg-red">Hapus</a>
                                    </td><?php }?>
                                </tr>
                                <?php
                                $i++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
