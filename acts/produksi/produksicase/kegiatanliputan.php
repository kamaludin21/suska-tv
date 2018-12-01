<?php
$laporan = query ("SELECT * FROM kegliputan");
?>
<div class="block-header">
	<h2 style="font-size: 28px;">Kegiatan Liputan</h2>
</div>
<ol class="breadcrumb">
	<li><a href="javascript:void(0);">Produksi</a></li>
	<li class="active">Kegiatan Liputan</li>
</ol>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<b><h4>Daftar Kegiatan Liputan
					<?php if ($_SESSION['divisi'] == 'produksi') { ?>
					<div class="right">
						<a href="indexproduksi.php?produksi=tambahliputan" class="btn bg-blue waves-effect">
                        <i class="material-icons">add</i> <span>  Tambah</span></a>
                    </div><?php }?></h4></b>
				<hr>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
						<thead>
							
							<tr>
								<th>No.</th>
								<th>Nama Kegiatan</th>
								<th>Tanggal</th>
								<th>Reporter</th>
								<th>Kampers</th>
								<?php if ($_SESSION['divisi'] == 'produksi') { ?>
								<th style="width: 95px;">Aksi</th><?php }?>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
                            foreach ($laporan as $shows) :
                            ?>
							<tr>
								<td style="width: 5px;"><?= $i; ?>.</td>
								<td><?= $shows["acara"]; ?></td>
								<td><?= indonesian_date($shows["tanggal"], true); ?></td>
								<td><?= $shows["reporter"]; ?></td>
								<td><?= $shows["kamper"]; ?></td>
								<?php if ($_SESSION['divisi'] == 'produksi') { ?>
								<td>
									<a href="indexproduksi.php?produksi=ubahliputan&id=<?= $shows["id"];?>" class="btn bg-green">Edit</a>
									<a href="indexproduksi.php?produksi=hapusliputan&id=<?= $shows["id"];?>" onclick="return confirm('Anda Yakin?');" class="btn bg-red">Hapus</a>
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