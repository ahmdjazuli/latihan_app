<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<?php 
		$kode_pelanggan = $_GET['kode_pelanggan'];
		$sql = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE kode_pelanggan='$kode_pelanggan'");

		if(mysqli_num_rows($sql)==0){
	?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Pelanggan Tidak Ada..! 
		</div>
	<?php 
		}else {
			$row = mysqli_fetch_assoc($sql);
		}
			// Proses Simpan Data
			if(isset($_POST['save'])){
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
						$tambah = mysqli_query($koneksi,"UPDATE pelanggan SET photo = '$namafoto' WHERE kode_pelanggan='$kode_pelanggan'");
					} 
					else{
						echo 'UKURAN FILE TERLALU BESAR';
					}
				}else{
					
				}

				$update = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', alamat = '$alamat',  tanggal_lahir = '$tanggal_lahir', kecamatan = '$kecamatan' WHERE kode_pelanggan = '$kode_pelanggan'");

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
		<h2>Data Pelanggan &raquo; Edit Data</h2> <hr>
		<form class="form-horizontal" enctype="multipart/form-data" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama Pelanggan</label>
				<div class="col-sm-2">
					<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $row['nama_pelanggan']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Lahir</label>
				<div class="col-sm-4">
					<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-4">
					<textarea type="text" name="alamat"><?php echo $row['alamat']; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kecamatan</label>
				<div class="col-sm-4">
					<input type="text" name="kecamatan" value="<?php echo $row['kecamatan']; ?>" class="input-group form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Photo</label>
				<div class="col-sm-4">
					<div class="form-group">
			  			<?php 
			  				$kode_pelanggan = $_GET['kode_pelanggan'];
			  				if($row['photo']){
			  					echo "<img src='../img/$row[photo]' width='100px'/>";
			  					echo "<a href='pelanggan_edit.php?kode_pelanggan=$row[kode_pelanggan]&pict=ganti'>GANTI</a>";
			  				}else{
			  					echo "<input type='file' name='file'/>";
			  				}
			  			?>
			  		</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp; </label>
				<div class="col-sm-6">
					<button type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">SIMPAN</button>
					<button type="reset" class="btn btn-sm btn-warning" value="Reset">RESET</button>
					<button class="btn btn-sm btn-danger"><a href="pelanggan_data.php" style="color: white">Kembali</a></button>
				</div>
			</div>

		</form>
	</div>
<?php 

if(isset($_GET['pict'])){
	if($_GET['pict']=="ganti"){
		$gambarny = $row['photo'];
		unlink("../img/".$gambarny);
		$query = mysqli_query($koneksi, "UPDATE pelanggan SET photo='' WHERE kode_pelanggan='$kode_pelanggan'"); 
	?>
		<script type="text/javascript">
			window.location.href="pelanggan_edit.php?kode_pelanggan=<?php echo $row['kode_pelanggan'];?>";
		</script>
		<?php 
	}
}

require('footer-admin.php'); ?>