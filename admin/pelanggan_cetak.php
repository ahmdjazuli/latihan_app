<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Laporan Data Pelanggan</h2> <hr>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>Tanggal Lahir</th>
					<th>Alamat</th>
					<th>Kecamatan</th>
					<th>Photo</th>
				</tr>
				<?php 
					$mysql = "SELECT * FROM pelanggan";
					$myQry = mysqli_query($koneksi, $mysql) or die ("Query Salah : ".mysqli_error($koneksi));
					$no = 1;
					while($kolomData = mysqli_fetch_array($myQry)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['nama_pelanggan'] ?></td>
					<td><?php $tgl = $kolomData['tanggal_lahir']; echo date('D, d F Y',strtotime($tgl)); ?></td>
					<td><?php echo $kolomData['alamat'] ?></td>
					<td><?php echo $kolomData['kecamatan'] ?></td>
					<td><img style="height: 110px;width: 110px;" src="<?php echo "../img/".$kolomData['photo']; ?>"></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<img src="../img/btn_print.png" id="cetak" width="25">
	</div>
	<script src="../js/pelanggan_cetak.js"></script>
<?php require('footer-admin.php'); ?>