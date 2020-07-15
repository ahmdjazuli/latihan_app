<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Data Karyawan</h2> <hr>
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
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="karyawan_add.php"> Tambah Data</a>
		</div>
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
					<th>Tools</th>
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
					<td><a href="karyawan_detail.php?nik=<?php echo $kolomData['nik'] ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $kolomData['nama'] ?></a></td>
					<td><?php echo $kolomData['tempat_lahir'] ?></td>
					<td><?php $tgl = $kolomData['tanggal_lahir']; echo date('D, d F Y',strtotime($tgl)); ?></td>
					<td><?php echo $kolomData['no_telepon'] ?></td>
					<td><?php echo $kolomData['jabatan'] ?></td>
					<td><?php echo $kolomData['status'] ?></td>
					<td>
						<a href="karyawan_edit.php?nik=<?php echo $kolomData['nik']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="karyawan_delete.php?nik=<?php echo $kolomData['nik'] ?>" title="Hapus Data" onclick="confirm('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true""></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php require('footer-admin.php'); ?>