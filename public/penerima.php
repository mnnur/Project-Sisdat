<?php
require '../php/connect.php';

//add
if (isset($_POST['submitPenerima'])) {
    $id = $_POST['id-penerima'];
    $nama = $_POST['nama-penerima'];
    $alamat = $_POST['alamat-penerima'];
    $query = "INSERT INTO penerima (id_penerima, nama_penerima, alamat_penerima) VALUES ('$id', '$nama', '$alamat')";
    $result = mysqli_query(connect(), $query);
}

//edit
if (isset($_POST['editPenerima'])) {
    $id = $_POST['id-penerima-edit'];
    $nama = $_POST['nama-penerima-edit'];
    $alamat = $_POST['alamat-penerima-edit'];
    $query = "UPDATE penerima SET nama_penerima = '$nama', alamat_penerima = '$alamat' WHERE id_penerima = '$id'";
    $result = mysqli_query(connect(), $query);
}

//delete
if (isset($_POST['deletePenerima'])) {
    $id = $_POST['id-penerima'];
    $query = "DELETE FROM penerima WHERE id_penerima = '$id'";
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

    <link rel="stylesheet" href="../css/main-style.css">
</head>

<body>
    <div class="add-form-popup" id="addFormPopup">
        <form action="" method="POST" class="form-container">
            <h1>Tambah Penerima</h1>

            <label for="id-penerima"><b>id penerima</b></label>
            <input type="text" placeholder="Enter id penerima" name="id-penerima" required>

            <label for="nama-penerima"><b>nama penerima</b></label>
            <input type="text" placeholder="nama penerima" name="nama-penerima" required>

            <label for="alamat-penerima"><b>alamat penerima</b></label>
            <input type="text" placeholder="alamat penerima" name="alamat-penerima" required>
            <div class="action-button">
                <button type="submit" class="btn" name="submitPenerima" id="submitButton">Tambah</button>
                <button class="btn" id="closeAddButton" onclick="closeAddFormPopup()">Tutup</button>
            </div>
        </form>
    </div>

    <div class="edit-form-popup" id="editFormPopup">
        <form action="" method="POST" class="form-container">
            <h1>Edit Penerima</h1>

            <label for="id-penerima-edit"><b>id penerima</b></label>
            <select name="id-penerima-edit" id="id-penerima-edit" required>
                <option value="">Pilih id penerima</option>
                <?php
                $query = "SELECT * FROM penerima";
                $result = mysqli_query(connect(), $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_penerima'] . "'>" . $row['id_penerima'] . "</option>";
                }
                ?>
            </select>

            <label for="nama-penerima-edit"><b>nama penerima</b></label>
            <input type="text" placeholder="nama penerima" name="nama-penerima-edit" required>

            <label for="alamat-penerima-edit"><b>alamat penerima</b></label>
            <input type="text" placeholder="alamat penerima" name="alamat-penerima-edit" required>

            <div class="action-button">
                <button type="submit" class="btn-edit" name="editPenerima">Edit</button>
                <button type="button" class="btn-close-edit" id="close-button-edit" onclick="closeEditFormPopup()">Tutup</button>
            </div>
        </form>
    </div>
    <div class="wrapper">
        <aside id="sidenav">
            <div class="logo">
                <h2>Webtracking</h2>
            </div>
            <p id="status">Status Penerima</p>
            <a href="#">Penerima</a>
            <a href="#">Menerima</a>
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
                    <h1>Data penerima</h1>
                    <div class="action-button">
                        <button class="open-button-add" id="open-button-add" onclick="displayAddFormPopup()">Tambah penerima</button>
                        <button class="open-button-edit" id="open-button-edit" onclick="displayEditFormPopup()">Edit penerima</button>
                    </div>
                    <table>
                        <tr>
                            <th>ID penerima</th>
                            <th>Nama penerima</th>
                            <th>Alamat penerima</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM penerima";
                        $result = mysqli_query(connect(), $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_penerima'] . "</td>";
                            echo "<td>" . $row['nama_penerima'] . "</td>";
                            echo "<td>" . $row['alamat_penerima'] . "</td>";
                            echo "<td>";
                            echo "<form action='' method='POST'>";
                            echo "<input type='hidden' name='id-penerima' value='" . $row['id_penerima'] . "'>";
                            echo "<button type='submit' class='btn' name='deletePenerima'>Delete</button>";
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