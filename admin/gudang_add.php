<?php 
	require('header-admin.php');
	require('../koneksi.php'); 
?>
	<?php 
		if(isset($_POST['add'])){
			$namaG 			= $_POST['namaG'];
			$lokasiG 	= $_POST['lokasiG'];
			$luasG 	= $_POST['luasG'];
			$alamat 		= $_POST['alamat'];
			$no_telepon		= $_POST['no_telepon'];
			$jabatan 		= $_POST['jabatan'];
			$status 		= $_POST['status'];

		$cek = mysqli_query($koneksi, "SELECT * FROM gudang WHERE namaG='$namaG'");

		if(mysqli_num_rows($cek=1)){
	?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Gudang Sudah Ada..! 
		</div>

		<?php 
			}else {
				$insert = mysqli_query($koneksi, "INSERT INTO gudang(namaG, lokasiG, luasG) VALUES('$namaG','$lokasiG','$luasG')") or die(mysqli_error($koneksi));

					if($insert){
			?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Disimpan..! 
				</div>
			<?php 
				} else {
			?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gudang gagal disimpan..! 
				</div>
			<?php 
				}
			}
		}
		?>
	<div class="container">
		<h2>Data Gudang &raquo; Tambah Data</h2> <hr>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Gudang</label>
				<div class="col-sm-2">
					<input type="text" name="namaG" class="form-control" placeholder="Nama Gudang" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Lokasi</label>
				<div class="col-sm-4">
					<input type="text" name="lokasiG" class="form-control" placeholder="Lokasi" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Luas</label>
				<div class="col-sm-4">
					<input type="number" name="luasG" class="input-group form-control" value="" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp; </label>
				<div class="col-sm-6">
					<button type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">SIMPAN</button>
					<button type="reset" class="btn btn-sm btn-warning" value="Reset">RESET</button>
					<button class="btn btn-sm btn-danger" onclick="history.back()">KEMBALI</button>
				</div>
			</div>

		</form>
	</div>
<?php require('footer-admin.php'); ?>