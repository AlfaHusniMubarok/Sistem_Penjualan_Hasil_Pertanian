<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
error_reporting(0);// mematikan semua error reporting
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM pembelian");
?>
<html>
<head>
    <title>Pembelian</title>
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
      <li><a href="admin.php">Admin</a></li>
      <li><a href="pembelian.php">Pembelian</a></li>
      <li><a href="cetakpembelian.php">Cetak</a></li>
      <li><a href="penjualan.php">Penjualan</a></li>
    </ul>
 </nav>
 <!-- akhir bagian menu -->

 <div class="blog">
 <h2><a href="admin.php" id="admin">Admin</a></h2> 
    <div class="conteudo">
    <center>
    <div class="post-info">
        <b>Tabel Hasil Pembelian</b>
    </div>
    <table class="table3">

<tr>
    <th>No.</th> <th>Nama Admin</th> <th>Nama Petani</th> <th>Hasil Pertanian</th> <th>Jumlah</th> <th>Pengeluaran</th> <th>Tindakan</th>
</tr>
<?php
$no=0;
    while($user_data = mysqli_fetch_array($result)) {         
    $no++;
    echo "<tr>";
    echo "<td>".$no.".</td>";
    echo "<td>".$user_data['nama_admin']."</td>";
    echo "<td>".$user_data['nama_petani']."</td>"; 
    echo "<td>".$user_data['nama_barang']."</td>";   
    echo "<td>".$user_data['berat']." Kg</td>";
    echo "<td>Rp. ".$user_data['pengeluaran'].",-</td>";
    echo "<td><a href='editpembelian.php?id_pembelian=$user_data[id_pembelian]'>Ubah</a> | <a href='deletepembelian.php?id_pembelian=$user_data[id_pembelian]'>Hapus</a></td></tr>";
}
?>
</table>
</center>
</div>
</body>
</html>