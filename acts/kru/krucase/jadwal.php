<?php
$tugas = query ("SELECT * FROM tugas");
?>
<div class="block-header">
    <h2 style="font-size: 28px;">Tugas</h2>
</div>
<ol class="breadcrumb">
    <li><a href="javascript:void(0);">Kru</a></li>
    <li class="active">Tugas</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h4>Daftar Tugas
                    <?php if ($_SESSION['divisi'] == 'admin') { ?>
                    <div class="right">
                        <div class="btn-group">
                            <a href="#" class="btn bg-blue waves-effect"><i class="material-icons">add</i> <span>  Tambah</span></a>
                            <button class="btn btn-lg bg-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span">Pilih Divisi    </span><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="indexkru.php?kru=produksi" class=" waves-effect waves-block">Divisi Produksi</a></li>                                
                                <li><a href="indexkru.php?kru=humas" class=" waves-effect waves-block">Divisi Humas</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="indexkru.php?kru=inputjadwal" class=" waves-effect waves-block">Admin</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <?php if ($_SESSION['divisi'] == 'admin') { ?>
                                <th style="width: 95px;">Aksi</th><?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tugas as $shows) :
                            ?>
                            <tr>
                                <td style="width: 5px;"><?= $i; ?>.</td>
                                <td><?= $shows["nama"]; ?></td>
                                <td><?= $shows["divisi"]; ?></td>
                                <td><?= indonesian_date($shows["tanggal"], true); ?></td>
                                <td><?= $shows["ket"]; ?></td>
                                <?php if ($_SESSION['divisi'] == 'admin') { ?>
                                <td>
                                    <a href="indexkru.php?kru=edittugas&id=<?= $shows["id"]; ?>" class="btn bg-green">Edit</a>
                                    <a href="indexkru.php?kru=hapust&id=<?= $shows["id"];?>" onclick="return confirm('Anda Yakin?');" class="btn bg-red">Hapus</a>
                                </td>
                                <?php } ?>
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