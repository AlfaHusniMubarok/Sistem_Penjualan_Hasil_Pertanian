<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");

		if(isset($_POST['edit'])){
            $id_pembelian = $_GET['id_pembelian'];
			$nama_admin= $_POST['nama_admin'];
			$nama_petani= $_POST['nama_petani'];
			$nama_barang= $_POST['nama_barang'];
			$berat= $_POST['berat'];
            $pengeluaran= $_POST['pengeluaran'];			
			$result = mysqli_query($mysqli, "UPDATE pembelian SET nama_admin='$nama_admin', nama_petani='$nama_petani', nama_barang='$nama_barang', berat='$berat', pengeluaran='$pengeluaran' WHERE id_pembelian='$id_pembelian'") or die(mysqli_error($mysqli));
			header("Location: pembelian.php");
		}

?>
<?php
if(isset($_GET['id_pembelian'])){
$id_pembelian = $_GET['id_pembelian'];
$result = mysqli_query($mysqli, "SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'") or die(mysqli_error($mysqli));
			
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
    <title>Ubah Data Pembelian</title>
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
      <li><a href="pembelian.php">Pembelian</a></li>
      <li><a href="editpembelian.php">Ubah Data Pembelian</a></li>
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
        <h3>UBAH PEMBELIAN</h3>
        <div class="underline-title"></div>
      </div>
      <form method="post" action="" class="form">
        <label for="user-nama_admin" style="padding-top:13px">
            Nama Admin :
          </label>
        <input id="user-nama_admin" class="form-content" type="text" name="nama_admin" value="<?php echo $user_data['nama_admin']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-nama_petani" style="padding-top:13px">
            Nama Petani :
          </label>
        <input id="user-nama_petani" class="form-content" type="text" name="nama_petani" value="<?php echo $user_data['nama_petani']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-nama_barang" style="padding-top:22px">Hasil Pertanian :
          </label>
        <input id="user-nama_barang" class="form-content" type="text" name="nama_barang" value="<?php echo $user_data['nama_barang']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-berat" style="padding-top:22px">Jumlah :
          </label>
        <input id="user-berat" class="form-content" type="int" name="berat" value="<?php echo $user_data['berat']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-pengeluaran" style="padding-top:22px">Pengeluaran :
          </label>
        <input id="user-pengeluaran" class="form-content" type="int" name="pengeluaran" value="<?php echo $user_data['pengeluaran']; ?>"  autocomplete="on" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="edit" value="SIMPAN" />
      </form>
    </div>
  </div>
</body>
</html>