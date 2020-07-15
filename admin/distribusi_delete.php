<?php
	require_once("../koneksi.php");
	$id = $_REQUEST['id'];

	mysqli_query($koneksi, "DELETE FROM karyawan_gudang WHERE id='$id'") or die(mysqli_error());
?>

<?php 
	header("location:distribusi_data.php?pesan=hapus");
?>