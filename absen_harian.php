<?php 
	require('header.php'); 
	require('koneksi.php');
?>
<div class="container">
	<h2>Daftar Absensi Harian</h2> <hr>
    <table id="julikoding" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
				<th>Tanggal Absensi</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Absensi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            require('koneksi.php');
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT absen_harian.*, karyawan.nama FROM absen_harian LEFT JOIN karyawan ON karyawan.nik=absen_harian.nik ORDER BY tgl_absensi ASC");
            while($row = mysqli_fetch_array($query)){
              ?>
                <tr>
                	<td><?php echo $no++; ?></td>
					<td><?php echo indonesiaTgl($row['tgl_absensi']); ?></td>
					<td><?php echo $row['nik']; ?></td>
					<td><a href="karyawan_detail.php?nik=<?php echo $row['nik']; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $row['nama']; ?></a></td>
					<td><?php echo $row['absensi']; ?></td>
              <?php 
            }
          ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
				<th>Tanggal Absensi</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Absensi</th>
            </tr>
        </tfoot>
    </table>
</div>


<?php 
  require_once("footer.php");
?>