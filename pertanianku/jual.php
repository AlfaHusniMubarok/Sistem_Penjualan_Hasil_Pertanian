<?php
include "config.php";
if (isset($_POST["Jual"])) {
  $nama_petani = $_POST['nama_petani'];
  $alamat = $_POST['alamat'];
  $nomor = $_POST['nomor'];
  $nama_barang = $_POST['nama_barang'];
  $berat = $_POST['berat'];
  $result = mysqli_query($mysqli, "INSERT INTO petani (nama_petani, alamat, nomor, nama_barang, berat) VALUES ('$nama_petani','$alamat', '$nomor','$nama_barang', '$berat')");
  // $hasil=mysqli_query($mysqli,$result);
  echo "Berhasil!!! Data penjualan hasil pertanian anda berhasil direkam. <a href=lihatjual.php id=data>Lihat Data</a>";
}

?>
<html>

<head>
  <title>Jual Hasil Pertanian</title>
  <link rel="shortcut icon" href="icon.png">
  <link rel="stylesheet" href="form.css" />
  <link rel="stylesheet" href="style.css" />
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

      <div class="widget">
        <h2><a href="jual.php" id="judul">Jual Hasil Pertanian</a></h2>
        <p>Halaman ini diperuntukkan bagi anda yang ingin menjual hasil panen pertanian anda disini.</p>
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


    <div class="konten">
      <div id="card">
        <div id="card-content">
          <div id="card-title">
            <h2>Jual Hasil Pertanian</h2>
            <div class="underline-title"></div>
          </div>
          <form method="post" class="form">
            <label for="user-nama_petani" style="padding-top:13px">
              &nbsp;Nama :
            </label>
            <input id="user-nama_petani" class="form-content" type="nama_petani" name="nama_petani" autocomplete="on" required />
            <div class="form-border"></div>
            <label for="user-alamat" style="padding-top:22px">
              &nbsp;Alamat :
            </label>
            <input id="user-alamat" class="form-content" type="alamat" name="alamat" autocomplete="on" required />
            <div class="form-border"></div>
            <label for="user-nomor" style="padding-top:22px">
              &nbsp;No. Hp :
            </label>
            <input id="user-nomor" class="form-content" type="nomor" name="nomor" autocomplete="on" required />
            <div class="form-border"></div>
            <label for="user-nama_barang" style="padding-top:22px">
              &nbsp;Hasil Pertanian :
            </label>
            <input id="user-nama_barang" class="form-content" type="nama_barang" name="nama_barang" autocomplete="on" required />
            <div class="form-border"></div>
            <label for="user-berat" style="padding-top:22px">
              &nbsp;Berat (Kg) :
            </label>
            <input id="user-berat" class="form-content" type="berat" name="berat" autocomplete="on" required />
            <div class="form-border"></div>

            <input id="submit-btn" type="submit" name="Jual" value="JUAL" />
          </form>
        </div>
      </div>
    </div>

  </div>
</body>

</html>