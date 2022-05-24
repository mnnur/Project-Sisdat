<?php
require '../../php/connect.php';

//add
if (isset($_POST['submitMemiliki'])) {
    $idpengirim = $_POST['id-pengirim'];
    $idProduk = $_POST['id-produk'];
    $query = "INSERT INTO Memiliki (id_pengirim, id_produk) VALUES ('$idpengirim', '$idProduk')";
    $result = mysqli_query(connect(), $query);
}

//delete
if (isset($_POST['deleteMemiliki'])) {
    $idpengirim = $_POST['id-pengirim'];
    $idProduk = $_POST['id-produk'];
    $query = "DELETE FROM Memiliki WHERE id_pengirim = '$idpengirim' AND id_produk = '$idProduk'";
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
            <h1>Produk di pengirim</h1>

            <label for="id-pengirim"><b>id pengirim</b></label>
            <select name="id-pengirim" id="id-pengirim">
                <?php
                $query = "SELECT * FROM pengirim";
                $result = mysqli_query(connect(), $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_pengirim'] . "'>" . $row['id_pengirim'] . "</option>";
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
                    <button type="submit" class="open-button-add" name="submitMemiliki" id="submitButton">Tambah</button>
                    <button class="btn-delete" id="closeAddButton" onclick="closeAddFormPopup()">Tutup</button>
                </div>
        </form>
    </div>

    <div class="wrapper">
        <aside>
            <div class="logo">
                <h2>Webtracking</h2>
            </div>
            <p id="status">Status Memiliki</p>
            <a href="memiliki.php">Memiliki</a>
            <a href="../produk.php">Produk</a>
            <a href="../pengirim.php">Pengirim</a>
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
                    <h1>Data produk di pengirim</h1>
                    <div class="action-button">
                        <button class="open-button-add" id="open-button-add" onclick="displayAddFormPopup()">Tambah produk masih di pengirim</button>
                    </div>
                    <table>
                        <tr>
                            <th>ID pengirim</th>
                            <th>ID produk</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM memiliki";
                        $result = mysqli_query(connect(), $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_pengirim'] . "</td>";
                            echo "<td>" . $row['id_produk'] . "</td>";
                            echo "<td>";
                            echo "<form action='' method='POST'>";
                            echo "<input type='hidden' name='id-pengirim' value='" . $row['id_pengirim'] . "'>";
                            echo "<input type='hidden' name='id-produk' value='" . $row['id_produk'] . "'>";
                            echo "<button type='submit' class='btn-delete' name='deleteMemiliki'>Delete</button>";
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