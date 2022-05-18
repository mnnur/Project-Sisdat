<?php

function connect()
{
    $connection = mysqli_connect("localhost", "root", "", "webtracking");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $connection;
}

function get_data($connection, $table)
{
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function displayProductTable($data)
{

    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nama</th>";
    echo "<th>Berat</th>";
    echo "</tr>";
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>".$row['id_produk']."</td>";
        echo "<td>".$row['nama_produk']."</td>";
        echo "<td>".$row['berat']."</td>";
        echo "<td><button>Edit</button></td>";
        echo "<td><button>Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}

function displayInHTML(){
    $data = get_data(connect(), 'produk');
    displayProductTable($data);
}

?>