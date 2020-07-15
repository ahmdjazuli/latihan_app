<?php
	require_once("../koneksi.php");
	$kode_pelanggan = $_REQUEST['kode_pelanggan'];

	$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE kode_pelanggan = '$kode_pelanggan'");
	$data = mysqli_fetch_array($query);
	$gambarny = $data['photo'];
	unlink("../img/".$gambarny);

	mysqli_query($koneksi, "DELETE FROM pelanggan WHERE kode_pelanggan='$kode_pelanggan'") or die(mysqli_error());
?>

<?php 
	header("location:pelanggan_data.php?pesan=hapus");
?>