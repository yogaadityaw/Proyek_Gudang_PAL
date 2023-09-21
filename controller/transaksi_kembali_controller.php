<?php
require 'koneksi.php';
//membuat koneksi ke database
session_start();
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['kembali'])) {
    $nip = $_POST['nip'];
    $namabarang = $_POST['namabarang'];
    $kodebarang = $_POST['kodebarang'];
    $noseri = $_POST['kodebarang'];
    $jumlah = $_POST['jumlah'];
    $jumlahbaik = $_POST['jumlahbaik'];
    $jumlahrusak = $_POST['jumlahrusak'];
    $lokasikembali = $_POST['lokasikembali'];
    $keterangan = $_POST['keterangan'];
    $kodepinjam = $_POST['kodepinjam'];
    $status = "Sudah kembali";
    $tanggalkembali = $_POST['tanggalkembali'];


    // *Fungsi untuk mengambil jenisbarang dari database
    $queryJenisBarang = "SELECT jenisbarang FROM keluar_masuk_barang WHERE kodetransaksi = '$kodepinjam'";
    $resultJenisBarang = mysqli_query($conn, $queryJenisBarang);

    if (!$resultJenisBarang) {
        echo "Gagal mengambil jenis barang dari database.";
        return;
    }

    $rowJenisBarang = mysqli_fetch_assoc($resultJenisBarang);
    $jenisbarang = $rowJenisBarang['jenisbarang'];

    // ! Fungsi Update Stok Alat Produksi
    if ($jenisbarang === "Peralatan Pendukung Produksi") {
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
    if ($jenisbarang === "Alat Komunikasi") {
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
        $queryUpdateStok = "UPDATE komunikasi SET jumlah = '$stokBaru', baik = '$barangBaikBaru', rusak = '$barangrusakbaru' WHERE noseri = '$noseri'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            echo "Gagal mengurangi stok barang.";
            return;
        }
    }

    // ! Fungsi Update Stok Barang konsumable
    if ($jenisbarang === "Barang Konsumable") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah FROM barang_konsumable WHERE kodebarang = '$kodebarang'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $kodebarang tidak ditemukan.";
            return;
        }

        $stokBarang = $rowStokBarang['jumlah'];

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

    // ! Fungsi Update Stok Alat Angkut Apung
    if ($jenisbarang === "Angkat, Angkut, Alat Apung") {
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah, baik, rusak FROM barang_angkut_apung WHERE kodebarang = '$kodebarang'";
        $resultStokBarang = mysqli_query($conn, $queryStokBarang);
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            die(var_dump("Barang dengan kode $kodebarang tidak ditemukan."));
            return;
        }

        $stokBarang = $rowStokBarang['jumlah'];
        $barangBaik = $rowStokBarang['baik'];
        $barangrusak = $rowStokBarang['rusak'];

        // Kurangi stok barang dengan jumlah pinjaman
        $stokBaru = $stokBarang + $jumlah;
        $barangBaikBaru = $barangBaik + $jumlahbaik;
        $barangrusakbaru = $barangrusak + $jumlahrusak;

        // Update tabel barang dengan stok yang baru
        $queryUpdateStok = "UPDATE barang_angkut_apung SET jumlah = '$stokBaru', baik = '$barangBaikBaru', rusak='$barangrusakbaru', keterangan='$keterangan' WHERE kodebarang = '$kodebarang'";
        $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

        if (!$resultUpdateStok) {
            die(var_dump("Gagal mengurangi stok barang."));
            return;
        }
    }


    $addtotable = mysqli_query($conn, "UPDATE keluar_masuk_barang 
                                  SET tanggalkembali = '$tanggalkembali', 
                                      namabarang = '$namabarang', 
                                      kodebarang = '$kodebarang', 
                                      jumlahpinjam = '$jumlah', 
                                      jumlahkembali = '$jumlahbaik', 
                                      jumlahrusak = '$jumlahrusak', 
                                      lokasi_kembali = '$lokasikembali',
                                      keterangan='$keterangan',
                                      isApproved = '3', 
                                      status = '$status' 
                                  WHERE kodetransaksi = '$kodepinjam'");
    if ($addtotable) {
        if ($_SESSION['role'] == "admin") {
            header('location: mutasibarang.php');
            exit();
        } elseif ($_SESSION['role'] == "user") {
            header('location: user_mutasibarang.php');
        }
        session_write_close();
    } else {
        die("Gagal menyimpan data!");
    };
    return;
}
