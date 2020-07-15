<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
<div class="container">
		<h2>Proses Absensi Harian &raquo; Edit Data</h2> <hr>
		<?php 
			$id = $_GET['id_absen_harian'];
			$sql = mysqli_query($koneksi, "SELECT * FROM absen_harian WHERE id_absen_harian='$id'");
				if(mysqli_num_rows($sql) == 0){
					header("location: absensi_harian.php");
				}else{
					$row = mysqli_fetch_assoc($sql);
				}

			if(isset($_POST['save'])){
				$tgl_absensi 	= $_POST['tgl_absensi'];
				$nik 			= $_POST['nik'];
				$absensi 		= $_POST['absensi'];

				$update = mysqli_query($koneksi, "UPDATE absen_harian SET tgl_absensi='$tgl_absensi', nik='$nik', absensi='$absensi' WHERE id_absen_harian='$id'") or die ("Gagal Update");
					if($update){
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Diubah dan Disimpan!
						<a href="absensi_harian.php">KEMBALI</a>
					</div>
				<?php 
					}else{
					?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Diubah, Coba Lagi! 
					</div>
				<?php
				}
			}

			$now = date("Y-m-d");
		?>
		
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">
			<label class="col-sm-3" control-label>Tanggal Absen</label>
			<div class="col-sm-2">
				<input type="date" name="tgl_absensi" value="<?php echo $row['tgl_absensi'] ?>" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" control-label>NIK</label>
			<div class="col-sm-2">
				<select name="nik" class="form-control">
					<option value="">Pilih Pegawai</option>
					<?php 
						$myQry = mysqli_query($koneksi, "SELECT * FROM karyawan") or die ("Gagal Query Karyawan");
						while($list = mysqli_fetch_array($myQry)){
							if($row['nik'] == $list['nik']){
								$cek = "selected";
							}else{
								$cek = "";
							}echo "<option value='$list[nik]' $cek> $list[nik] - $list[nama] </option>";
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" control-label>Status</label>
			<div class="col-sm-2">
				<select name="absensi" class="form-control">
					<option value=""> - PILIH - </option>
					<option value="Masuk" <?php if($row['absensi'] == 'Masuk') echo "selected"; ?>>Masuk</option>
					<option value="Alpa" <?php if($row['absensi'] == 'Alpa') echo "selected"; ?>>Alpa</option>
					<option value="Izin" <?php if($row['absensi'] == 'Izin') echo "selected"; ?>>Izin</option>
					<option value="Sakit" <?php if($row['absensi'] == 'Sakit') echo "selected"; ?>>Sakit</option>
				</select>
			</div>
			<div class="col-sm-3">
				<b>Absen Sekarang : </b><span class="label label-info"><?php echo $row['absensi']; ?></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" control-label>&nbsp;</label>
			<div class="col-sm-6">
				<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
				<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
			</div>
		</div>
	</form>
</div>


<?php 
  require_once("footer-admin.php");
?>