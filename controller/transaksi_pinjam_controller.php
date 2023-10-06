<?php
require 'koneksi.php';
//membuat koneksi ke database
session_start();
if ($_SESSION['role'] == "admin") {
    require 'middleware/Validation/Validation.php';
} else {
    require '../middleware/Validation/Validation.php';
}
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['pinjam']) != null) {

    $nip = $_POST['nip'];
    $jenisbarang = $_POST['jenisbarang'];
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $noseri = $_POST['kodebarang'];
    $lokasipinjam = $_POST['lokasipinjam'];
    $tanggalpengajuan = date('Y-m-d H:i:s');
    $jumlah = $_POST['jumlah'];
    $kodepinjam = $_POST['kodepinjam'];
    $status = "Belum kembali";
    $idtransaksi = $_POST['kodepinjam'];

    $validateResult = Validation::validateMutasi($jenisbarang, $namabarang, $kodebarang, $noseri, $lokasipinjam, $tanggalpengajuan, $jumlah, $idtransaksi);
    $is_valid = $validateResult['is_valid'];
    $error_message = $validateResult['error_message'];
    if (!$is_valid) {
        echo '<script type="text/javascript">alert("' . $error_message . '");</script>';
        return;
    } else {
        $queryNip = "SELECT nip_user FROM users WHERE nip_user = '$nip'";
        $resultNip = mysqli_query($conn, $queryNip);

        if ($resultNip->num_rows == 0) {
            echo "<script>alert('NIP tidak ditemukan.');</script>";
            return;
        } else {
            // $addtotable = mysqli_query($conn, "INSERT INTO keluar_masuk_barang (kodetransaksi, nip, tanggal, tanggalkembali, jenisbarang, namabarang, kodebarang, jumlahpinjam, lokasi, status) VALUES ('$kodepinjam', '$nip', '$tanggalpinjam', '$tanggalkembali', '$jenisbarang', '$namabarang', '$kodebarang', '$jumlah', '$lokasipinjam', '$status')");
            $addtotable = mysqli_query($conn, "INSERT INTO keluar_masuk_barang (kodetransaksi, nip, tanggal_pengajuan, jenisbarang, namabarang, kodebarang, jumlahpinjam, lokasi, status) VALUES ('$kodepinjam', '$nip', '$tanggalpengajuan', '$jenisbarang', '$namabarang', '$kodebarang', '$jumlah', '$lokasipinjam', '$status')");
            if ($addtotable) {
                if ($_SESSION['role'] == "admin") {
                    echo "<script>alert('Peminjaman berhasil diajukan!.');</script>";
                    header('location: peminjaman.php');
                    exit();
                } else if ($_SESSION['role'] == "user") {
                    echo "<script>alert('Peminjaman berhasil diajukan!.');</script>";
                    header('location: user_peminjaman.php');
                } else if ($_SESSION['role'] == "peminjam") {
                    echo "<script>alert('Peminjaman berhasil diajukan!.');</script>";
                    header('location: peminjam_history.php');
                }
                session_write_close();
            } else {
                echo 'Gagal menyimpan data: ';
            };
        }
        return;
    }
}
