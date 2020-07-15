<?php 
	require('../koneksi.php');
	require('../library.php');
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Praktikum Pemograman Web</title>
	<link rel="stylesheet" href="../css/site.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
    
    <nav class="navbar navbar-default navbar-inverse" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">JuliKoding</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MASTER DATA <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="karyawan_data.php">KARYAWAN DATA</a></li>
                <li><a href="user_data.php">USER DATA</a></li>
                <li><a href="produk_data.php">PRODUK DATA</a></li>
                <li><a href="pelanggan_data.php">PELANGGAN DATA</a></li>
                <li><a href="gudang_data.php">GUDANG DATA</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PROSES DATA <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="absensi_harian.php">ABSENSI KARYAWAN</a></li>
                <li><a href="distribusi_data.php">DISTRIBUSI KARYAWAN</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">LAPORAN <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="karyawan_cetak.php">KARYAWAN CETAK</a></li>
                <li><a href="absenhari_cetak.php">ABSEN CETAK</a></li>
                <li><a href="pelanggan_cetak.php">PELANGGAN CETAK</a></li>
                <li><a href="produk_cetak.php">PRODUK CETAK</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#daftar"><b>DAFTAR</b></a></li>
            <li><a href="../logout.php"><b>LOGOUT</b></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div id="daftar" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">DAFTAR AKUN BARU</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" placeholder="Password" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <select name="level" required class="form-control">
                  <option value=''>- PILIH -</option>
                  <option value='admin'>ADMIN</option>
                  <option value='karyawan'>KARYAWAN</option>
                </select>
              </div>
              <div class="text-right">
                <button class="btn btn-primary" type="submit" name="simpan">BUAT AKUN</button>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php
  if(isset($_POST['simpan']) ){
  $koneksi = mysqli_connect('localhost', 'root', '', 'uniska_latihan_app') or die ("Koneksi Gagal");

  $username = $_REQUEST['username'];
  $nama     = $_REQUEST['nama'];
  $level    = $_REQUEST['level'];
  $pass     = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

  $cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE username='$username'");

    if(mysqli_num_rows($cek=1)){
  ?>
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>USERNAME Sudah Ada..! 
    </div>

    <?php 
      }else {
        $tambah = "INSERT INTO user(nama,username,password,level) VALUES ('$nama','$username','$pass','$level')";
        $insert = mysqli_query($koneksi, $tambah);
          if($insert){
      ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>AKUN BARU BERHASIL DISIMPAN..! 
        </div>
      <?php 
        } else {
      ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, GAGAL DISIMPAN..! 
        </div>
      <?php 
        }
      }
  }
  mysqli_close($koneksi);
?>