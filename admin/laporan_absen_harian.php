<?php 
	require('header-admin.php'); 
	require('../koneksi.php');

	$tgl = $_GET['tanggal'];
	$masukSql = "SELECT absen_harian.*,karyawan.nama FROM absen_harian LEFT JOIN karyawan ON karyawan.nik = absen_harian.nik WHERE tgl_absensi='".$tgl."' ORDER BY absen_harian.nik ASC";
?>

<div class="container">
<body onload="window.print()">
	<h2>Laporan Absen Tanggal <?php echo indonesiaTgl($tgl); ?></h2><hr><br>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>No</th>
				<th>Nik</th>
				<th>Nama</th>
				<th>Absensi</th>
			</tr>
			<?php 
				$sql = mysqli_query($koneksi, $masukSql);
				$no = 1;
				while($row = mysqli_fetch_assoc($sql)){
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row['nik']; ?></td>
							<td><?php echo $row['nama']; ?></td>
							<td><?php echo $row['absensi']; ?></td>
						</tr>
					<?php 
				}
			?>
		</table>
	</div>
</body>
</div>

<?php 
  require_once("footer-admin.php");
?>