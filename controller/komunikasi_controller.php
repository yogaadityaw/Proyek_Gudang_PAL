<?php
require 'controller/koneksi.php';

//start session
session_start();
// menambah barang baru

    if(isset($_POST['addnewbarangkomunikasi'])){
        $namabarang = $_POST['namabarang'];
        $noseri = $_POST['noseri'];
        $namapengebon = $_POST['namapengebon'];
        $jumlah = $_POST['jumlah'];
        $barangbaik = $_POST['barangbaik'];
        $barangrusak = $_POST['barangrusak'];
        $keterangan = $_POST['keterangan'];
        
    if($jumlah>=$barangbaik+$barangrusak){ // dungsi untuk cek inputan
        $addtotable = mysqli_query($conn,"INSERT INTO komunikasi (namabarang, noseri, namapengebon, jumlah, baik, rusak, keterangan) VALUES ('$namabarang', '$noseri', '$namapengebon',  '$jumlah', '$barangbaik', '$barangrusak', '$keterangan')");
    }
    else{ // fungsi untuk cek inputan
        session_write_close();
    };
        if($addtotable){
            header('Location: komunikasi.php');
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
    $namapengebon = $_POST['namapengebon'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $keterangan = $_POST['keterangan'];
    $idb = $_POST['idb'];
    
    $update = mysqli_query($conn,"update komunikasi set namabarang='$namabarang', noseri='$noseri', namapengebon='$namapengebon', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', keterangan='$keterangan' where idbarang = '$idb' ");
    
    if($update){
        header('location:komunikasi.php');
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