<?php 
    require('header-admin.php'); 
    require('../koneksi.php');
    $idG = $_GET['idG'];
    $sql = mysqli_query($koneksi, "SELECT * FROM gudang WHERE idG = '$idG'");
    $row = mysqli_fetch_array($sql);
?>
    <div class="container">
        <h2>Detail Distribusi &raquo; <?php echo $row['namaG'] ?></h2>
        <table class="table table-striped table-condensed">
            <tr>
                <th width="20%">Nama Gudang</th>
                <td width="2%">:</td>
                <td><?php echo $row['namaG'] ?></td>
            </tr>
            <tr>
                <th>Lokasi Gudang</th>
                <td>:</td>
                <td><?php echo $row['lokasiG'] ?></td>
            </tr>
            <tr>
                <th>Luas Gudang</th>
                <td>:</td>
                <td><?php echo $row['luasG'] ?> m<sup>2</sup> </td>
            </tr>
        </table><br>
        <h2>Pegawai yang terdistribusikan pada Gudang ini yaitu:</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th id="aksi1">Tools</th>
                </tr>
                <?php 
                    $mysql = "SELECT karyawan_gudang.id, karyawan_gudang.idG,karyawan.* FROM karyawan_gudang
                            LEFT JOIN karyawan ON karyawan_gudang.nik = karyawan.nik 
                            WHERE karyawan_gudang.idG = '$idG'";
                    $myQry = mysqli_query($koneksi, $mysql) or die ("Query Salah : ".mysqli_error($koneksi));
                    $no = 1;
                    while($kolomData = mysqli_fetch_array($myQry)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $kolomData['nik'] ?></td>
                    <td><?php echo $kolomData['nama'] ?></a></td>
                    <td><?php echo $kolomData['tempat_lahir'] ?></td>
                    <td><?php $tgl = $kolomData['tanggal_lahir']; echo date('D, d F Y',strtotime($tgl)); ?></td>
                    <td><?php echo $kolomData['no_telepon'] ?></td>
                    <td><?php echo $kolomData['jabatan'] ?></td>
                    <td><?php echo $kolomData['status'] ?></td>
                    <td id="aksi1">
                        <a href="distribusi_delete.php?id=<?php echo $kolomData['id']; ?>" title="Hapus Data" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <img src="../img/btn_print.png" id="cetak" width="25">
    </div>
    <script src="../js/distribusi_cetak.js"></script>
<?php require('footer-admin.php'); ?>