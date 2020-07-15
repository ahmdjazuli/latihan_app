<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Laporan Data Produk</h2> <hr>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jenis</th>
					<th>Tipe</th>
					<th>Warna</th>
					<th>Stok</th>
					<th>Photo</th>
					<th>Diskripsi</th>
				</tr>
				<?php 
					$mysql = "SELECT * FROM produk";
					$myQry = mysqli_query($koneksi, $mysql) or die ("Query Salah : ".mysqli_error($koneksi));
					$no = 1;
					while($kolomData = mysqli_fetch_array($myQry)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['nama_produk'] ?></td>
					<td><?php echo $kolomData['jenis_produk']; ?></td>
					<td><?php echo $kolomData['type'] ?></td>
					<td><?php echo $kolomData['warna'] ?></td>
					<td><?php echo $kolomData['stok'] ?></td>
					<td><img style="height: 110px;width: 110px;" src="<?php echo "../img/".$kolomData['photo']; ?>"></td>
					<td><?php echo $kolomData['diskripsi'] ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	<img src="../img/btn_print.png" id="cetak" width="25">
	</div>
	<script src="../js/produk_cetak.js"></script>
<?php require('footer-admin.php'); ?>