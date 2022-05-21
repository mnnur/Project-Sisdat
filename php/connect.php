<?php

function connect()
{

    $connection = mysqli_connect('localhost', 'root', '', 'webtracking');
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $connection;
}


?>