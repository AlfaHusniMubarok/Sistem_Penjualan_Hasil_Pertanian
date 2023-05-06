<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");

		if(isset($_POST['edit'])){
            $id_penjualan = $_GET['id_penjualan'];
			$nama_admin= $_POST['nama_admin'];
			$nama_konsumen= $_POST['nama_konsumen'];
			$nama_barang= $_POST['nama_barang'];
			$berat= $_POST['berat'];
            $penghasilan= $_POST['penghasilan'];			
			$result = mysqli_query($mysqli, "UPDATE penjualan SET nama_admin='$nama_admin', nama_konsumen='$nama_konsumen', nama_barang='$nama_barang', berat='$berat', penghasilan='$penghasilan' WHERE id_penjualan='$id_penjualan'") or die(mysqli_error($mysqli));
			header("Location: penjualan.php");
		}

?>
<?php
if(isset($_GET['id_penjualan'])){
$id_penjualan = $_GET['id_penjualan'];
$result = mysqli_query($mysqli, "SELECT * FROM penjualan WHERE id_penjualan='$id_penjualan'") or die(mysqli_error($mysqli));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($result) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$user_data = mysqli_fetch_assoc($result);
			}
		}
?>
<html>
<head>    
    <title>Ubah Data Penjulan</title>
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
    height: 550px;
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
      <li><a href="penjualan.php">Penjualan</a></li>
      <li><a href="editpenjualan.php">Ubah Data Penjualan</a></li>
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
        <h3>UBAH PENJUALAN</h3>
        <div class="underline-title"></div>
      </div>
      <form method="post" action="" class="form">
        <label for="user-nama_admin" style="padding-top:13px">
            Nama Admin :
          </label>
        <input id="user-nama_admin" class="form-content" type="text" name="nama_admin" value="<?php echo $user_data['nama_admin']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-nama_konsumen" style="padding-top:13px">
            Nama Konsumen :
          </label>
        <input id="user-nama_konsumen" class="form-content" type="text" name="nama_konsumen" value="<?php echo $user_data['nama_konsumen']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-nama_barang" style="padding-top:22px">Hasil Pertanian :
          </label>
        <input id="user-nama_barang" class="form-content" type="text" name="nama_barang" value="<?php echo $user_data['nama_barang']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-berat" style="padding-top:22px">Jumlah :
          </label>
        <input id="user-berat" class="form-content" type="int" name="berat" value="<?php echo $user_data['berat']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-penghasilan" style="padding-top:22px">Penghasilan :
          </label>
        <input id="user-penghasilan" class="form-content" type="int" name="penghasilan" value="<?php echo $user_data['penghasilan']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="edit" value="SIMPAN" />
      </form>
    </div>
  </div>
</body>
</html>