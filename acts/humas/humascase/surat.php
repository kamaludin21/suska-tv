<?php
$surat = query ("SELECT * FROM surat");
?>
<div class="block-header">
    <h2 style="font-size: 28px;">Kelola Surat</h2>
</div>
<ol class="breadcrumb">
    <li><a href="javascript:void(0);">Humas & Administrasi</a></li>
    <li class="active">Kelola Surat</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4>Daftar Surat
                    <?php if ($_SESSION['divisi'] == 'humas') { ?>
                    <div class="right">
                        <a href="indexhumas.php?humas=tambahsurat" class="btn bg-blue waves-effect"><i class="material-icons">add</i> <span>  Tambah</span></a>
                    </div>
                    <?php }?>
                </h4></b>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pengaju</th>
                                    <th>Nomor HP</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Tempat Acara</th>
                                    <th>Keterangan</th>
                                    <?php if ($_SESSION['divisi'] == 'humas') { ?>
                                    <th style="width: 100px;">Aksi</th><?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($surat as $shows ) :
                                ?>
                                <tr>
                                    <td style="width: 5px;"><?= $i; ?>.</td>
                                    <td><?= $shows["nama"]; ?></td>
                                    <td><?= $shows["nohp"]; ?></td>
                                    <td><?= $shows["kegiatan"]; ?></td>
                                    <td><?= indonesian_date($shows["tgl"], true); ?></td>
                                    <td><?= $shows["tempat"]; ?></td>
                                    <td><?= $shows["ket"]; ?></td>
                                    <?php if ($_SESSION['divisi'] == 'humas') { ?>
                                    <td>
                                        <a href="indexhumas.php?humas=editsurat&id=<?= $shows["id"]; ?>" class="btn bg-green">Edit</a>
                                        <a href="indexhumas.php?humas=hapussurat&id=<?= $shows["id"]; ?>" onclick="return confirm('Anda Yakin?');" class="btn bg-red">Hapus</a>
                                    </td><?php }?>
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
