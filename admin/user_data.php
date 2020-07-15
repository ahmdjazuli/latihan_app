<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Data User</h2> <hr>
		<br>
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
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Lengkap</th>
					<th>Username</th>
					<th>Password</th>
					<th>Level</th>
					<th>Tools</th>
				</tr>
				<?php 
					$mysql = "SELECT * FROM user";
					$myQry = mysqli_query($koneksi, $mysql) or die ("Query Salah : ".mysqli_error($koneksi));
					$no = 1;
					while($kolomData = mysqli_fetch_array($myQry)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['nama'] ?></td>
					<td><?php echo $kolomData['username'] ?></td>
					<td><?php echo $kolomData['password'] ?></td>
					<td><?php echo $kolomData['level'] ?></td>
					<td>
						<a href="user_edit.php?id=<?php echo $kolomData['id']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="user_delete.php?id=<?php echo $kolomData['id'] ?>" title="Hapus Data" onclick="confirm('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true""></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php require('footer-admin.php'); ?>