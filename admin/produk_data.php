<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Data Produk</h2> <hr>
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="hapus"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Data Berhasil Terhapus!", "Klik OK!", "warning");
						} alert1();
					</script>
				<?php 
			}
		}
		?>
		<div class="form-group">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="produk_add.php"> Tambah Data</a>
		</div>
		<br>

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
					<th>Tools</th>
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
					<td>
						<a href="produk_edit.php?kode_produk=<?php echo $kolomData['kode_produk']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="produk_delete.php?kode_produk=<?php echo $kolomData['kode_produk'] ?>" title="Hapus Data" onclick="confirm('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true""></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php require('footer-admin.php'); ?>