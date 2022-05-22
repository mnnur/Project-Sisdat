<?php
require '../php/connect.php';

//add
if (isset($_POST['submitProduk'])) {
    $id = $_POST['id-produk'];
    $nama = $_POST['nama-produk'];
    $berat = $_POST['berat-produk'];
    $query = "INSERT INTO produk (id_produk, nama_produk, berat) VALUES ('$id', '$nama', '$berat')";
    $result = mysqli_query(connect(), $query);
}

//edit
if (isset($_POST['editProduk'])) {
    $id = $_POST['id-produk-edit'];
    $nama = $_POST['nama-produk-edit'];
    $berat = $_POST['berat-produk-edit'];
    $query = "UPDATE produk SET nama_produk = '$nama', berat = '$berat' WHERE id_produk = '$id'";
    $result = mysqli_query(connect(), $query);
}

//delete
if (isset($_POST['deleteProduk'])) {
    $id = $_POST['id-produk'];
    $foreignKeyCheck = "SELECT * FROM menerima WHERE id_produk = '$id'";
    $foreignKeyCheck2 = "SELECT * FROM mengirim WHERE id_produk = '$id'";
    $foreignKeyCheck3 = "SELECT * FROM memiliki WHERE id_produk = '$id'";
    $foreignKeyCheckResult = mysqli_query(connect(), $foreignKeyCheck);
    $foreignKeyCheckResult2 = mysqli_query(connect(), $foreignKeyCheck2);
    $foreignKeyCheckResult3 = mysqli_query(connect(), $foreignKeyCheck3);
    if (mysqli_num_rows($foreignKeyCheckResult) > 0 || mysqli_num_rows($foreignKeyCheckResult2) > 0 || mysqli_num_rows($foreignKeyCheckResult3) > 0) {
        echo "<script>alert('Data tidak bisa dihapus karena terdapat relasi dengan data lain');</script>";
    } else {
        $query = "DELETE FROM produk WHERE id_produk = '$id'";
        $result = mysqli_query(connect(), $query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webtracking</title>

    <link rel="stylesheet" href="../css/main-style.css">
</head>

<body>
    <div class="add-form-popup" id="addFormPopup">
        <form action="" method="POST" class="form-container">
            <h1>Tambah Produk</h1>

            <label for="id-produk"><b>id produk</b></label>
            <input type="text" placeholder="Enter id produk" name="id-produk" required>

            <label for="nama-produk"><b>nama produk</b></label>
            <input type="text" placeholder="nama produk" name="nama-produk" required>

            <label for="berat-produk"><b>berat produk</b></label>
            <input type="number" placeholder="berat produk" name="berat-produk" required>
            <div class="action-button">
                <button type="submit" class="btn" name="submitProduk" id="submitButton">Tambah</button>
                <button class="btn" id="closeAddButton" onclick="closeAddFormPopup()">Tutup</button>
            </div>
        </form>
    </div>

    <div class="edit-form-popup" id="editFormPopup">
        <form action="" method="POST" class="form-container">
            <h1>Edit Produk</h1>

            <label for="id-produk-edit"><b>id produk</b></label>
            <select name="id-produk-edit" id="id-produk-edit" required>
                <option value="">Pilih id produk</option>
                <?php
                $query = "SELECT * FROM produk";
                $result = mysqli_query(connect(), $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_produk'] . "'>" . $row['id_produk'] . "</option>";
                }
                ?>
            </select>

            <label for="nama-produk-edit"><b>nama produk</b></label>
            <input type="text" placeholder="nama produk" name="nama-produk-edit" required>

            <label for="berat-produk-edit"><b>berat produk</b></label>
            <input type="number" placeholder="berat produk" name="berat-produk-edit" required>

            <div class="action-button">
            <button type="submit" class="btn-edit" name="editProduk">Edit</button>
            <button type="button" class="btn-close-edit" id="close-button-edit" onclick="closeEditFormPopup()">Tutup</button>
            </div>
        </form>
    </div>

    <div class="wrapper">
        <aside>
            <div class="logo">
                <h2>Webtracking</h2>
            </div>
            <p id="status">Status Produk</p>
            <a href="produk.php">Produk</a>
            <a href="relasi/memiliki.php">Di Pengirim</a>
            <a href="relasi/menginfokan.php">Di Kurir</a>
            <a href="relasi/mengirim.php">Dikirim</a>
            <a href="relasi/menerima.php">Diterima</a>
        </aside>
        <div class="content">
            <nav id="sidenav">
                <a href="../index.php">Home</a>
                <a href="produk.php">Produk</a>
                <a href="pengirim.php">Pengirim</a>
                <a href="penerima.php">Penerima</a>
                <a href="kurir.php">Kurir</a>
            </nav>
            <main>
                <div class="main-content">
                    <h1>Data produk</h1>
                    <div class="action-button">
                        <button class="open-button-add" id="open-button-add" onclick="displayAddFormPopup()">Tambah Produk</button>
                        <button class="open-button-edit" id="open-button-edit" onclick="displayEditFormPopup()">Edit Produk</button>
                    </div>
                    <table>
                        <tr>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Berat Produk</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM produk";
                        $result = mysqli_query(connect(), $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_produk'] . "</td>";
                            echo "<td>" . $row['nama_produk'] . "</td>";
                            echo "<td>" . $row['berat'] . "</td>";
                            echo "<td>";
                            echo "<form action='' method='POST'>";
                            echo "<input type='hidden' name='id-produk' value='" . $row['id_produk'] . "'>";
                            echo "<button type='submit' class='btn' name='deleteProduk'>Delete</button>";
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
    <script src="../js/main-script.js"></script>
</body>

</html>