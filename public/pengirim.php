<?php
require '../php/connect.php';

//add
if (isset($_POST['submitPengirim'])) {
    $id = $_POST['id-pengirim'];
    $nama = $_POST['nama-pengirim'];
    $alamat = $_POST['alamat-pengirim'];
    $query = "INSERT INTO pengirim (id_pengirim, nama_pengirim, alamat_pengirim) VALUES ('$id', '$nama', '$alamat')";
    $result = mysqli_query(connect(), $query);
}

//edit
if (isset($_POST['editPengirim'])) {
    $id = $_POST['id-pengirim-edit'];
    $nama = $_POST['nama-pengirim-edit'];
    $alamat = $_POST['alamat-pengirim-edit'];
    $query = "UPDATE pengirim SET nama_pengirim = '$nama', alamat_pengirim = '$alamat' WHERE id_pengirim = '$id'";
    $result = mysqli_query(connect(), $query);
}

//delete
if (isset($_POST['deletePengirim'])) {
    $id = $_POST['id-pengirim'];
    $foreignKeyCheck = "SELECT * FROM memiliki WHERE id_pengirim = '$id'";
    $foreignKeyCheck2 = "SELECT * FROM menginfokan WHERE id_pengirim = '$id'";
    $foreignKeyCheckResult = mysqli_query(connect(), $foreignKeyCheck);
    $foreignKeyCheckResult2 = mysqli_query(connect(), $foreignKeyCheck2);
    if (mysqli_num_rows($foreignKeyCheckResult) > 0 || mysqli_num_rows($foreignKeyCheckResult2) > 0) {
        echo "<script>alert('Data tidak bisa dihapus karena terdapat relasi dengan data lain');</script>";
    } else {
        $query = "DELETE FROM pengirim WHERE id_pengirim = '$id'";
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
            <h1>Tambah Pengirim</h1>

            <label for="id-pengirim"><b>id pengirim</b></label>
            <input type="text" placeholder="Enter id pengirim" name="id-pengirim" required>

            <label for="nama-pengirim"><b>nama pengirim</b></label>
            <input type="text" placeholder="nama pengirim" name="nama-pengirim" required>

            <label for="alamat-pengirim"><b>alamat pengirim</b></label>
            <input type="text" placeholder="alamat pengirim" name="alamat-pengirim" required>
            <div class="action-button">
                <button type="submit" class="btn" name="submitPengirim" id="submitButton">Tambah</button>
                <button class="btn" id="closeAddButton" onclick="closeAddFormPopup()">Tutup</button>
            </div>
        </form>
    </div>

    <div class="edit-form-popup" id="editFormPopup">
        <form action="" method="POST" class="form-container">
            <h1>Edit Pengirim</h1>

            <label for="id-pengirim-edit"><b>id pengirim</b></label>
            <select name="id-pengirim-edit" id="id-pengirim-edit" required>
                <option value="">Pilih Pengirim</option>
                <?php
                $query = "SELECT * FROM pengirim";
                $result = mysqli_query(connect(), $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_pengirim'] . "'>" . $row['id_pengirim'] . "</option>";
                }
                ?>
            </select>

            <label for="nama-pengirim-edit"><b>nama pengirim</b></label>
            <input type="text" placeholder="nama pengirim" name="nama-pengirim-edit" required>

            <label for="alamat-pengirim-edit"><b>alamat pengirim</b></label>
            <input type="text" placeholder="alamat pengirim" name="alamat-pengirim-edit" required>

            <div class="action-button">
                <button type="submit" class="btn-edit" name="editPengirim">Edit</button>
                <button type="button" class="btn-close-edit" id="close-button-edit" onclick="closeEditFormPopup()">Tutup</button>
            </div>
        </form>
    </div>
    <div class="wrapper">
        <aside>
            <div class="logo">
                <h2>Webtracking</h2>
            </div>
            <p id="status">Status Pengirim</p>
            <a href="pengirim.php">Pengirim</a>
            <a href="relasi/memiliki.php">Memiliki</a>
            <a href="relasi/menginfokan.php">Menginfokan Kurir</a>
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
                    <h1>Data Pengirim</h1>
                    <div class="action-button">
                        <button class="open-button-add" id="open-button-add" onclick="displayAddFormPopup()">Tambah Pengirim</button>
                        <button class="open-button-edit" id="open-button-edit" onclick="displayEditFormPopup()">Edit Pengirim</button>
                    </div>
                    <table>
                        <tr>
                            <th>ID pengirim</th>
                            <th>Nama pengirim</th>
                            <th>Alamat pengirim</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM pengirim";
                        $result = mysqli_query(connect(), $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_pengirim'] . "</td>";
                            echo "<td>" . $row['nama_pengirim'] . "</td>";
                            echo "<td>" . $row['alamat_pengirim'] . "</td>";
                            echo "<td>";
                            echo "<form action='' method='POST'>";
                            echo "<input type='hidden' name='id-pengirim' value='" . $row['id_pengirim'] . "'>";
                            echo "<button type='submit' class='btn' name='deletePengirim'>Delete</button>";
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