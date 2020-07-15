<?php 
	require('header-admin.php');
	require('../koneksi.php'); 
?>
	<?php 
		if(isset($_POST['add'])){
			$kode_produk 	= $_POST['kode_produk'];
			$nama_produk 	= $_POST['nama_produk'];
			$jenis_produk 	= $_POST['jenis_produk'];
			$type 			= $_POST['type'];
			$warna 			= $_POST['warna'];
			$stok			= $_POST['stok'];
			$diskripsi 		= $_POST['diskripsi'];

			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$namafoto = $_FILES['file']['name'];
			$x = explode('.', $namafoto);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../img/'.$namafoto);
					$query = mysqli_query($koneksi, "INSERT INTO produk(nama_produk, jenis_produk, type, warna, stok, diskripsi, photo) VALUES('$nama_produk','$jenis_produk','$type','$warna','$stok','$diskripsi','$namafoto')") or die(mysqli_error($koneksi));
					if($query){
						echo '<script>alert("Data berhasil Disimpan"); window.location="produk_data.php";</script>';
					}else{
						echo '<script>alert("Data Gagal Disimpan"); window.location="produk_add.php";</script>';
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
		<h2>Data Produk &raquo; Tambah Data</h2> <hr>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Produk</label>
				<div class="col-sm-4">
					<input type="text" name="nama_produk" class="form-control" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jenis</label>
				<div class="col-sm-4">
					<select name="jenis_produk" class="form-control" required>
						<option value=""> ---- </option>
						<option value="Fashion Pria">Fashion Pria</option>
						<option value="Fashion Wanita">Fashion Wanita</option>
						<option value="Elektronik">Elektronik</option>
						<option value="Aksesoris">Aksesoris</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tipe</label>
				<div class="col-sm-4">
					<select name="type" class="form-control" required>
						<option value=""> ---- </option>
						<option value="Baru">Baru</option>
						<option value="Bekas">Bekas</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">warna</label>
				<div class="col-sm-3">
					<input type="text" name="warna" class="form-control" placeholder="Warna">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Stok</label>
				<div class="col-sm-3">
					<input type="number" name="stok" class="form-control" placeholder="Stok" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Photo</label>
				<div class="col-sm-3">
					<input type="file" name="file" class="form-control" placeholder="No Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Diskripsi</label>
				<div class="col-sm-3">
					<textarea name="diskripsi" class="form-control"></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp; </label>
				<div class="col-sm-6">
					<button type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">SIMPAN</button>
					<button type="reset" class="btn btn-sm btn-warning" value="Reset">RESET</button>
					<button class="btn btn-sm btn-danger"><a href="produk_data.php" style="color:white">KEMBALI</a></button>
				</div>
			</div>

		</form>
	</div>
<?php require('footer-admin.php'); ?>