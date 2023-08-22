<?php
require 'koneksi.php';




//membuat koneksi ke database
session_start();

// menambah barang baru

    if(isset($_POST['addnewbarangkonsumable'])){
        $namabarang = $_POST['namabarang'];
        $kodebarang = $_POST['kodebarang'];
        $jumlah = $_POST['jumlah'];
        $lokasi = $_POST['lokasi'];
    
        $addtotable = mysqli_query($conn,"INSERT INTO barang_konsumable (namabarang, kodebarang, jumlah, lokasi, kategori_id) VALUES ('$namabarang', '$kodebarang', '$jumlah', '$lokasi', 3)");
        if($addtotable){
            if ($_SESSION['role'] == "admin") {
                header('location: konsumable.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_konsumable.php');
            }
            session_write_close();
            
        }else{
            echo 'Gagal menyimpan data: ';
            
            
        };
        return;
    };


//update barang 

if(isset($_POST['updatebarang'])){
    $idb= $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $lokasi = $_POST['lokasi'];
    
    $update = mysqli_query($conn,"update barang_konsumable SET namabarang='$namabarang', kodebarang='$kodebarang', jumlah='$jumlah', lokasi='$lokasi' WHERE idbarang = '$idb' ");
    
    if($update){
        if ($_SESSION['role'] == "admin") {
            header('location: konsumable.php');
            exit();
        } else if ($_SESSION['role'] == "user") {
            header('location: user_konsumable.php');
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
    $hapus = mysqli_query($conn, "delete from barang_konsumable where idbarang='$idb' ");
    
    if($hapus){
        header('location:konsumable.php');
        session_write_close();
    }else{
        echo 'Gagal menyimpan data: ';
    };
    return;
}
