<?php
require 'koneksi.php';
session_start();

if (isset($_POST['addnewbarangasset'])) {
    $namabarang = $_POST['namabarang'];
    $kategoribarang = $_POST['kategoribarang'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];
    

    $addtotable = mysqli_query($conn, "INSERT INTO barang_asset (namabarang, kategoribarang, jumlah, baik, rusak, lokasi, keterangan) VALUES ('$namabarang', '$kategoribarang','$jumlah', '$barangbaik', '$barangrusak', '$lokasi', '$keterangan')");
    if ($addtotable) {
        if ($_SESSION['role'] == "admin") {
            header('location: barang_asset.php');
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

    // update barang
    if(isset($_POST['updatebarang'])){
        $namabarang = $_POST['namabarang'];
        $kategoribarang =$_POST['kategoribarang'];
        $jumlah = $_POST['jumlah'];
        $barangbaik = $_POST['barangbaik'];
        $barangrusak = $_POST['barangrusak'];
        $lokasi = $_POST['lokasi'];
        $keterangan = $_POST['keterangan'];
        $idb = $_POST['idb'];
        
        $update = mysqli_query($conn,"update barang_asset set namabarang='$namabarang', kategoribarang='$kategoribarang', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', lokasi='$lokasi', keterangan='$keterangan' where idbarang = '$idb' ");
        
        if($update){
            if ($_SESSION['role'] == "admin") {
                header('location: barang_asset.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_barang_asset.php');
            }
            session_write_close();
        }else{
            echo 'Gagal menyimpan data: ';
            
    
        };
        return;
    } 
    
    //delete barang 
    
    if(isset($_POST['hapusbarang'])){
        $idb = $_POST['idb'];
        $hapus = mysqli_query($conn, "delete from barang_asset where idbarang ='$idb'");
        
        if($hapus){
            header('location: barang_asset.php');
            session_write_close();
        }else{
            echo 'Gagal menyimpan data: ';
        };
        return;
    }
    
?>