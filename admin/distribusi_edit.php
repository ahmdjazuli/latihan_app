<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<?php 
		$idG = $_GET['idG'];
		$sql = mysqli_query($koneksi, "SELECT * FROM gudang WHERE idG='$idG'");

		if(mysqli_num_rows($sql)==0){
	?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>idG Tidak Ada..! 
		</div>
	<?php 
		}else {
			$row = mysqli_fetch_assoc($sql);
		}
			// Proses Simpan Data
			if(isset($_POST['save'])){
				$idG     = $_POST['idG'];
				$namaG   = $_POST['namaG'];
				$luasG   = $_POST['luasG'];

				$update = mysqli_query($koneksi, "UPDATE gudang SET namaG = '$namaG', lokasiG = '$lokasiG',  luasG = '$luasG' WHERE idG = '$idG'");
				if($update){
			?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Disimpan! 
				</div>
			<?php 
				}else{
				?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Disimpan, Coba Lagi! 
				</div>
			<?php
				}
			}
	?>
	<div class="container">
		<h2>Data Gudang &raquo; Edit Data</h2> <hr>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Gudang</label>
				<div class="col-sm-4">
					<input type="text" name="namaG" class="form-control" placeholder="nama Gudang" value="<?php echo $row['namaG']; ?>" required>
					<input type="hidden" name="idG" class="form-control" value="<?php echo $row['idG']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Luas</label>
				<div class="col-sm-4">
					<input type="number" name="luasG" value="<?php echo $row['luasG']; ?>" class="input-group form-control" value="" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp; </label>
				<div class="col-sm-6">
					<button type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">SIMPAN</button>
					<button type="reset" class="btn btn-sm btn-warning" value="Reset">RESET</button>
					<button class="btn btn-sm btn-danger" onclick="history.back()">KEMBALI</button>
				</div>
			</div>

		</form>
	</div>
<?php require('footer-admin.php'); ?>