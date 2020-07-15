<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Data Pelanggan</h2> <hr>
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
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="pelanggan_add.php"> Tambah Data</a>
		</div>
		<br>

		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>Tanggal Lahir</th>
					<th>Alamat</th>
					<th>Kecamatan</th>
					<th>Photo</th>
					<th>Tools</th>
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
					<td>
						<a href="pelanggan_edit.php?kode_pelanggan=<?php echo $kolomData['kode_pelanggan']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="pelanggan_delete.php?kode_pelanggan=<?php echo $kolomData['kode_pelanggan'] ?>" title="Hapus Data" onclick="confirm('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true""></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php require('footer-admin.php'); ?>