<?php
require '../../php/connect.php';

//add
if (isset($_POST['submitMenerima'])) {
    $idPenerima = $_POST['id-penerima'];
    $idProduk = $_POST['id-produk'];
    $query = "INSERT INTO menerima (id_penerima, id_produk) VALUES ('$idPenerima', '$idProduk')";
    $result = mysqli_query(connect(), $query);
}

//delete
if (isset($_POST['deleteMenerima'])) {
    $idPenerima = $_POST['id-penerima'];
    $idProduk = $_POST['id-produk'];
    $query = "DELETE FROM menerima WHERE id_penerima = '$idPenerima' AND id_produk = '$idProduk'";
    $result = mysqli_query(connect(), $query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webtracking</title>

    <link rel="stylesheet" href="../../css/main-style.css">
</head>

<body>
    <div class="add-form-popup" id="addFormPopup">
        <form action="" method="POST" class="form-container">
            <h1>Produk diterima penerima</h1>

            <label for="id-penerima"><b>id penerima</b></label>
            <select name="id-penerima" id="id-penerima">
                <?php
                $query = "SELECT * FROM penerima";
                $result = mysqli_query(connect(), $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_penerima'] . "'>" . $row['id_penerima'] . "</option>";
                }
                ?>
            </select>

            <label for="id-produk"><b>id produk</b></label>
            <select name="id-produk" id="id-produk">
                <?php
                $query = "SELECT * FROM produk";
                $result = mysqli_query(connect(), $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_produk'] . "'>" . $row['id_produk'] . "</option>";
                }
                ?>
            </select>
                <div class="action-button">
                    <button type="submit" class="btn" name="submitMenerima" id="submitButton">Tambah</button>
                    <button class="btn" id="closeAddButton" onclick="closeAddFormPopup()">Tutup</button>
                </div>
        </form>
    </div>

    <div class="wrapper">
        <aside>
            <div class="logo">
                <h2>Webtracking</h2>
            </div>
            <p id="status">Status Menerima</p>
            <a href="menerima.php">Menerima</a>
            <a href="../penerima.php">Penerima</a>
            <a href="../produk.php">Produk</a>
        </aside>
        <div class="content">
            <nav id="sidenav">
                <a href="../../index.php">Home</a>
                <a href="../produk.php">Produk</a>
                <a href="../pengirim.php">Pengirim</a>
                <a href="../penerima.php">Penerima</a>
                <a href="../kurir.php">Kurir</a>
            </nav>
            <main>
                <div class="main-content">
                    <h1>Data produk diterima</h1>
                    <div class="action-button">
                        <button class="open-button-add" id="open-button-add" onclick="displayAddFormPopup()">Tambah produk yang diterima</button>
                    </div>
                    <table>
                        <tr>
                            <th>ID penerima</th>
                            <th>ID produk</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM menerima";
                        $result = mysqli_query(connect(), $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_penerima'] . "</td>";
                            echo "<td>" . $row['id_produk'] . "</td>";
                            echo "<td>";
                            echo "<form action='' method='POST'>";
                            echo "<input type='hidden' name='id-penerima' value='" . $row['id_penerima'] . "'>";
                            echo "<input type='hidden' name='id-produk' value='" . $row['id_produk'] . "'>";
                            echo "<button type='submit' class='btn' name='deleteMenerima'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="../../js/main-script.js"></script>
</body>

</html>