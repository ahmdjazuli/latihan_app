<?php 
	require('header.php'); 
	require('koneksi.php');
?>
<div class="container">
    <h2>Data Karyawan</h2><hr>
    <table id="julikoding" class="table table-striped table-bordered">
        <thead>
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
        </thead>
        <tbody>
          <?php 
            require('koneksi.php');
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM karyawan");
            while($data = mysqli_fetch_array($query)){
              ?>
                <tr>
                	<td><?= $no++; ?></td>
					<td><?php echo $data['nik'] ?></td>
					<td><?php echo $data['nama'] ?></td>
					<td><?php echo $data['tempat_lahir'] ?></td>
					<td><?php echo $data['tanggal_lahir'] ?></td>
					<td><?php echo $data['no_telepon'] ?></td>
					<td><?php echo $data['jabatan'] ?></td>
					<td><?php echo $data['status'] ?></td>
              <?php 
            }
          ?>
        </tbody>
        <tfoot>
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
        </tfoot>
    </table>
</div>
<?php require('footer.php'); ?>