<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
error_reporting(0);// mematikan semua error reporting
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM barang");
$konsumen = mysqli_query($mysqli, "SELECT * FROM konsumen");
$petani = mysqli_query($mysqli, "SELECT * FROM petani");
?>
<html>
<head>
    <title>SPHP - Admin</title>
    <link rel="stylesheet" href="desain.css" />
    <link rel="shortcut icon" href="icon.png">
    <style>
        h2 {
		  color: #301b7a;
		  font-size: 48px;
          font-family: sans-serif;
		  margin: auto;
		  mix-blend-mode: difference;
		  padding: 0 50px;
		  text-transform: uppercase;
		}
        #admin{
            text-decoration:none;
            color: #301b7a;
        }
    </style>
</head>
<body>
    <header> 
    <h1>Sistem Penjualan Hasil Pertanian</h1>
    <p class="deskripsi">Sistem dimana anda dapat menjual ataupun membeli hasil panen pertanian.</p>
 </header>
 <!-- akhir bagian header template -->
 
<div class="wrap">
 <!-- bagian menu -->
 <nav class="menu">
 <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="tambah.php">Tambah Pertanian</a></li>
      <li><a href="cetak.php">Cetak TK & TP</a></li>
      <li><a href="penjualan.php">Penjualan</a></li>
      <li><a href="pembelian.php">Pembelian</a></li>
      <li><a href="laporan.php">Laporan</a></li>
      <li><a href="registrasi.php">Registrasi</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
 </nav>
 <!-- akhir bagian menu -->
 
 <div class="blog">
 <h2><a href="admin.php" id="admin">Admin</a></h2> 
    <div class="conteudo">
    <center>
    <div class="post-info">
        <b>Tabel Hasil Pertanian</b>
    </div>
     <table class="table">

    <tr>
        <th>No.</th> <th>Nama Hasil Pertanian</th> <th>Stock</th> <th>Harga Jual</th> <th>Harga Beli</th> <th>Tindakan</th>
    </tr>
    <?php
    $no=0;
        while($user_data = mysqli_fetch_array($result)) {         
        $no++;
        echo "<tr>";
        echo "<td>".$no.".</td>";
        echo "<td>".$user_data['nama_barang']."</td>";
        echo "<td>".$user_data['stock']." Kg</td>"; 
        echo "<td>Rp. ".$user_data['harga_jual'].",-/Kg</td>";   
        echo "<td>Rp. ".$user_data['harga_beli'].",-/Kg</td>";
        echo "<td><a href='edit.php?id_barang=$user_data[id_barang]'>Ubah</a> | <a href='delete.php?id_barang=$user_data[id_barang]'>Hapus</a></td></tr>";
    }
    ?>
    </table><br></br>
    <div class="post-info">
        <b>Tabel Konsumen</b>
    </div>
         <table class="table1">

    <tr>
        <th>No.</th> <th>Nama Konsumen</th> <th>Alamat</th> <th>No HP</th> <th>Hasil Pertanian</th> <th>Berat</th> <th>Tindakan</th>
    </tr>
    <?php
    $no=0;
        while($user_data = mysqli_fetch_array($konsumen)) {         
        $no++;
        echo "<tr>";
        echo "<td>".$no.".</td>";
        echo "<td>".$user_data['nama_konsumen']."</td>";
        echo "<td>".$user_data['alamat']."</td>"; 
        echo "<td>".$user_data['nomor']."</td>";   
        echo "<td>".$user_data['nama_barang']."</td>";
        echo "<td>".$user_data['berat']." Kg</td>";
        echo "<td><a href='verifkonsumen.php?id_konsumen=$user_data[id_konsumen]'>Verifvikasi</a> | <a href='deletekonsumen.php?id_konsumen=$user_data[id_konsumen]'>Hapus</a></td></tr>";
    }
    ?>
    </table><br></br>
    <div class="post-info">
        <b>Tabel Petani</b>
    </div>
         <table class="table2">

    <tr>
        <th>No.</th> <th>Nama Petani</th> <th>Alamat</th> <th>No HP</th> <th>Hasil Pertanian</th> <th>Berat</th> <th>Tindakan</th>
    </tr>
    <?php
    $no=0;
        while($user_data = mysqli_fetch_array($petani)) {         
        $no++;
        echo "<tr>";
        echo "<td>".$no.".</td>";
        echo "<td>".$user_data['nama_petani']."</td>";
        echo "<td>".$user_data['alamat']."</td>"; 
        echo "<td>".$user_data['nomor']."</td>";   
        echo "<td>".$user_data['nama_barang']."</td>";
        echo "<td>".$user_data['berat']." Kg</td>";
        echo "<td><a href='verifpetani.php?id_petani=$user_data[id_petani]'>Verifvikasi</a> | <a href='deletepetani.php?id_petani=$user_data[id_petani]'>Hapus</a></td></tr>";
    }
    ?>
    </table><br></br>
    </center>
    </div>
    
</div>
</body>
</html>