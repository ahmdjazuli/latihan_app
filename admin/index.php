<?php 
  session_start(); 
  require_once('header-admin.php');
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
?>

<div class="container">
    <div class="jumbotron text-center">
      <img src="../img/ikeh.jpg" width="180px" style="border-radius: 100%"> <br>
      Halo, <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>. <h2>Selamat Datang kembali! Kangen kammuu :b</h2>
      <div class="row">
      <div class="col text-center">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus quod praesentium, animi dolore, error dicta nihil minus voluptate accusamus pariatur similique ratione? Soluta laborum fugit, minus quos cupiditate officia nesciunt.
        <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aliquid sunt culpa, sed in commodi aliquam dicta consectetur impedit libero id neque ipsa. Error minima, eius quidem aliquam maiores labore!
      </div>
    </div>
    </div>
  </div>

<?php 
  require_once("footer-admin.php");
?>