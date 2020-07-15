<?php
	require_once("../koneksi.php");
	$idG = $_REQUEST['idG'];

	mysqli_query($koneksi, "DELETE FROM gudang WHERE idG='$idG'") or die(mysqli_error());
?>

<?php 
	header("location:gudang.php?pesan=hapus");
?>