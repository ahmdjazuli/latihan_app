<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Laporan Data Karyawan</h2> <hr>
		<br>

		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>No Telepon</th>
					<th>Jabatan</th>
					<th>Status</th>
				</tr>
				<?php 
					$mysql = "SELECT * FROM karyawan";
					$myQry = mysqli_query($koneksi, $mysql) or die ("Query Salah : ".mysqli_error($koneksi));
					$no = 1;
					while($kolomData = mysqli_fetch_array($myQry)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['nik'] ?></td>
					<td><?php echo $kolomData['nama'] ?></td>
					<td><?php echo $kolomData['tempat_lahir'] ?></td>
					<td><?php $tgl = $kolomData['tanggal_lahir']; echo date('D, d F Y',strtotime($tgl)); ?></td>
					<td><?php echo $kolomData['no_telepon'] ?></td>
					<td><?php echo $kolomData['jabatan'] ?></td>
					<td><?php echo $kolomData['status'] ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<img src="../img/btn_print.png" id="cetak" width="25">
	</div>
	<script src="../js/karyawan_cetak.js"></script>
<?php require('footer-admin.php'); ?>