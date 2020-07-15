<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Distribusi Karyawan</h2> <hr>
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
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="distribusi_karyawan.php"> Tambah Data</a>
		</div>
		<br>

		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Gudang</th>
					<th>Luas Gudang</th>
					<th>Jumlah Karyawan</th>
					<th>Tools</th>
				</tr>
				<?php 
					$myQry = mysqli_query($koneksi, "SELECT karyawan_gudang.*, gudang.namaG, gudang.lokasiG, gudang.luasG, count(karyawan_gudang.nik) AS jumlah_karyawan FROM karyawan_gudang LEFT JOIN gudang ON gudang.idG = karyawan_gudang.idG
										LEFT JOIN karyawan ON karyawan.nik = karyawan_gudang.nik
						GROUP BY gudang.idG ORDER BY jumlah_karyawan DESC");
					$no = 1;
					while($kolomData = mysqli_fetch_array($myQry)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['namaG'] ?></td>
					<td><?php echo $kolomData['luasG'] ?></td>
					<td><?php echo $kolomData['jumlah_karyawan'] ?></td>
					<td>
						<a href="distribusi_edit.php?idG=<?php echo $kolomData['idG']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="distribusi_delete.php?idG=<?php echo $kolomData['idG'] ?>" title="Hapus Data" onclick="confirm('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true""></span></a>
						<a href="distribusi_detail.php?idG=<?php echo $kolomData['idG']; ?>" title="Detail Data" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-play"></span></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php require('footer-admin.php'); ?>