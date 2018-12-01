<?php
$jpro = query ("SELECT * FROM jadwalproduksi");
?>
<div class="block-header">
	<h2 style="font-size: 28px;">Jadwal Produksi</h2>
</div>
<ol class="breadcrumb">
	<li><a href="indexproduksi.php">Produksi</a></li>
	<li class="active">Jadwal Produksi</li>
</ol>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<b><h4>Daftar Jadwal Produksi
					<div class="right">
						<?php if ($_SESSION['divisi'] == 'produksi') { ?>
						<a href="indexproduksi.php?produksi=tambahjadwal" class="btn bg-blue waves-effect"><i class="material-icons">add</i> <span>  Tambah</span></a><?php }?>
					</div>
				</h4></b>
				<hr>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Program</th>
								<th>Kreatif</th>
								<th>Editor</th>
								<th>Tanggal Taping</th>
								<th>Keterangan</th>
								<?php if ($_SESSION['divisi'] == 'produksi') { ?>
								<th style="width: 95px;">Aksi</th><?php }?>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
                            foreach ($jpro as $shows) :
                            ?>
							<tr>
								<td style="width: 5px;"><?= $i; ?>.</td>
								<td><?= $shows["program"]; ?></td>
								<td><?= $shows["kreatif"]; ?></td>
								<td><?= $shows["editor"]; ?></td>
								<td><?= indonesian_date($shows["tglTap"], true); ?></td>
								<td><?= $shows["ket"]; ?></td>
								<?php if ($_SESSION['divisi'] == 'produksi') { ?>
								<td>
									<a href="indexproduksi.php?produksi=editjadwal&id=<?= $shows["id"]; ?>" class="btn bg-green">Edit</a>
									<a href="#" class="btn bg-red">Hapus</a>
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