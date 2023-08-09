<?php
require 'controller/koneksi.php';
// require 'get_kategori.php';
session_start();

// menambah barang baru

    if(isset($_POST['addnewbarangproduksi'])){
        $namabarang = $_POST['namabarang'];
        $kodebarang = $_POST['kodebarang'];
        $jumlah = $_POST['jumlah'];
        $barangbaik = $_POST['barangbaik'];
        $barangrusak = $_POST['barangrusak'];
        $keterangan = $_POST['keterangan'];

        if($barangbaik + $barangrusak > $jumlah || $barangbaik +  $barangrusak < $jumlah){
            
        }
        $addtotable = mysqli_query($conn,"INSERT INTO alat_produksi (namabarang, kodebarang, jumlah, baik, rusak, keterangan, kategori_id) VALUES ('$namabarang', '$kodebarang', '$jumlah', '$barangbaik', '$barangrusak', '$keterangan', 1)");
        
            if($addtotable){
            header('Location: alat_produksi.php');
            session_write_close();
            
            }else{
            echo 'Gagal menyimpan data: ';
            };
            return;
    };
    //dari addto table

    // update barang
if(isset($_POST['updatebarang'])){
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $keterangan = $_POST['keterangan'];
    $idb = $_POST['idb'];
    
    $update = mysqli_query($conn,"update alat_produksi set namabarang='$namabarang', kodebarang='$kodebarang', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', keterangan='$keterangan' where idbarang = '$idb' ");
    
    if($update){
        header('location:alat_produksi.php');
        session_write_close();
    }else{
        echo 'Gagal menyimpan data: ';
        

    };
    return;
} 

//delete barang 

if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];
    $hapus = mysqli_query($conn, "delete from alat_produksi where idbarang='$idb' ");
    
    if($hapus){
        header('location:alat_produksi.php');
        session_write_close();
    }else{
        echo 'Gagal menyimpan data: ';
        

    };
    return;
}
