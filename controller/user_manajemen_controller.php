<?php
require 'koneksi.php';

session_start();

if (isset($_POST['tambahUser'])) {
    $nip = addslashes(trim($_POST['nip']));
    $nama = addslashes(trim($_POST['nama']));
    $password = addslashes(trim($_POST['password']));
    $password2 = addslashes(trim($_POST['password2']));
    $role = $_POST['role'];
    $divisi = $_POST['divisi'];

    // Cek apakah NIP sudah terdaftar
    $checkNIPQuery = "SELECT * FROM users WHERE nip_user = '$nip'";
    $checkNIPResult = mysqli_query($conn, $checkNIPQuery);
    if (mysqli_num_rows($checkNIPResult) > 0) {
        echo "<script>alert('NIP sudah terdaftar. Silakan gunakan NIP lain.');</script>";
    } else {
        if ($password != $password2) {
            echo "<script>alert('Password tidak sama!.');</script>";
        } else {
            $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (nip_user, nama_user, password_user, role_id, divisi_id) VALUES ('$nip', '$nama', '$password_encrypted', '$role', '$divisi')";
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
    $hapus = mysqli_query($conn, "DELETE FROM users WHERE nip_user ='$nip' ");
    
    if($hapus){
        echo "<script>alert('Data berhasil dihapus'); window.location.href='user_manajemen.php';</script>";
        session_write_close();
    }else{
        echo "<script>alert('Gagal menghapus data');</script>";
    };
    return;
}


// Fetch data divisi from the database
$queryDivisi = "SELECT * FROM divisi";
$resultDivisi = mysqli_query($conn, $queryDivisi);
$divisiOptions = "";

if ($resultDivisi) {
    while ($rowDivisi = mysqli_fetch_assoc($resultDivisi)) {
        $divisiOptions .= '<option value="' . $rowDivisi['iddivisi'] . '">' . $rowDivisi['namadivisi'] . '</option>';
    }
} else {
    echo "Error in fetching divisi data: " . mysqli_error($conn);
}

//kontroller untuk tabel user agar dapat menampilkan add to table dari database kedalam view
function searchusermanajemen($conn, $searchTerm)
{
    $query = "SELECT * FROM users
              WHERE tanggal LIKE '%$searchTerm%'
              OR nip_user LIKE '%$searchTerm%'
              OR nama_user LIKE '%$searchTerm%'
              OR role_id LIKE '%$searchTerm%'
              OR divisi_id LIKE '%$searchTerm%'";

    $result = mysqli_query($conn, $query);

    return $result;
}

?>

