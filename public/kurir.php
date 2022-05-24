<?php
require '../php/connect.php';

//add
if (isset($_POST['submitKurir'])) {
    $id = $_POST['id-kurir'];
    $nama = $_POST['nama-kurir'];
    $jk = $_POST['jk-kurir'];
    $query = "INSERT INTO kurir (id_kurir, nama_kurir, jk_kurir) VALUES ('$id', '$nama', '$jk')";
    $result = mysqli_query(connect(), $query);
}

//edit
if (isset($_POST['editKurir'])) {
    $id = $_POST['id-kurir-edit'];
    $nama = $_POST['nama-kurir-edit'];
    $jk = $_POST['jk-kurir-edit'];
    $query = "UPDATE kurir SET nama_kurir = '$nama', jk_kurir = '$jk' WHERE id_kurir = '$id'";
    $result = mysqli_query(connect(), $query);
}

//delete
if (isset($_POST['deleteKurir'])) {
    $id = $_POST['id-kurir'];
    $foreignKeyCheck = "SELECT * FROM mengirim WHERE id_kurir = '$id'";
    $foreignKeyCheck2 = "SELECT * FROM menginfokan WHERE id_kurir = '$id'";
    $foreignKeyCheckResult = mysqli_query(connect(), $foreignKeyCheck);
    $foreignKeyCheckResult2 = mysqli_query(connect(), $foreignKeyCheck2);
    if (mysqli_num_rows($foreignKeyCheckResult) > 0 || mysqli_num_rows($foreignKeyCheckResult2) > 0) {
        echo "<script>alert('Data tidak bisa dihapus karena terdapat relasi dengan data lain');</script>";
    } else {
        $query = "DELETE FROM kurir WHERE id_kurir = '$id'";
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
            <h1>Tambah kurir</h1>

            <label for="id-kurir"><b>id kurir</b></label>
            <input type="text" placeholder="Enter id kurir" name="id-kurir" required>

            <label for="nama-kurir"><b>nama kurir</b></label>
            <input type="text" placeholder="nama kurir" name="nama-kurir" required>

            <div class="action-button">
                <label for="jk-kurir"><b>jenis kelamin kurir:</b></label>
                <input type="radio" name="jk-kurir" <?php if (isset($jk) && $jk == "P") echo "checked"; ?> value="P">Perempuan
                <input type="radio" name="jk-kurir" <?php if (isset($jk) && $jk == "L") echo "checked"; ?> value="L">Laki-Laki
            </div>
            <div class="action-button">
                <button type="submit" class="open-button-add" name="submitKurir" id="submitButton">Tambah</button>
                <button class="btn-delete" id="closeAddButton" onclick="closeAddFormPopup()">Tutup</button>
            </div>
        </form>
    </div>

    <div class="edit-form-popup" id="editFormPopup">
        <form action="" method="POST" class="form-container">
            <h1>Edit kurir</h1>

            <label for="id-kurir-edit"><b>id kurir</b></label>
            <select name="id-kurir-edit" id="id-kurir-edit" required>
                <option value="">Pilih id kurir</option>
                <?php
                $query = "SELECT * FROM kurir";
                $result = mysqli_query(connect(), $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['id_kurir'] . "'>" . $row['id_kurir'] . "</option>";
                }
                ?>
            </select>
            <label for="nama-kurir-edit"><b>nama kurir</b></label>
            <input type="text" placeholder="nama kurir" name="nama-kurir-edit" required>

            <div class="action-button">
                <label for="jk-kurir-edit"><b>jenis kelamin kurir:</b></label>
                <input type="radio" name="jk-kurir-edit" <?php if (isset($jk) && $jk == "P") echo "checked"; ?> value="P">Perempuan
                <input type="radio" name="jk-kurir-edit" <?php if (isset($jk) && $jk == "L") echo "checked"; ?> value="L">Laki-Laki
            </div>

            <div class="action-button">
                <button type="submit" class="open-button-edit" name="editKurir">Edit</button>
                <button type="button" class="btn-delete" id="close-button-edit" onclick="closeEditFormPopup()">Tutup</button>
            </div>
        </form>
    </div>
    <div class="wrapper">
        <aside>
            <div class="logo">
                <h2>Webtracking</h2>
            </div>
            <p id="status">Status Kurir</p>
            <a href="kurir.php">Kurir</a>
            <a href="relasi/mengirim.php">Mengirim</a>
            <a href="relasi/menginfokan.php">Diinfokan</a>
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
                    <h1>Data Kurir</h1>
                    <div class="action-button">
                        <button class="open-button-add" id="open-button-add" onclick="displayAddFormPopup()">Tambah Kurir</button>
                        <button class="open-button-edit" id="open-button-edit" onclick="displayEditFormPopup()">Edit kurir</button>
                    </div>
                    <table>
                        <tr>
                            <th>ID kurir</th>
                            <th>Nama kurir</th>
                            <th>Jenis kelamin kurir</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM kurir";
                        $result = mysqli_query(connect(), $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_kurir'] . "</td>";
                            echo "<td>" . $row['nama_kurir'] . "</td>";
                            echo "<td>" . $row['jk_kurir'] . "</td>";
                            echo "<td>";
                            echo "<form action='' method='POST'>";
                            echo "<input type='hidden' name='id-kurir' value='" . $row['id_kurir'] . "'>";
                            echo "<button type='submit' class='btn-delete' name='deleteKurir'>Delete</button>";
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