<?php 
	require('koneksi.php');
	require('library.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Praktikum Pemograman Web 8.0</title>
	<link rel="stylesheet" href="css/site.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="DataTables/DataTables-1.10.21/css/dataTables.bootstrap.min.css">
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
            <li><a href="about.php">TENTANG AKU</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MASTER DATA <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="karyawan_data.php">KARYAWAN DATA</a></li>
                <li><a href="absen_harian.php">ABSENSI HARIAN</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">LAPORAN <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="karyawan_cetak.php">KARYAWAN CETAK</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#masuk"><b>LOGIN</b></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    <div class="container">
      <h1 class="text-center">
        Selamat Datang dan Selamat Tinggal
    </div>

    <div id="masuk" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="max-width: 500px">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">MASUK KE ISEKAI? Hayukkk</h3>
          </div>
          <div class="modal-body">
            <form action="cek_login.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" placeholder="Password" class="form-control" />
              </div>
              <div class="text-right">
                <button class="btn btn-success" type="submit">LOGIN</button>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->