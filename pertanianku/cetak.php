<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");
$sql = mysqli_query($mysqli, "SELECT * FROM konsumen");
$result = mysqli_query($mysqli, "SELECT * FROM petani");
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
        <b>Tabel Konsumen</b>
    </div>    

<table class="table1">

<tr>
    <th>No.</th> <th>Nama Konsumen</th> <th>Alamat</th> <th>No HP</th> <th>Hasil Pertanian</th> <th>Berat</th>
</tr>
<?php
$no=0;
    while($user_data = mysqli_fetch_array($sql)) {         
    $no++;
    echo "<tr>";
    echo "<td>".$no.".</td>";
    echo "<td>".$user_data['nama_konsumen']."</td>";
    echo "<td>".$user_data['alamat']."</td>"; 
    echo "<td>".$user_data['nomor']."</td>";   
    echo "<td>".$user_data['nama_barang']."</td>";
    echo "<td>".$user_data['berat']." Kg</td>";
}
?>
</table><br></br>
<div class="post-info">
        <b>Tabel Petani</b>
    </div>    

    <table class="table2">

<tr>
    <th>No.</th> <th>Nama Petani</th> <th>Alamat</th> <th>No HP</th> <th>Hasil Pertanian</th> <th>Berat</th>
</tr>
<?php
$no=0;
    while($user_data = mysqli_fetch_array($result)) {         
    $no++;
    echo "<tr>";
    echo "<td>".$no.".</td>";
    echo "<td>".$user_data['nama_petani']."</td>";
    echo "<td>".$user_data['alamat']."</td>"; 
    echo "<td>".$user_data['nomor']."</td>";   
    echo "<td>".$user_data['nama_barang']."</td>";
    echo "<td>".$user_data['berat']." Kg</td>";
}
?>
</table>
</center>
</div>
    <script>
		window.print();
	</script>
</body>
</html>