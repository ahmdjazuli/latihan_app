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
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..! 
		</div>
	<?php 
		}else {
			$row = mysqli_fetch_assoc($sql);
		}
			// Proses Simpan Data
			if(isset($_POST['save'])){
				$nik 			= $_POST['nik'];
				$nama 			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat_lahir'];
				$tanggal_lahir 	= $_POST['tanggal_lahir'];
				$alamat 		= $_POST['alamat'];
				$no_telepon		= $_POST['no_telepon'];
				$jabatan 		= $_POST['jabatan'];
				$status 		= $_POST['status'];

				$update = mysqli_query($koneksi, "UPDATE karyawan SET nama = '$nama', tempat_lahir = '$tempat_lahir',  tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_telepon ='$no_telepon', jabatan = '$jabatan', status = '$status' WHERE nik = '$nik'");
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
		<h2>Data Karyawan &raquo; Edit Data</h2> <hr>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">NIK</label>
				<div class="col-sm-2">
					<input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" placeholder="NIK" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $row['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tempat Lahir</label>
				<div class="col-sm-4">
					<input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Lahir</label>
				<div class="col-sm-4">
					<input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" class="input-group form-control" value="" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-3">
					<textarea name="alamat" class="form-control" placeholder="Alamat"> <?php echo $row['alamat']; ?>  </textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">No Telepon</label>
				<div class="col-sm-3">
					<input type="text" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" class="form-control" placeholder="No Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jabatan</label>
				<div class="col-sm-2">
					<select name="jabatan" class="form-control" required>
						<option value=""> - Jabatan Terbaru - </option>
						<option value="Operator">Operator</option>
						<option value="Leader">Leader</option>
						<option value="Supervisor">Supervisor</option>
						<option value="Manager">Manager</option>
					</select>
				</div>
				<div class="col-sm-3">
					<b>Jabatan Sekarang :</b> <span class="label label-success"><?php echo $row['jabatan']; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Status</label>
				<div class="col-sm-2">
					<select name="status" class="form-control" required>
						<option value="">- Status Terbaru -</option>
						<option value="Outsourcing">Outsourcing</option>
						<option value="Kontrak">Kontrak</option>
						<option value="Tetap">Tetap</option>
					</select>
				</div>
				<div class="col-sm-3">
					<b>Status Sekarang :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
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