<?php
error_reporting(0);// mematikan semua error reporting
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM barang");
$cari = $_POST['Kata'];
if($cari !=''){
    $result = mysqli_query($mysqli, "SELECT * FROM barang WHERE id_barang LIKE'%".$cari."%' OR
    nama_barang LIKE'%".$cari."%' OR stock LIKE'%".$cari."%' OR harga_jual LIKE'%".$cari."%' OR
    harga_beli LIKE'%".$cari."%'");
} else{
    $result = mysqli_query($mysqli, "SELECT * FROM barang");
}
?>
<html>
<head>
    <title>SPHP - Sistem Penjualan Hasil Pertanian</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
max-width: 550px;
position: relative;
margin: auto;
padding: 20px;
}

/* The dots/bullets/indicators */
.dot {
height: 5px;
width: 5px;
margin: 0 2px;
background-color: #bbb;
border-radius: 50%;
display: inline-block;
transition: background-color 0.6s ease;
}

.active {
background-color: #717171;
}

/* Fading animation */
.fade {
-webkit-animation-name: fade;
-webkit-animation-duration: 1.5s;
animation-name: fade;
animation-duration: 1.5s;
}

@-webkit-keyframes fade {
from {opacity: .4}
to {opacity: 1}
}

@keyframes fade {
from {opacity: .4}
to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
.text {font-size: 11px}
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
    <li> <a href="index.php">Home</a></li>
    <li><a href="jual.php">Jual Hasil Pertanian</a></li>
    <li><a href="beli.php">Beli Hasil Pertanian</a></li>
     <li><a href="admin.php">Admin</a></li>
 </ul>
 </nav>
 <!-- akhir bagian menu -->
 
 <!-- bagian sidebar website -->
<aside class="sidebar">
    <form action="" method="post">
    <input type="text" name="Kata" placeholder="Cari hasil pertanian ...">
    <button type="submit" name="Cari">Cari!</button></form>
 <div class="widget">
    <h2><a href="jual.php" id="judul">Jual Hasil Pertanian</a></h2>
    <p>Halaman ini digunakan bagi anda yang ingin menjual hasil panen pertanian anda disini.</p>
 </div>
 <div class="widget">
    <h2><a href="beli.php" id="judul">Beli Hasil Pertanian</a></h2>
    <p>Halaman ini digunakan bagi anda yang ingin membeli hasil pertanian yang tersedia disini.</p>
 </div>
 <div class="widget">
    <h2><a href="admin.php" id="judul">Admin</a></h2>
    <p>Halaman ini khusus untuk admin.</p>
 </div>

 </aside>
 <!-- akhir bagian sidebar website -->
 
 <!-- bagian konten Blog -->
 <div class="blog">
 <div class="slideshow-container">

<div class="mySlides fade">
<img src="image/padi.jpeg" style="width:100%">
</div>

<div class="mySlides fade">
<img src="image/jagung.jpg" style="width:100%">
</div>

<div class="mySlides fade">
<img src="image/bawangmerah.png" style="width:100%">
</div>

<div class="mySlides fade">
<img src="image/bawangputih.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
var i;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
for (i = 0; i < slides.length; i++) {
slides[i].style.display = "none";
}
slideIndex++;
if (slideIndex > slides.length) {slideIndex = 1}
for (i = 0; i < dots.length; i++) {
dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";
dots[slideIndex-1].className += " active";
setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
    <div class="conteudo">
    <div class="post-info">
        <b>Daftar Hasil Pertanian</b>
    </div>
    <center>
     <table class="table">
    <tr>
        <th>No.</th> <th>Nama Hasil Pertanian</th> <th>Stock</th> <th>Harga Jual</th> <th>Harga Beli</th>
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
        echo "</tr>";
    }
    ?>
    </table>
    </center>

    <?php
    echo "<br>Note : </br>";
    echo "- Harga jual adalah Harga yang kami tawarkan untuk konsumen guna membeli hasil pertanian yang kami sediakan.<br>";
    echo "- Harga beli adalah Harga yang kami tawarkan untuk petani guna menjual hasil pertaniannya kepada kami.<br></br>";
    ?>
 </div>
 <!-- akhir bagian konten Blog -->
 </div>
 
</body>
</html>