<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
<div class="container">
		<h2>Cetak Absensi Data</h2> <hr>
		<form class="form-horizontal" method="get" action="laporan_absen_harian.php?tanggal=['tanggal']" target="_blank">
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Absen </label>
				<div class="col-sm-3">
					<input type="date" name="tanggal" class="form-control" value="<?php echo date("Y-m-d"); ?>" maxlength="10" required> 
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3" control-label>&nbsp;</label>
				<div class="col-sm-6">
					<input type="submit" class="btn btn-sm btn-primary" value="Proses">
					<button onclick="history.back();" class="btn btn-sm btn-danger">Batal</button>
				</div>
			</div>
		</form>
</div>


<?php 
  require_once("footer-admin.php");
?>