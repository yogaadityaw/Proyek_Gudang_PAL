<?php
require 'controller/koneksi.php';

//start session
session_start();
// menambah barang baru

    if(isset($_POST['addnewbarangproduksi'])){
        $namabarang = $_POST['namabarang'];
        $namapengebon = $_POST['namapengebon'];
        $bengkel = $_POST['bengkel'];
        $jumlah = $_POST['jumlah'];
        $barangbaik = $_POST['barangbaik'];
        $barangrusak = $_POST['barangrusak'];
        $keterangan = $_POST['keterangan'];

        $addtotable = mysqli_query($conn,"INSERT INTO alat_produksi (namabarang, namapengebon, bengkel, jumlah, baik, rusak, keterangan) VALUES ('$namabarang', '$namapengebon', '$bengkel', '$jumlah', '$barangbaik', '$barangrusak', '$keterangan')");

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
    $namapengebon = $_POST['namapengebon'];
    $bengkel = $_POST['bengkel'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $keterangan = $_POST['keterangan'];
    $idb = $_POST['idb'];
    
    $update = mysqli_query($conn,"update alat_produksi set namabarang='$namabarang', namapengebon='$namapengebon', bengkel='$bengkel', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', keterangan='$keterangan' where idbarang = '$idb' ");
    
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
