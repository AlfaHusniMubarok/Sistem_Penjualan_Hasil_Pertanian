<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}

include "config.php";
if(isset($_POST["Registrasi"])){
$nama=$_POST['nama_admin'];
$no=$_POST['no'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$sql="INSERT INTO admin (nama_admin, no, username, password) VALUES
('$nama','$no','$username','$password')";	
$hasil=mysqli_query($mysqli,$sql);
echo "Sukses!!! Admin baru telah terdaftar.";
}

?>
<html>
<head>    
    <title>Admin - Registrasi</title>
    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" href="style.css" />
    <style>
.konten {
    float: center;
    width: 65%;
    padding: 5px;
}
    #card {
    background: #fbfbfb;
    border-radius: 8px;
    box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
    height: 510px;
    margin: 6rem auto 8.1rem auto;
    width: 329px;
}
#card-content {
    padding: 12px 44px;
}
#card-title {
    font-family: "Raleway Thin", sans-serif;
    letter-spacing: 4px;
    padding-bottom: 23px;
    padding-top: 13px;
    text-align: center;
}
#submit-btn {
    background: -webkit-linear-gradient(right, #a6f77b, #2dbd6e);
    border: none;
    border-radius: 21px;
    box-shadow: 0px 1px 8px #24c64f;
    cursor: pointer;
    color: white;
    font-family: "Raleway SemiBold", sans-serif;
    height: 42.3px;
    margin: 0 auto;
    margin-top: 50px;
    transition: 0.25s;
    width: 153px;
}
#submit-btn:hover {
    box-shadow: 0px 1px 18px #24c64f;
}
.form {
    align-items: left;
    display: flex;
    flex-direction: column;
}
.form-border {
    background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
    height: 1px;
    width: 100%;
}
.form-content {
    background: #fbfbfb;
    border: none;
    outline: none;
    padding-top: 14px;
}
.underline-title {
    background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
    height: 2px;
    margin: -1.1rem auto 0 auto;
    width: 228px;
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
      <li><a href="registrasi.php">Registrasi</a></li>
    </ul>
 </nav>
 <!-- akhir bagian menu -->

  
 <!-- bagian sidebar website -->
<aside class="sidebar">
    
 <div class="widget">
    <h2><a href="penjualan.php" id="judul">Penjualan</a></h2>
    <p>Halaman ini digunakan untuk melihat data penjualan.</p>
 </div>
 <div class="widget">
    <h2><a href="pembelian.php" id="judul">Pembelian</a></h2>
    <p>Halaman ini digunakan untuk melihat data penjualan.</p>
 </div>
 <div class="widget">
    <h2><a href="admin.php" id="judul">Admin</a></h2>
    <p>Halaman ini khusus untuk admin.</p>
 </div>

 </aside>
 <!-- akhir bagian sidebar website -->

 <div class="konten">
 <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h3>REGISTRASI ADMIN</h3>
        <div class="underline-title"></div>
      </div>
      <form method="post" action="" class="form">
        <label for="user-nama" style="padding-top:13px">
            &nbsp;Nama :
          </label>
        <input id="user-nama" class="form-content" type="text" name="nama" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-no" style="padding-top:13px">
            &nbsp;No. Hp :
          </label>
        <input id="user-no" class="form-content" type="text" name="no" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-username" style="padding-top:22px">&nbsp;Username :
          </label>
        <input id="user-username" class="form-content" type="text" name="username" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:22px">&nbsp;Password :
          </label>
        <input id="user-password" class="form-content" type="password" name="password" autocomplete="on" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="Registrasi" value="REGISTRASI" />
      </form>
    </div>
  </div>
</body>
</html>