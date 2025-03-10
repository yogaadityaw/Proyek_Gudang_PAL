<?php
require 'koneksi.php';
session_start();

if ($_SESSION['role'] == "admin") {
    require 'middleware/Validation/Validation.php';
} else {
    require '../middleware/Validation/Validation.php';
}

// menambah barang baru

if (isset($_POST['addnewbarangproduksi'])) {
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $kategoribarang = $_POST['kategoribarang'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $lokasi = $_POST['lokasi'];

    $validateResult = Validation::validateAlatProduksi($namabarang, $kodebarang, $kategoribarang, $jumlah, $barangbaik, $barangrusak, $lokasi);
    $is_valid = $validateResult['is_valid'];
    $error_message = $validateResult['error_message'];
    if (!$is_valid) {
        echo '<script type="text/javascript">alert("' . $error_message . '");</script>';
        return;
    } else {
        $addtotable = mysqli_query($conn, "INSERT INTO alat_produksi (namabarang, kodebarang, kategoribarang, jumlah, baik, rusak, lokasi, kategori_id) VALUES ('$namabarang', '$kodebarang', '$kategoribarang', '$jumlah', '$barangbaik', '$barangrusak', '$lokasi', 1)");
        if ($addtotable) {
            if ($_SESSION['role'] == "admin") {
                header('location: alat_produksi.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_alat_produksi.php');
            }
            session_write_close();
        } else {
            echo 'Gagal menyimpan data: ';
        };
        return;
    };
}


//dari addto table

// update barang
if (isset($_POST['updatebarang'])) {
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $kategoribarang = $_POST['kategoribarang'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $lokasi = $_POST['lokasi'];
    $idb = $_POST['idb'];



    $validateResult = Validation::validateAlatProduksi($namabarang, $kodebarang, $kategoribarang, $jumlah, $barangbaik, $barangrusak, $lokasi);
    $is_valid = $validateResult['is_valid'];
    $error_message = $validateResult['error_message'];
    if (!$is_valid) {
        echo '<script type="text/javascript">alert("' . $error_message . '");</script>';
        return;
    } else {
        $update = mysqli_query($conn, "update alat_produksi set namabarang='$namabarang', kodebarang='$kodebarang', kategoribarang = '$kategoribarang', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', lokasi='$lokasi' where idbarang = '$idb' ");

        if ($update) {
            if ($_SESSION['role'] == "admin") {
                header('location: alat_produksi.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_alat_produksi.php');
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
    $hapus = mysqli_query($conn, "delete from alat_produksi where idbarang='$idb' ");

    if ($hapus) {
        header('location:alat_produksi.php');
        session_write_close();
    } else {
        echo 'Gagal menyimpan data: ';
    };
    return;
}
