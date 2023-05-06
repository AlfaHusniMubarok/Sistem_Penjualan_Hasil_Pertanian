<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
error_reporting(0);// mematikan semua error reporting
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM pembelian");
$sql = mysqli_query($mysqli, "SELECT * FROM penjualan");
$total1 = mysqli_query($mysqli, "SELECT SUM(pengeluaran) AS total1 FROM pembelian");
$total2 = mysqli_query($mysqli, "SELECT SUM(penghasilan) AS total2 FROM penjualan");
$total3 = mysqli_query($mysqli, "SELECT (SELECT SUM(penghasilan) AS total2 FROM penjualan)-(SELECT SUM(pengeluaran) AS total1 FROM pembelian) as total3");
?>
<html>
<head>    
    <title>Admin</title>
    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" href="desain.css" />
    <style>
        h2 {
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
 </nav>
 <!-- akhir bagian menu -->

 <div class="blog">
 <h2><a href="admin.php" id="admin">Admin</a></h2> 
    <div class="conteudo">
    <center>
    <div class="post-info">
        <b>Tabel Pembelian</b>
    </div>    
    <table class="table3">

<tr>
    <th>No.</th> <th>Nama Admin</th> <th>Nama Petani</th> <th>Hasil Pertanian</th> <th>Jumlah</th> <th>Pengeluaran</th>
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
    }
?>
</table>
<?php
while($user_data = mysqli_fetch_array($total1)) {         
    echo "<h4>Total Pengeluaran = Rp. ".$user_data['total1'].",-</h4><br></br>";
}
?>
<div class="post-info">
        <b>Tabel Penjualan</b>
    </div>    

    <table class="table3">

<tr>
    <th>No.</th> <th>Nama Admin</th> <th>Nama Konsumen</th> <th>Hasil Pertanian</th> <th>Jumlah</th> <th>Penghasilan</th>
</tr>
<?php
    while($user_data = mysqli_fetch_array($sql)) {         
    echo "<tr>";
    echo "<td>".$user_data['id_penjualan'].".</td>";
    echo "<td>".$user_data['nama_admin']."</td>";
    echo "<td>".$user_data['nama_konsumen']."</td>"; 
    echo "<td>".$user_data['nama_barang']."</td>";   
    echo "<td>".$user_data['berat']." Kg</td>";
    echo "<td>Rp. ".$user_data['penghasilan'].",-</td>";
}
?>
</table>
<?php
while($user_data = mysqli_fetch_array($total2)) {         
    echo "<h4>Total Pemasukan = Rp. ".$user_data['total2'].",-</h4><br></br>";
}
?>
</center>
<?php
while($user_data = mysqli_fetch_array($total3)) {         
    echo "<h1>Laba/Rugi = Rp. ".$user_data['total3'].",-</h1><br></br>";
}?>
</div>
<script>
		window.print();
	</script>
</body>
</html>