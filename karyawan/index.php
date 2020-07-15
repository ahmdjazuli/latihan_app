<?php 
  session_start(); 
  require_once('header-karyawan.php');
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
?>

<div class="container">
    <div class="jumbotron text-center">
      <img src="../img/cinta.jpg" width="180px" style="border-radius: 100%"> <br><br>
      Halo, <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>. <h2>Sampai Jumpa :V</h2>
      <div class="row">
      <div class="col text-center">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus soluta inventore consectetur voluptates commodi, magnam repudiandae non amet ullam, illo expedita, voluptas aperiam alias consequuntur quibusdam iusto id possimus ea.<br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi aliquid deserunt quisquam distinctio laborum esse cumque quo deleniti. Odit delectus harum sequi voluptates, consequatur amet et voluptatum molestias eaque quam.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro at vero illo perferendis veniam, ad, ut consequatur necessitatibus debitis ipsam voluptatem velit non ipsum minus quasi, placeat? Officiis, eligendi hic.
      </div>
    </div>
    </div>
  </div>

<?php 
  require_once("footer-karyawan.php");
?>