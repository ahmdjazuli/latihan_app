<?php 
	require('header-admin.php');
	require('../koneksi.php'); 
?>
	<?php 
		if(isset($_POST['add'])){
			$nik 			= $_POST['nik'];
			$nama 			= $_POST['nama'];
			$tempat_lahir 	= $_POST['tempat_lahir'];
			$tanggal_lahir 	= $_POST['tanggal_lahir'];
			$alamat 		= $_POST['alamat'];
			$no_telepon		= $_POST['no_telepon'];
			$jabatan 		= $_POST['jabatan'];
			$status 		= $_POST['status'];

		$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");

		if(mysqli_num_rows($cek=1)){
	?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Sudah Ada..! 
		</div>

		<?php 
			}else {
				$insert = mysqli_query($koneksi, "INSERT INTO karyawan(nik, nama, tempat_lahir, tanggal_lahir, alamat, no_telepon, jabatan, status) VALUES('$nik','$nama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telepon','$jabatan','$status')") or die(mysqli_error($koneksi));

					if($insert){
			?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Disimpan..! 
				</div>
			<?php 
				} else {
			?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan gagal disimpan..! 
				</div>
			<?php 
				}
			}
		}
		?>
	<div class="container">
		<h2>Data Karyawan &raquo; Tambah Data</h2> <hr>
		<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">NIK</label>
				<div class="col-sm-2">
					<input type="text" name="nik" class="form-control" maxlength="10" placeholder="NIK" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" class="form-control" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tempat Lahir</label>
				<div class="col-sm-4">
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Lahir</label>
				<div class="col-sm-4">
					<input type="date" name="tanggal_lahir" class="input-group form-control" value="" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-3">
					<input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">No Telepon</label>
				<div class="col-sm-3">
					<input type="text" name="no_telepon" class="form-control" maxlength="12" placeholder="No Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jabatan</label>
				<div class="col-sm-2">
					<select name="jabatan" class="form-control" required>
						<option value=""> ---- </option>
						<option value="Operator">Operator</option>
						<option value="Leader">Leader</option>
						<option value="Supervisor">Supervisor</option>
						<option value="Manager">Manager</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Status</label>
				<div class="col-sm-2">
					<select name="status" class="form-control" required>
						<option value=""> ---- </option>
						<option value="Outsourcing">Outsourcing</option>
						<option value="Kontrak">Kontrak</option>
						<option value="Tetap">Tetap</option>
					</select>
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