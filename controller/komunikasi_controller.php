<?php
require 'koneksi.php';

//start session
session_start();
// menambah barang baru

    if(isset($_POST['addnewbarangkomunikasi'])){
        $namabarang = $_POST['namabarang'];
        $noseri = $_POST['noseri'];
        $jumlah = $_POST['jumlah'];
        $barangbaik = $_POST['barangbaik'];
        $barangrusak = $_POST['barangrusak'];
        $lokasi = $_POST['lokasi'];
        
    if($jumlah>=$barangbaik+$barangrusak){ // dungsi untuk cek inputan
        $addtotable = mysqli_query($conn,"INSERT INTO komunikasi (namabarang, noseri, jumlah, baik, rusak, lokasi, kategori_id) VALUES ('$namabarang', '$noseri', '$jumlah', '$barangbaik', '$barangrusak', '$lokasi', 2)");
    }
    else{ // fungsi untuk cek inputan
        session_write_close();
    };
        if($addtotable){
            if ($_SESSION['role'] == "admin") {
                header('location: komunikasi.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_komunikasi.php');
            }
            session_write_close();
            
        }else{
            echo 'Gagal menyimpan data: ';
            
            
        };
        return;
    };

// update barang
if(isset($_POST['updatebarang'])){
    $namabarang = $_POST['namabarang'];
    $noseri = $_POST['noseri'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $lokasi = $_POST['lokasi'];
    $idb = $_POST['idb'];
    
    $update = mysqli_query($conn,"update komunikasi set namabarang='$namabarang', noseri='$noseri', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', lokasi='$lokasi' where idbarang = '$idb' ");
    
    if($update){
        if ($_SESSION['role'] == "admin") {
            header('location: komunikasi.php');
            exit();
        } else if ($_SESSION['role'] == "user") {
            header('location: user_komunikasi.php');
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
    $hapus = mysqli_query($conn, "delete from komunikasi where idbarang='$idb' ");
    
    if($hapus){
        header('location:komunikasi.php');
        session_write_close();
    }else{
        echo 'Gagal menyimpan data: ';
        

    };
    return;
}

?>