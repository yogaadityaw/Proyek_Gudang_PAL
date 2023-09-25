<?php
require 'koneksi.php';
session_start();
if ($_SESSION['role'] == "admin") {
    require 'middleware/Validation/Validation.php';
} else {
    require '../middleware/Validation/Validation.php';
}

if (isset($_POST['addnewbarangangkut'])) {
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $lokasi = $_POST['lokasi'];

    $validateResult = Validation::validateAngkutApung($namabarang, $kodebarang, $jumlah, $barangbaik, $barangrusak, $lokasi);
    $is_valid = $validateResult['is_valid'];
    $error_message = $validateResult['error_message'];
    if (!$is_valid) {
        echo '<script type="text/javascript">alert("' . $error_message . '");</script>';
        return;
    } else {
        $addtotable = mysqli_query($conn, "INSERT INTO barang_angkut_apung (namabarang, kodebarang, jumlah, baik, rusak, lokasi, kategori_id) VALUES ('$namabarang', '$kodebarang', '$jumlah', '$barangbaik', '$barangrusak', '$lokasi', 4)");
        if ($addtotable) {
            if ($_SESSION['role'] == "admin") {
                header('location: angkut_apung.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_angkut_apung.php');
            }
            session_write_close();
        } else {
            echo 'Gagal menyimpan data.';
        }
        return;
    }
}

// update barang
if (isset($_POST['updatebarang'])) {
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $lokasi = $_POST['lokasi'];
    $idb = $_POST['idb'];

    $validateResult = Validation::validateAngkutApung($namabarang, $kodebarang, $jumlah, $barangbaik, $barangrusak, $lokasi);
    $is_valid = $validateResult['is_valid'];
    $error_message = $validateResult['error_message'];
    if (!$is_valid) {
        echo '<script type="text/javascript">alert("' . $error_message . '");</script>';
        return;
    } else {
        $update = mysqli_query($conn, "update barang_angkut_apung set namabarang='$namabarang', kodebarang='$kodebarang', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', lokasi='$lokasi' where idbarang = '$idb' ");
        if ($update) {
            if ($_SESSION['role'] == "admin") {
                header('location: angkut_apung.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_angkut_apung.php');
            }
            session_write_close();
        } else {
            echo 'Gagal menyimpan data: ';
        };
        return;
    }
}

//delete barang 

if (isset($_POST['hapusbarang'])) {
    $idb = $_POST['idb'];
    $hapus = mysqli_query($conn, "delete from barang_angkut_apung where idbarang ='$idb'");

    if ($hapus) {
        header('location: angkut_apung.php');
        session_write_close();
    } else {
        echo 'Gagal menyimpan data: ';
    };
    return;
}
