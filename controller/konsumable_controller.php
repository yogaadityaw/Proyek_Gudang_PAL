<?php
require 'controller/koneksi.php';




//membuat koneksi ke database
session_start();

// menambah barang baru

    if(isset($_POST['addnewbarangkonsumable'])){
        $namabarang = $_POST['namabarang'];
        $kodebarang = $_POST['kodebarang'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
    
        $addtotable = mysqli_query($conn,"INSERT INTO barang_konsumable (namabarang, kodebarang, jumlah, keterangan, kategori_id) VALUES ('$namabarang', '$kodebarang', '$jumlah', '$keterangan', 3)");
        if($addtotable){
            header('location: konsumable.php');
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
    $keterangan = $_POST['keterangan'];
    
    $update = mysqli_query($conn,"update barang_konsumable SET namabarang='$namabarang', kodebarang='$kodebarang', jumlah='$jumlah', keterangan='$keterangan' WHERE idbarang = '$idb' ");
    
    if($update){
        header('location:konsumable.php');
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
