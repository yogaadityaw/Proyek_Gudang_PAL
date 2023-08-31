<?php
require 'koneksi.php';
//membuat koneksi ke database
session_start();
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['kembali']) != null) {
    $nip = $_POST['nip'];
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $noseri = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $jumlahbaik = $_POST['jumlahbaik'];
    $jumlahrusak = $_POST['jumlahrusak'];
    $lokasikembali = $_POST['lokasikembali'];
    $kodepinjam = $_POST['kodepinjam'];
    $status = "Sudah kembali";
    $tanggalkembali = $_POST['tanggalkembali'];

    $addtotable = mysqli_query($conn, "UPDATE keluar_masuk_barang 
                                  SET tanggalkembali = '$tanggalkembali', 
                                      namabarang = '$namabarang', 
                                      kodebarang = '$kodebarang', 
                                      jumlahpinjam = '$jumlah', 
                                      jumlahkembali = '$jumlahbaik', 
                                      jumlahrusak = '$jumlahrusak', 
                                      lokasi_kembali = '$lokasikembali',
                                      isApproved = '3', 
                                      status = '$status' 
                                  WHERE kodetransaksi = '$kodepinjam'");
    if ($addtotable) {
        if ($_SESSION['role'] == "admin") {
            header('location: mutasibarang.php');
            exit();
        } elseif ($_SESSION['role'] == "user") {
            header('location: user_mutasibarang.php');
        }
        session_write_close();
    } else {
        echo 'Gagal menyimpan data.';
    };
    return;
}
?>