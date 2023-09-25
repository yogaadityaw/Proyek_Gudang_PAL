<?php
require 'koneksi.php';
session_start();
if ($_SESSION['role'] == "admin") {
    require 'middleware/Validation/Validation.php';
} else {
    require '../middleware/Validation/Validation.php';
}

// menambah barang baru

if (isset($_POST['addnewbarangkonsumable'])) {
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $lokasi = $_POST['lokasi'];

    $validateResult = Validation::validateKonsumable($namabarang, $kodebarang, $jumlah, $lokasi);
    $is_valid = $validateResult['is_valid'];
    $error_message = $validateResult['error_message'];
    if (!$is_valid) {
        echo '<script type="text/javascript">alert("' . $error_message . '");</script>';
        return;
    } else {
        $addtotable = mysqli_query($conn, "INSERT INTO barang_konsumable (namabarang, kodebarang, jumlah, lokasi, kategori_id) VALUES ('$namabarang', '$kodebarang', '$jumlah', '$lokasi', 3)");
        if ($addtotable) {
            if ($_SESSION['role'] == "admin") {
                header('location: konsumable.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_konsumable.php');
            }
            session_write_close();
        } else {
            echo 'Gagal menyimpan data: ';
        };
        return;
    }
};


//update barang 

if (isset($_POST['updatebarang'])) {
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $lokasi = $_POST['lokasi'];

    $validateResult = Validation::validateKonsumable($namabarang, $kodebarang, $jumlah, $lokasi);
    $is_valid = $validateResult['is_valid'];
    $error_message = $validateResult['error_message'];
    if (!$is_valid) {
        echo '<script type="text/javascript">alert("' . $error_message . '");</script>';
        return;
    } else {
        $update = mysqli_query($conn, "update barang_konsumable SET namabarang='$namabarang', kodebarang='$kodebarang', jumlah='$jumlah', lokasi='$lokasi' WHERE idbarang = '$idb' ");

        if ($update) {
            if ($_SESSION['role'] == "admin") {
                header('location: konsumable.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_konsumable.php');
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
    $hapus = mysqli_query($conn, "delete from barang_konsumable where idbarang='$idb' ");

    if ($hapus) {
        header('location:konsumable.php');
        session_write_close();
    } else {
        echo 'Gagal menyimpan data: ';
    };
    return;
}
