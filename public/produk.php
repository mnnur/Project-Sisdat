<?php
require '../php/add.php';
require '../php/connect.php';

if(isset($_POST['submitProduk'])){
    $id = $_POST['id-produk'];
    $nama = $_POST['nama-produk'];
    $berat = $_POST['berat-produk'];
    $query = "INSERT INTO produk (id_produk, nama_produk, berat) VALUES ('$id', '$nama', '$berat')";
    $result = mysqli_query(connect(), $query);
    if($result){
        echo "Data berhasil ditambahkan";
    }else{
        echo "Data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mockup</title>
    
    <link rel="stylesheet" href="../css/main-style.css">
  </head>
  <body>
    <div class="wrapper">
        <aside  id="sidenav">
            <div class="logo">
                <h2>Mockup</h2>
            </div>
                <p id="status">Status Produk</p>
                <a class="active" href="#">Produk</a>
                <a href="#">Di Pengirim</a>
                <a href="#">Di Kurir</a>
                <a href="#">Dikirim</a>
                <a href="#">Diterima</a>
        </aside>
    <div class="content">
        <nav id="sidenav">
            <a href="../index.php">Home</a>
            <a class="active" href="produk.php">Produk</a>
            <a href="pengirim.php">Pengirim</a>
            <a href="penerima.php">Penerima</a>
            <a href="kurir.php">Kurir</a>
        </nav>
        <main>
            <div class="main-content">
            <h1>Data produk disini</h1>
                <button class="open-button" id="open-button">Tambah Produk</button>
                <div class="form-popup" id="formPopup" m>
                    <form action="" method="POST" class="form-container">
                    <h1>Tambah Produk</h1>

                    <label for="id-produk"><b>id produk</b></label>
                    <input type="text" placeholder="Enter id produk" name="id-produk" required>

                    <label for="nama-produk"><b>nama produk</b></label>
                    <input type="text" placeholder="nama produk" name="nama-produk" required>

                    <label for="berat-produk"><b>berat produk</b></label>
                    <input type="text" placeholder="berat produk" name="berat-produk" required>

                    <button type="submit" class="btn" name="submitProduk">Tambah</button>
                    </form>
                    </div>
                <?php
                    require_once '../php/connect.php';
                    displayInHTML()
                ?>
        </div>
        </main>
    </div>
    </div>
	<script src="../js/main-script.js"></script>
  </body>
</html>
