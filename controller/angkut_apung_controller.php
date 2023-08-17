<?php
require 'koneksi.php';
session_start();

if (isset($_POST['addnewbarangangkut'])) {
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $barangbaik = $_POST['barangbaik'];
    $barangrusak = $_POST['barangrusak'];
    $keterangan = $_POST['keterangan'];
    

    $addtotable = mysqli_query($conn, "INSERT INTO barang_angkut_apung (namabarang, kodebarang, jumlah, baik, rusak, keterangan, kategori_id) VALUES ('$namabarang', '$kodebarang', '$jumlah', '$barangbaik', '$barangrusak', '$keterangan', 4)");
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

    // update barang
    if(isset($_POST['updatebarang'])){
        $namabarang = $_POST['namabarang'];
        $kodebarang = $_POST['kodebarang'];
        $jumlah = $_POST['jumlah'];
        $barangbaik = $_POST['barangbaik'];
        $barangrusak = $_POST['barangrusak'];
        $keterangan = $_POST['keterangan'];
        $idb = $_POST['idb'];
        
        $update = mysqli_query($conn,"update barang_angkut_apung set namabarang='$namabarang', kodebarang='$kodebarang', jumlah='$jumlah', baik='$barangbaik', rusak='$barangrusak', keterangan='$keterangan' where idbarang = '$idb' ");
        
        if($update){
            if ($_SESSION['role'] == "admin") {
                header('location: angkut_apung.php');
                exit();
            } else if ($_SESSION['role'] == "user") {
                header('location: user_angkut_apung.php');
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
        $hapus = mysqli_query($conn, "delete from barang_angkut_apung where idbarang ='$idb'");
        
        if($hapus){
            header('location: angkut_apung.php');
            session_write_close();
        }else{
            echo 'Gagal menyimpan data: ';
        };
        return;
    }
    
?>