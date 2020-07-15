<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<?php 
		$nik = $_GET['nik'];
		$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");

		if(mysqli_num_rows($sql)==0){
	?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nik Tidak Ada..! 
		</div>
	<?php 
		}else {
			$row = mysqli_fetch_assoc($sql);
		}
			// Proses Simpan Data
			if(isset($_POST['save'])){
				$idG   = $_POST['idG'];
				$nik   = $_POST['nik'];

				$simpan = mysqli_query($koneksi, "INSERT INTO karyawan_gudang(nik,idG) VALUES ('$nik','$idG')");
				if($simpan){
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
		<h2>Distribusi Gudang &raquo; Edit Data</h2> <hr>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">NIK</label>
				<div class="col-sm-4">
					<input type="text" name="nik" class="form-control" placeholder="nama Gudang" value="<?php echo $row['nik']; ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control"required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Pilih Gudang</label>
				<div class="col-sm-4">
					<select name="idG" class="form-control">
						<?php 
							$que = mysqli_query($koneksi, "SELECT * FROM gudang");
							while($gudang = mysqli_fetch_array($que)){
								echo "<option value='$gudang[idG]'>$gudang[namaG]</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp; </label>
				<div class="col-sm-6">
					<button type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">SIMPAN</button>
					<button class="btn btn-sm btn-danger" onclick="history.back()">KEMBALI</button>
				</div>
			</div>

		</form>
	</div>
<?php require('footer-admin.php'); ?>