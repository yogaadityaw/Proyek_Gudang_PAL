<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "gudang_harkan";

    $conn = mysqli_connect($hostname, $user, $password, $database);

    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>