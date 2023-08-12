<?php
require 'controller/koneksi.php';

if (isset($_POST['tambahUser'])) {
    $nip = addslashes(trim($_POST['nip']));
    $password = addslashes(trim($_POST['password']));
    $password2 = addslashes(trim($_POST['password2']));

    // Cek apakah NIP sudah terdaftar
    $checkNIPQuery = "SELECT * FROM login WHERE NIP = '$nip'";
    $checkNIPResult = mysqli_query($conn, $checkNIPQuery);
    if (mysqli_num_rows($checkNIPResult) > 0) {
        echo "<script>alert('NIP sudah terdaftar. Silakan gunakan NIP lain.');</script>";
    } else {
        if ($password != $password2) {
            echo "<script>alert('Password tidak sama!.');</script>";
        } else {
            $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO login (NIP, Password) VALUES ('$nip', '$password_encrypted')";
            $addUser = mysqli_query($conn, $query);
            if($addUser){
                echo "<script>alert('User berhasil ditambahkan!.');</script>";
                header('location: user_manajemen.php');
                session_write_close();
            } else {
                echo "<script>alert('Gagal menambah user!.');</script>";
            }
        }
    }
}
?>