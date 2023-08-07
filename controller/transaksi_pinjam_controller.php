<?php
require 'controller/koneksi.php';
//membuat koneksi ke database
session_start();
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['pinjam']) != null) {

    $nip = $_POST['nip'];
    $jenisbarang = $_POST['jenisbarang'];
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $noseri = $_POST['kodebarang'];

    $jumlah = $_POST['jumlah'];
    $tanggalpinjam = date('Y-m-d H:i:s');
    $tanggalkembali = NULL;
    $kodepinjam = $_POST['kodepinjam'];

    // $jumlahkembali = 0;
    // $jumlahrusak = 0;
    $status = "Belum kembali";




    // // // !Tambahkan validasi untuk data yang kosong
    // if (empty($nip) || empty($jenisbarang) || empty($namabarang) || empty($kodebarang) || empty($noseri) || empty($jumlah) || empty($kodepinjam)) {
    //     echo "<script>alert('Semua kolom harus diisi.');</script>";
    //     return;
    // }

    // ! Fungsi Update Stok Alat Produksi
    if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Peralatan Pendukung Produksi") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah, baik FROM alat_produksi WHERE kodebarang = '$kodebarang'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $kodebarang tidak ditemukan.";
            return;
        }

        $stokBarang = $rowStokBarang['jumlah'];
        $barangBaik = $rowStokBarang['baik'];
        // $barangBaik = $rowBarangBaik['baik'];

        // if ($barangBaik <= $jumlah) {
        //     echo "Stok barang tidak mencukupi.";
        //     return;
        // }
        if ($jumlah > $barangBaik || $barangBaik == 0) {
            echo "<script>alert('barang tidak mencukupi.');</script>";
            return;
        }


        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang - $jumlah;
        $barangBaikBaru = $barangBaik - $jumlah;
        // $barangBaikBaru = $barangBaik - $jumlah;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE alat_produksi SET jumlah = '$stokBaru', baik = '$barangBaikBaru' WHERE kodebarang = '$kodebarang'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }

    // ! Fungsi Update Stok Alat Konsumable
    if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Barang Konsumable") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah FROM barang_konsumable WHERE kodebarang = '$kodebarang'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $kodebarang tidak ditemukan.";
            return;
        }

        $stokBarang = $rowStokBarang['jumlah'];



        if ($stokBarang < $jumlah) {
            echo "<script>alert('barang tidak mencukupi.');</script>";
            return;
        }

        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang - $jumlah;

        // $barangBaikBaru = $barangBaik - $jumlah;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE barang_konsumable SET jumlah = '$stokBaru' WHERE kodebarang = '$kodebarang'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }

    // ! Fungsi Update Stok Alat Komunikasi


    if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Alat Komunikasi") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah, baik FROM komunikasi WHERE noseri = '$noseri'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $noseri tidak ditemukan.";
            return;
        }


        $stokBarang = $rowStokBarang['jumlah'];
        $barangBaik = $rowStokBarang['baik'];
        // $barangBaik = $rowBarangBaik['baik'];

        // if ($barangBaik <= $jumlah) {
        //     echo "<script>alert('barang tidak mencukupi.');</script>";
        //     return;
        // }
        if ($jumlah > $barangBaik || $barangBaik == 0) {
            echo "<script>alert('barang tidak mencukupi.');</script>";
            return;
        }

        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang - $jumlah;
        $barangBaikBaru = $barangBaik - $jumlah;
        // $barangBaikBaru = $barangBaik - $jumlah;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE komunikasi SET jumlah = '$stokBaru', baik = '$barangBaikBaru' WHERE noseri = '$noseri'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }

    // ! Fungsi Update Stok Angkat, Angkut, Alat Apung
    if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Angkat, Angkut, Alat Apung") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah, baik FROM barang_angkut_apung WHERE kodebarang = '$kodebarang'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $kodebarang tidak ditemukan.";
            return;
        }

        $stokBarang = $rowStokBarang['jumlah'];
        $barangBaik = $rowStokBarang['baik'];
        // $barangBaik = $rowBarangBaik['baik'];

        // if ($stokBarang <= $jumlah) {
        //     echo "Stok barang tidak mencukupi.";
        //     return;
        // }
        if ($jumlah > $barangBaik || $barangBaik == 0) {
            echo "<script>alert('Stok tidak mencukupi.');</script>";
            return;
        }

        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang - $jumlah;
        $barangBaikBaru = $barangBaik - $jumlah;
        // $barangBaikBaru = $barangBaik - $jumlah;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE barang_angkut_apung SET jumlah = '$stokBaru', baik = '$barangBaikBaru' WHERE kodebarang = '$kodebarang'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }


    $addtotable = mysqli_query($conn, "INSERT INTO keluar_masuk_barang (kodetransaksi, nip, tanggal, tanggalkembali, namabarang, kodebarang, jumlahpinjam, jumlahkembali, jumlahrusak, status) VALUES ('$kodepinjam', '$nip', '$tanggalpinjam', '$tanggalkembali', '$namabarang', '$kodebarang', '$jumlah', '$jumlahkembali', '$jumlahrusak', '$status')");
    if ($addtotable) {
        header('location: mutasibarang.php');
        session_write_close();
    } else {
        echo 'Gagal menyimpan data: ';
    };
    return;
}


// pisahkan pinjam dan pengembalian
