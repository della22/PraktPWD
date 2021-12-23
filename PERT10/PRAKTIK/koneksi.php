<?php

$host = "localhost";
$database = "id18170370_akademik";
$username = "id18170370_mahasiswa";
$password = "cX@Ot5f$@^]dWr}t";

$con= mysqli_connect($host,$username,$password,$database);
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
    }
?>