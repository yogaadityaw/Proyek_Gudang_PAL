<?php
require 'koneksi.php';
session_start();
$tanggalPinjam = date('Y-m-d H:i:s');

if (isset($_POST['approve'])) {
    // Lakukan tindakan yang diperlukan saat tombol "Approve" ditekan
    // Misalnya, Anda dapat melakukan update status atau tindakan lainnya
    $idTransaksi = $_POST['idtransaksi'];

    // Contoh: Update status menjadi "Approved"
    $updateQuery = "UPDATE keluar_masuk_barang SET isApproved = 1, tanggal = '$tanggalPinjam' WHERE idtransaksi = '$idTransaksi'";
    mysqli_query($conn, $updateQuery);

    $queryJenisBarang = "SELECT jenisbarang FROM keluar_masuk_barang WHERE idtransaksi = '$idTransaksi'";
    $resultJenisBarang = mysqli_query($conn, $queryJenisBarang);
    if (!$resultJenisBarang) {
        echo "Gagal mengambil jenis barang dari database.";
        return;
    }
    $rowJenisBarang = mysqli_fetch_assoc($resultJenisBarang);
    $jenisbarang = $rowJenisBarang['jenisbarang'];

    
    // ! Fungsi Update Stok Alat Produksi
    if (
        $jenisbarang === "Peralatan Pendukung Produksi"
    ) {
        // !Ambil kodebarang
        $queryKodeBarang = "SELECT kodebarang, jumlahpinjam FROM keluar_masuk_barang WHERE idtransaksi = '$idTransaksi'";
        $resultKodeBarang = mysqli_query(
            $conn,
            $queryKodeBarang
        );
        if (!$resultKodeBarang) {
            echo "Gagal mengambil jenis barang dari database.";
            return;
        }
        $rowKodeBarang = mysqli_fetch_assoc($resultKodeBarang);
        $kodebarang = $rowKodeBarang['kodebarang'];
        $jumlah = $rowKodeBarang['jumlahpinjam'];
        
        // Ambil stok barang dari tabel barang berdasarkan kodebarang
        $queryStokBarang = "SELECT jumlah, baik FROM alat_produksi WHERE kodebarang = '$kodebarang'";
        $resultStokBarang = mysqli_query(
            $conn,
            $queryStokBarang
        );
        $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);

        if (!$rowStokBarang) {
            echo "Barang dengan kode $kodebarang tidak ditemukan.";
            return;
        }

        $stokBarang = $rowStokBarang['jumlah'];
        $barangBaik = $rowStokBarang['baik'];

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
    if (
        $jenisbarang === "Barang Konsumable"
    ) {
        // !Ambil kodebarang
        $queryKodeBarang = "SELECT kodebarang, jumlahpinjam FROM keluar_masuk_barang WHERE idtransaksi = '$idTransaksi'";
        $resultKodeBarang = mysqli_query(
            $conn,
            $queryKodeBarang
        );
        if (!$resultKodeBarang) {
            echo "Gagal mengambil jenis barang dari database.";
            return;
        }
        $rowKodeBarang = mysqli_fetch_assoc($resultKodeBarang);
        $kodebarang = $rowKodeBarang['kodebarang'];
        $jumlah = $rowKodeBarang['jumlahpinjam'];

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


    if (
        $jenisbarang === "Alat Komunikasi"
    ) {
        // !Ambil kodebarang
        $queryKodeBarang = "SELECT kodebarang, jumlahpinjam FROM keluar_masuk_barang WHERE idtransaksi = '$idTransaksi'";
        $resultKodeBarang = mysqli_query(
            $conn,
            $queryKodeBarang
        );
        if (!$resultKodeBarang) {
            echo "Gagal mengambil jenis barang dari database.";
            return;
        }
        $rowKodeBarang = mysqli_fetch_assoc($resultKodeBarang);
        $noseri = $rowKodeBarang['kodebarang'];
        $jumlah = $rowKodeBarang['jumlahpinjam'];

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
    if ($jenisbarang === "Angkat, Angkut, Alat Apung") {
        // !Ambil kodebarang
        $queryKodeBarang = "SELECT kodebarang, jumlahpinjam FROM keluar_masuk_barang WHERE idtransaksi = '$idTransaksi'";
        $resultKodeBarang = mysqli_query(
            $conn,
            $queryKodeBarang
        );
        if (!$resultKodeBarang) {
            echo "Gagal mengambil jenis barang dari database.";
            return;
        }
        $rowKodeBarang = mysqli_fetch_assoc($resultKodeBarang);
        $kodebarang = $rowKodeBarang['kodebarang'];
        $jumlah = $rowKodeBarang['jumlahpinjam'];

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
}

if (isset($_POST['tolak'])) {
    // Lakukan tindakan yang diperlukan saat tombol "Tolak" ditekan
    // Misalnya, Anda dapat melakukan update status atau tindakan lainnya
    $idTransaksi = $_POST['idtransaksi'];

    // Contoh: Update status menjadi "Rejected"
    $updateQuery = "UPDATE keluar_masuk_barang SET isApproved = 2 WHERE idtransaksi = '$idTransaksi'";
    mysqli_query($conn, $updateQuery);
}

// Redirect kembali ke halaman peminjaman setelah melakukan tindakan
// header("Location: peminjaman.php");
