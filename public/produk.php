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
            <a href="index.php">Home</a>
            <a class="active" href="produk.php">Produk</a>
            <a href="pengirim.php">Pengirim</a>
            <a href="penerima.php">Penerima</a>
            <a href="kurir.php">Kurir</a>
        </nav>
        <main>
            <div class="main-content">
            <h1>Data produk disini</h1>
                <div class="data-table">
                    <button>Tambah Produk</button>
                    <?php
                        require_once '../php/connect.php';
                        displayInHTML()
                    ?>
                </div>
        </div>
        </main>
    </div>
    </div>
	<script src="../js/main-script.js"></script>
  </body>
</html>
