<?php
$judul = $_GET["program"];
$program = query ("SELECT * FROM infoprogram WHERE program='$judul'");
?>
<div class="block-header">
	<h2 style="font-size: 28px;">Program</h2>
</div>
<ol class="breadcrumb">
	<li><a href="indexproduksi.php">Produksi</a></li>
	<li><a href="indexproduksi.php">Program</a></li>
	<li class="active">Info Program</li>
</ol>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <b><h4><?= $judul;?>
                <?php if ($_SESSION['divisi'] == 'produksi') { ?>
                <a href="indexproduksi.php?produksi=tambahepisode&program=<?= $judul; ?>" class="btn btn-primary waves-effect right">
                        <i class="material-icons">add_to_queue</i> <span>  Tambah Episode</span></a><?php } ?>
                       
                    </h4></b>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Daftar Episode</th>
                                <th>Tema</th>
                                <th>Editor</th>
                                <th>Kreatif</th>
                                <th>Video</th>
                                <?php if ($_SESSION['divisi'] == 'produksi') { ?>
                                <th style="width: 95px;">Aksi</th><?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($program as $shows) :
                            ?>
                            <tr>
                                <td style="width: 5px;"><?= $i; ?>.</td>
                                <td>Episode <?= $shows["eps"]; ?></td>
                                <td><?= $shows["tema"]; ?></td>
                                <td><?= $shows["editor"]; ?></td>
                                <td><?= $shows["kreatif"]; ?></td>
                                <td><a href="indexproduksi.php?produksi=video&video=<?= $shows["video"]; ?>" class="btn bg-teal">Lihat Video</a></td>
                                <?php if ($_SESSION['divisi'] == 'produksi') { ?>
                                <td>
                                <a href="indexproduksi.php?produksi=editepisode&id=<?= $shows["id"] ?>" class="btn bg-teal">Edit</a>
                                <a href="indexproduksi.php?produksi=hapusinfo&id=<?= $shows["id"] ?>" class="btn bg-red" onclick="return confirm('Anda Yakin?');">Hapus</a>
                                </td><?php } ?>
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
