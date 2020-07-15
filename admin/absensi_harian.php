<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
<div class="container">
		<h2>Proses Absensi Harian</h2> <hr>
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

				if(isset($_GET['pesan'])){
					if($_GET['pesan']=="edit"){
						?>
							<script src="../js/sweetalert.min.js"></script>
							<script type="text/javascript">
								function alert1(){
									swal("Data Berhasil Diubah!", "Klik OK!", "info");
								} alert1();
							</script>
						<?php 
					}
				}
			$pageSql = "SELECT absen_harian.*, karyawan.nama FROM absen_harian LEFT JOIN karyawan ON karyawan.nik=absen_harian.nik";
			if(isset($_POST['qcari'])){
				$qcari = $_POST['qcari'];
				$pageSql = "SELECT absen_harian.nik, absen_harian.tgl_absensi, absen_harian.absensi, karyawan.nama FROM absen_harian LEFT JOIN karyawan ON karyawan.nik = absen_harian.nik WHERE tgl_absensi LIKE'%$qcari%' OR absen_harian.nik LIKE '$qcari' OR absensi LIKE '%$qcari%' ";
			}
		?>
	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="absenhari_add.php"> Tambah Data</a>
	<div class="form-group">
		<div class="left">
			<form class="form-inline" method="GET">
				<select name="filter" class="form-control" onchange="form.submit()">
					<?php 
						$filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
						<option value="0">
							<?php if($filter == 'Masuk'){echo 'selected';} ?>
						Semua</option>
						<option value="Alpa">
							<?php if($filter == 'Alpa'){echo 'selected';} ?>
						Alfa</option>
						<option value="Izin">
							<?php if($filter == 'Izin'){echo 'selected';} ?>
						Izin</option>
						<option value="Sakit">
							<?php if($filter == 'Sakit'){echo 'selected';} ?>
						Sakit</option>
					?>
				</select>
			</form>
		</div>
		<div class="right">
			<form class="" method="POST" action="absensi_harian.php">
				<input type="text" class="form-control" name="qcari" placeholder="Cari..." autofocus>
			</form>
		</div>
		<br><br>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<tr>
					<th>No</th>
					<th>Tanggal Absensi</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Absensi</th>
					<th>Tools</th>
				</tr>
				<?php 
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT absen_harian.*, karyawan.nama FROM absen_harian INNER JOIN karyawan ON karyawan.nik=absen_harian.nik WHERE absensi='$filter' ORDER BY tgl_absensi ASC");
					}else{
						$sql = mysqli_query($koneksi, $pageSql. " ORDER BY tgl_absensi ASC");
					}
					if(mysqli_num_rows($sql)==0){
						?>
							<tr><td colspan="8">Data Tidak Ada.</td></tr>
					<?php
					}else{
						$no = 1;
						while($row = mysqli_fetch_assoc($sql)){
					?>		
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo indonesiaTgl($row['tgl_absensi']); ?></td>
								<td><?php echo $row['nik']; ?></td>
								<td><a href="karyawan_detail.php?nik=<?php echo $row['nik']; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama']; ?></a></td>
								<td><?php echo $row['absensi']; ?></td>
								<td>
									<a href="absenhari_edit.php?id_absen_harian=<?php echo $row['id_absen_harian']; ?>" title="EDIT DATA" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

									<a href="absensi_delete.php?id_absen_harian=<?php echo $row['id_absen_harian']; ?>" title="HAPUS DATA" onclick="return confirm('Anda yakin akan menghapus data <?php echo $row['tgl_absensi']; ?>?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
							</tr>
					<?php
						}
					}
				?>
			</table>
		</div>
	</div>
</div>


<?php 
  require_once("footer-admin.php");
?>