
<?php
$program = query ("SELECT * FROM program");
?>
<div class="block-header">
	<h2 style="font-size: 28px;">Program</h2>
</div>
<ol class="breadcrumb">
	<li><a href="indexproduksi.php">Produksi</a></li>
	<li class="active">Program</li>
</ol>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<b><h4>Daftar Program 
					<?php if ($_SESSION['divisi'] == 'produksi') { ?>

					<a href="indexproduksi.php?produksi=tambahprogram" class="btn bg-blue waves-effect right"><i class="material-icons">add</i> <span>  Tambah</span></a>
					<?php } ?>
				</h4></b>
				<hr>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Program</th>
								<th>Produser</th>

								<th>Keterangan</th>
								
								<th style="width: 140px;">Aksi</th>
								

							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
                            foreach ($program as $shows) :
                            ?>
							<tr>
								<td style="width: 5px;"><?= $i; ?>.</td>
								<td><?= $shows["program"]; ?></td>
								<td><?= $shows["pj"]; ?></td>
								<td><?= $shows["ket"]; ?></td>

								<td>
								<div class="btn-group">
									<button type="button" class="btn bg-green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <span class="caret"></span>
									</button>

									<ul class="dropdown-menu">
										<li><a href="indexproduksi.php?produksi=tabelprogram&program=<?= $shows["program"]; ?>"><i class="material-icons">tv</i>Lihat Detail</a></li>
										<?php if ($_SESSION['divisi'] == 'produksi') { ?>
										<li><a href="indexproduksi.php?produksi=editprogram&id=<?= $shows["id"]; ?>"><i class="material-icons">edit</i>Edit</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="indexproduksi.php?produksi=hapusprogram&id=<?= $shows["id"]; ?>" onclick="return confirm('Anda Yakin?');"><i class="material-icons">delete</i>Hapus</a></li><?php }?>
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
