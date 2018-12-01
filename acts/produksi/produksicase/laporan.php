<div class="block-header">
<h2 style="font-size: 28px;">Laporan</h2>
</div>
 <ol class="breadcrumb">
    <li><a href="javascript:void(0);">Produksi</a></li>
    <li class="active">Laporan</li>
</ol>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<b><h4>Laporan Program
				</h4></b>
				<hr>
				<form action="produksicase/cetak.php" method="POST">
				<label for="date">Dari Tanggal</label>
                <div class="form-group form-float">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-line">
                            <input type="date" name="dtanggal" id="date" required>
                        </div>
                    </div>
                </div>

				<label for="date">Sampai Tanggal</label>
                <div class="form-group form-float">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-line">
                            <input type="date" name="stanggal" id="date" required>
                        </div>
                    </div>
                </div>

                <button class="btn btn-lg bg-orange waves-effect " type="submit" name="kirim"><i class="material-icons">print</i> <span>  Cetak</span></button>
            </form>
			</div>
		</div>
	</div>
</div>
