<?php
require 'koneksi.php';
session_start();
if (isset($_POST['approve'])) {
    // Lakukan tindakan yang diperlukan saat tombol "Approve" ditekan
    // Misalnya, Anda dapat melakukan update status atau tindakan lainnya
    $idTransaksi = $_POST['idtransaksi'];

    // Contoh: Update status menjadi "Approved"
    $updateQuery = "UPDATE keluar_masuk_barang SET isApproved = 1 WHERE idtransaksi = '$idTransaksi'";
    mysqli_query($conn, $updateQuery);
}

if (isset($_POST['tolak'])) {
    // Lakukan tindakan yang diperlukan saat tombol "Tolak" ditekan
    // Misalnya, Anda dapat melakukan update status atau tindakan lainnya
    $idTransaksi = $_POST['idtransaksi'];

    // Contoh: Update status menjadi "Rejected"
    $updateQuery = "UPDATE keluar_masuk_barang SET isApproved = 2 WHERE idtransaksi = '$idTransaksi'";
    mysqli_query($conn, $updateQuery);
}

// Redirect kembali ke halaman peminjaman setelah melakukan tindakan
// header("Location: peminjaman.php");
?> 