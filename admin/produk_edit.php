<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<?php 
		$kode_produk = $_GET['kode_produk'];
		$sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk='$kode_produk'");

		if(mysqli_num_rows($sql)==0){
	?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Produk Tidak Ada..! 
		</div>
	<?php 
		}else {
			$row = mysqli_fetch_assoc($sql);
		}
			// Proses Simpan Data
			if(isset($_POST['save'])){
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
						$tambah = mysqli_query($koneksi,"UPDATE produk SET photo = '$namafoto' WHERE kode_produk='$kode_produk'");
					} 
					else{
						echo 'UKURAN FILE TERLALU BESAR';
					}
				}else{
					
				}

				$update = mysqli_query($koneksi, "UPDATE produk SET nama_produk = '$nama_produk', jenis_produk = '$jenis_produk', warna = '$warna', stok = '$stok', diskripsi = '$diskripsi' WHERE kode_produk = '$kode_produk'");

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
		<h2>Data Produk &raquo; Edit Data</h2> <hr>
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Produk/</label>
				<div class="col-sm-2">
					<input type="text" name="nama_produk" class="form-control" value="<?php echo $row['nama_produk']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jenis</label>
				<div class="col-sm-4">
					<select name="jenis_produk" class="form-control" required>
						<option value="<?php echo $row['jenis_produk']; ?>"> <?php echo $row['jenis_produk']; ?> </option>
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
						<option value="<?php echo $row['type']; ?>"> <?php echo $row['type']; ?> </option>
						<option value="Baru">Baru</option>
						<option value="Bekas">Bekas</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Warna</label>
				<div class="col-sm-4">
					<input type="text" name="warna" value="<?php echo $row['warna']; ?>" class="input-group form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Stok</label>
				<div class="col-sm-4">
					<input type="number" name="stok" value="<?php echo $row['stok']; ?>" class="input-group form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Photo</label>
				<div class="col-sm-4">
					<div class="form-group">
			  			<?php 
			  				$kode_produk = $_GET['kode_produk'];
			  				if($row['photo']){
			  					echo "<img src='../img/$row[photo]' width='100px'/>";
			  					echo "<a href='produk_edit.php?kode_produk=$row[kode_produk]&pict=ganti'>GANTI</a>";
			  				}else{
			  					echo "<input type='file' name='file'/>";
			  				}
			  			?>
			  		</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Diskripsi</label>
				<div class="col-sm-4">
					<textarea name="diskripsi" class="form-control"><?php echo $row['diskripsi']; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp; </label>
				<div class="col-sm-6">
					<button type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">SIMPAN</button>
					<button type="reset" class="btn btn-sm btn-warning" value="Reset">RESET</button>
					<button class="btn btn-sm btn-danger"><a href="produk_data.php" style="color: white">Kembali</a></button>
				</div>
			</div>

		</form>
	</div>
<?php 

if(isset($_GET['pict'])){
	if($_GET['pict']=="ganti"){
		$gambarny = $row['photo'];
		unlink("../img/".$gambarny);
		$query = mysqli_query($koneksi, "UPDATE produk SET photo='' WHERE kode_produk='$kode_produk'"); 
	?>
		<script type="text/javascript">
			window.location.href="produk_edit.php?kode_produk=<?php echo $row['kode_produk'];?>";
		</script>
		<?php 
	}
}

require('footer-admin.php'); ?>