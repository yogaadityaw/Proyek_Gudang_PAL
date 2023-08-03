<?php
require 'controller/koneksi.php';
//membuat koneksi ke database
session_start();
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['kembali']) != null) {
    $nip = $_POST['nip'];
    $jenisbarang = $_POST['jenisbarang'];
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $noseri = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $jumlahbaik = $_POST['jumlahbaik'];
    $jumlahrusak = $_POST['jumlahrusak'];
    $kodepinjam = $_POST['kodepinjam'];
    $status = "Sudah kembali";

    // //INI DUMMY
    // $jumlahkembali = 2;
    // $jumlahrusak = 2;
    // $status = "good";


    // // !Tambahkan validasi untuk data yang kosong
    // if (empty($nip) || empty($jenisbarang) || empty($namabarang) || empty($kodebarang) || empty($noseri) || empty($jumlah) || empty($jumlahbaik) || empty($jumlahrusak) || empty($kodepinjam)) {
    //     echo "<script>alert('Semua kolom harus diisi.');</script>";
    //     return;
    // }

    // ! Fungsi Update Stok Alat Produksi
    if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Peralatan Pendukung Produksi") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah, baik, rusak FROM alat_produksi WHERE kodebarang = '$kodebarang'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $kodebarang tidak ditemukan.";
            return;
        }

        $stokBarang = $rowStokBarang['jumlah'];
        $barangBaik = $rowStokBarang['baik'];
        $barangrusak = $rowStokBarang['rusak'];

        // if ($stokBarang < $jumlah) {
        //     echo "Stok barang tidak mencukupi.";
        //     return;
        // }

        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang + $jumlah;
        $barangBaikBaru = $barangBaik + $jumlahbaik;
        $barangrusakbaru = $barangrusak + $jumlahrusak;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE alat_produksi SET jumlah = '$stokBaru', baik = '$barangBaikBaru', rusak='$barangrusakbaru' WHERE kodebarang = '$kodebarang'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }

    // ! Fungsi Update Stok Alat Komunikasi
    if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Alat Komunikasi") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah, baik, rusak FROM komunikasi WHERE noseri = '$noseri'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $noseri tidak ditemukan.";
            return;
        }


        $stokBarang = $rowStokBarang['jumlah'];
        $barangBaik = $rowStokBarang['baik'];
        $barangrusak = $rowStokBarang['rusak'];
        // $barangBaik = $rowBarangBaik['baik'];

        // if ($stokBarang < $jumlah) {
        //     echo "Stok barang tidak mencukupi.";
        //     return;
        // }

        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang + $jumlah;
        $barangBaikBaru = $barangBaik + $jumlahbaik;
        $barangrusakbaru = $barangrusak + $jumlahrusak;
        // $barangBaikBaru = $barangBaik - $jumlah;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE komunikasi SET jumlah = '$stokBaru', baik = '$barangBaikBaru', rusak = $barangrusakbaru WHERE noseri = '$noseri'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }

     // ! Fungsi Update Stok Barang konsumable
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

        // if ($stokBarang < $jumlah) {
        //     echo "Stok barang tidak mencukupi.";
        //     return;
        // }

        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang + $jumlah;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE barang_konsumable SET jumlah = '$stokBaru' WHERE kodebarang = '$kodebarang'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }

   // ! Fungsi Update Stok Alat Produksi
   if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Angkat, Angkut, Alat Apung") {
    // Ambil stok barang dari tabel barang berdasarkan kodebarang
    $queryStokBarang = "SELECT jumlah, baik, rusak FROM barang_angkut_apung WHERE kodebarang = '$kodebarang'";
    $resultStokBarang = mysqli_query($conn, $queryStokBarang);
    $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

    if (!$rowStokBarang) {
        echo "Barang dengan kode $kodebarang tidak ditemukan.";
        return;
    }

    $stokBarang = $rowStokBarang['jumlah'];
    $barangBaik = $rowStokBarang['baik'];
    $barangrusak = $rowStokBarang['rusak'];

    if ($stokBarang < $jumlah) {
        echo "Stok barang tidak mencukupi.";
        return;
    }

    // Kurangi stok barang dengan jumlah pinjaman
    $stokBaru = $stokBarang + $jumlah;
    $barangBaikBaru = $barangBaik + $jumlahbaik;
    $barangrusakbaru = $barangrusak + $jumlahrusak;

    // Update tabel barang dengan stok yang baru
    $queryUpdateStok = "UPDATE barang_angkut_apung SET jumlah = '$stokBaru', baik = '$barangBaikBaru', rusak='$barangrusakbaru' WHERE kodebarang = '$kodebarang'";
    $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

    if (!$resultUpdateStok) {
        echo "Gagal mengurangi stok barang.";
        return;
    }
}


    $tanggalkembali=$_POST['tanggalkembali'];
    echo `$tanggalkembali`;
    $addtotable = mysqli_query($conn, "UPDATE keluar_masuk_barang 
                                  SET tanggalkembali = '$tanggalkembali', 
                                      namabarang = '$namabarang', 
                                      kodebarang = '$kodebarang', 
                                      jumlahpinjam = '$jumlah', 
                                      jumlahkembali = '$jumlahbaik', 
                                      jumlahrusak = '$jumlahrusak', 
                                      status = '$status' 
                                  WHERE kodetransaksi = '$kodepinjam'");
    if ($addtotable) {
        header('location: mutasibarang.php');
        session_write_close();
    } else {
        echo 'Gagal menyimpan data: ';
    };
    return;
}


// pisahkan pinjam dan pengembalian


// PEMINJAMAN -> ID_PINJAM = TANGGAL KAPAN DIPINJAM, TANGGAL KEMBALINE = 0

// KEMBALI -> ID_PINJAM = QUERY: INSERT INTO TABEL_TRANSAKSI (TANGGAL KEMBALI) VALUES (AMBIL FUNGSI DATE{$tanggalpinjam = date('Y-m-d');}) WHERE IDPINJAM DI DATABASE = $IDPINJAM
