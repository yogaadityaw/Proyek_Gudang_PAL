<?php
require 'koneksi.php';

if (isset($_POST['tambahUser'])) {
    $nip = addslashes(trim($_POST['nip']));
    $password = addslashes(trim($_POST['password']));
    $password2 = addslashes(trim($_POST['password2']));
    $role = $_POST['role'];

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
            $query = "INSERT INTO login (NIP, Password, role_id) VALUES ('$nip', '$password_encrypted', '$role')";
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

// delete akun modal

// require 'koneksi.php'; // Anggap file ini berisi koneksi ke database

// if (isset($_POST['hapusakun'])) {
//     $idb = $_POST['idb'];

//     // Persiapkan dan eksekusi kueri DELETE
//     $query = "DELETE FROM login WHERE ID_User = ?";
//     $stmt = mysqli_prepare($conn, $query);
//     mysqli_stmt_bind_param($stmt, "i", $idb);

//     if (mysqli_stmt_execute($stmt)) {
//         // Data berhasil dihapus
//         echo "<script>alert('Data berhasil dihapus'); window.location.href='user_manajemen.php';</script>";
//     } else {
//         // Terjadi kesalahan saat menghapus data
//         echo "<script>alert('Gagal menghapus data');</script>";
//     }

//     mysqli_stmt_close($stmt);
// }

// mysqli_close($conn);

if(isset($_POST['hapusakun'])){
    $nip = $_POST['nip'];
    $hapus = mysqli_query($conn, "DELETE FROM login WHERE NIP ='$nip' ");
    
    if($hapus){
        echo "<script>alert('Data berhasil dihapus'); window.location.href='user_manajemen.php';</script>";
        session_write_close();
    }else{
        echo "<script>alert('Gagal menghapus data');</script>";
    };
    return;
}

?>

