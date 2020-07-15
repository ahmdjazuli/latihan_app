<?php
	require_once("../koneksi.php");
	$kode_produk = $_REQUEST['kode_produk'];

	$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
	$data = mysqli_fetch_array($query);
	$gambarny = $data['photo'];
	unlink("../img/".$gambarny);

	mysqli_query($koneksi, "DELETE FROM produk WHERE kode_produk='$kode_produk'") or die(mysqli_error());
?>

<?php 
	header("location:produk_data.php?pesan=hapus");
?>