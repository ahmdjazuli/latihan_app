<?php require('header.php'); ?>
	<div class="container">
		<?php 
			if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				?>
					<script src="js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Woooyyyy! Jan Ngegas!", "Username atau Password Anda Tidak Sesuai!", "info");
						} alert1();
					</script>
				<?php 
			}
		}
		?>
		<div class="content">
			<h2>Praktikum Pemrograman Web 1 2 3 4 5 6 7 <b style="font-size: 50px">8</b></h2><hr>
			<div class="text-center">
			<img src="img/thumb56.jpg" width="60%">
			</div>
		</div>
	</div>
<?php require('footer.php'); ?>