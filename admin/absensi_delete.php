<?php
	require_once("../koneksi.php");
	$id_absen_harian = $_REQUEST['id_absen_harian'];

	mysqli_query($koneksi, "DELETE FROM absen_harian WHERE id_absen_harian='$id_absen_harian'") or die(mysqli_error());
?>

<?php 
	header("location:absensi_harian.php?pesan=hapus");
?>