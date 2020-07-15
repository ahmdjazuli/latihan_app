<?php 
	require('header-admin.php');
	require('../koneksi.php'); 
?>
	<?php 
		if(isset($_POST['add'])){
			$nama_pelanggan 	= $_POST['nama_pelanggan'];
			$tanggal_lahir 		= $_POST['tanggal_lahir'];
			$alamat 			= $_POST['alamat'];
			$kecamatan 			= $_POST['kecamatan'];

			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$namafoto = $_FILES['file']['name'];
			$x = explode('.', $namafoto);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../img/'.$namafoto);
					$query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan, alamat, tanggal_lahir, kecamatan,photo) VALUES('$nama_pelanggan','$alamat','$tanggal_lahir','$kecamatan','$namafoto')") or die(mysqli_error($koneksi));
					if($query){
						echo '<script>alert("Data berhasil Disimpan"); window.location="pelanggan_data.php";</script>';
					}else{
						echo '<script>alert("Data Gagal Disimpan"); window.location="pelanggan_add.php";</script>';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		?>
	<div class="container">
		<h2>Data Pelanggan &raquo; Tambah Data</h2> <hr>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Pelanggan</label>
				<div class="col-sm-4">
					<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Lahir</label>
				<div class="col-sm-4">
					<input type="date" name="tanggal_lahir" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-3">
					<textarea name="alamat" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kecamatan</label>
				<div class="col-sm-3">
					<input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Photo</label>
				<div class="col-sm-3">
					<input type="file" name="file" class="form-control" placeholder="No Telepon" required>
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