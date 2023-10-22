<?php
require 'ValidationAbstract.php';
// session_start();

class Validation extends ValidationAbstract
{
    public static function validateAlatProduksi($namabarang, $kodebarang, $kategoribarang, $jumlah, $barangbaik, $barangrusak, $lokasi)
    {
        $is_valid = true;
        $error_message = "";
        $barangbaik = (int) trim($barangbaik);
        $barangrusak = (int) trim($barangrusak);
        $jumlah = (int) trim($jumlah);

        if ($namabarang == "" || $kodebarang == "" || $kategoribarang == "" || $lokasi == "") {
            $is_valid = false;
            $error_message = "Data tidak boleh kosong";
        }

        if ($barangrusak + $barangbaik != $jumlah) {
            $is_valid = false;
            $error_message = "Jumlah barang tidak sesuai";
        }

        return [
            'is_valid' => $is_valid,
            'error_message' => $error_message,
        ];
    }

    public static function validateKomunikasi($namabarang, $noseri, $jumlah, $barangbaik, $barangrusak, $lokasi)
    {
        $is_valid = true;
        $error_message = "";
        $barangbaik = (int) trim($barangbaik);
        $barangrusak = (int) trim($barangrusak);
        $jumlah = (int) trim($jumlah);

        if ($namabarang == "" || $noseri == "" || $lokasi == "") {
            $is_valid = false;
            $error_message = "Data tidak boleh kosong";
        }

        if ($barangrusak + $barangbaik != $jumlah) {
            $is_valid = false;
            $error_message = "Jumlah barang tidak sesuai";
        }

        return [
            'is_valid' => $is_valid,
            'error_message' => $error_message,
        ];
    }
    public static function validateKonsumable($namabarang, $kodebarang, $jumlah, $lokasi)
    {
        $is_valid = true;
        $error_message = "";
        $jumlah = (int) trim($jumlah);

        if ($namabarang == "" || $kodebarang == "" || $lokasi == "") {
            $is_valid = false;
            $error_message = "Data tidak boleh kosong";
        }

        return [
            'is_valid' => $is_valid,
            'error_message' => $error_message,
        ];
    }
    public static function validateAngkutApung($namabarang, $kodebarang, $jumlah, $barangbaik, $barangrusak, $lokasi)
    {
        $is_valid = true;
        $error_message = "";
        $barangbaik = (int) trim($barangbaik);
        $barangrusak = (int) trim($barangrusak);
        $jumlah = (int) trim($jumlah);

        if ($namabarang == "" || $kodebarang == "" || $lokasi == "") {
            $is_valid = false;
            $error_message = "Data tidak boleh kosong";
        }

        if ($barangrusak + $barangbaik != $jumlah) {
            $is_valid = false;
            $error_message = "Jumlah barang tidak sesuai";
        }

        return [
            'is_valid' => $is_valid,
            'error_message' => $error_message,
        ];
    }
    // public static function validateBarangAset($namabarang, $kategoribarang, $spesifikasi, $jumlah, $barangbaik, $barangrusak, $lokasi, $keterangan)
    // {
    //     $is_valid = true;
    //     $error_message = "";
    //     $barangbaik = (int) trim($barangbaik);
    //     $barangrusak = (int) trim($barangrusak);
    //     $jumlah = (int) trim($jumlah);


    //     if ($namabarang == "" || $kategoribarang == "" || $spesifikasi == "" || $lokasi == "") {
    //         $is_valid = false;
    //         $error_message = "Data tidak boleh kosong";
    //     }

    //     if ($barangrusak + $barangbaik != $jumlah) {
    //         $is_valid = false;
    //         $error_message = "Jumlah barang tidak sesuai";
    //     }

    //     return [
    //         'is_valid' => $is_valid,
    //         'error_message' => $error_message,
    //     ];
    // }
    public static function validateMutasi($jenisbarang, $namabarang, $kodebarang, $noseri, $lokasipinjam, $tanggalpengajuan, $jumlah, $idtransaksi)
    {
        $error_message = "";
        if ($_SESSION['role'] == "admin") {
            require '../Proyek_Gudang_PAL/controller/koneksi.php';
        } else {
            require '../../Proyek_Gudang_PAL/controller/koneksi.php';
        }
        $is_valid = true;
        $jumlah = (int) trim($jumlah);

        if ($jenisbarang == "" || $namabarang == null || $kodebarang == "" || $noseri == "" || $lokasipinjam == "" || $tanggalpengajuan == null || $jumlah == 0) {
            $is_valid = false;
            $error_message = "Data tidak boleh kosong";
        }

        if ($jenisbarang == "Peralatan Pendukung Produksi") {
            $queryStokBarang = "SELECT baik FROM alat_produksi WHERE kodebarang = '$kodebarang'";
            $resultStokBarang = mysqli_query($conn, $queryStokBarang);
            $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);
            $barangBaik = $rowStokBarang['baik'];
            $barangBaik = (int) trim($barangBaik);
            if ($barangBaik <= 0) {
                $is_valid = false;
                $error_message = "Stok barang tidak mencukupi";
            }
        } else if ($jenisbarang == "Barang Konsumable") {
            $queryStokBarang = "SELECT jumlah FROM barang_konsumable WHERE kodebarang = '$kodebarang'";
            $resultStokBarang = mysqli_query($conn, $queryStokBarang);
            $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);
            $barangBaik = $rowStokBarang['jumlah'];
            $barangBaik = (int) trim($barangBaik);
            if ($barangBaik <= 0) {
                $is_valid = false;
                $error_message = "Stok barang tidak mencukupi";
            }
        } else if ($jenisbarang == "Alat Komunikasi") {
            $queryStokBarang = "SELECT baik FROM komunikasi WHERE noseri = '$kodebarang'";
            $resultStokBarang = mysqli_query($conn, $queryStokBarang);
            $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);
            $barangBaik = $rowStokBarang['jumlah'];
            $barangBaik = (int) trim($barangBaik);
            if ($barangBaik <= 0) {
                $is_valid = false;
                $error_message = "Stok barang tidak mencukupi";
            }
        } else if ($jenisbarang == "Angkat, Angkut, Alat Apung") {
            $queryStokBarang = "SELECT baik FROM barang_angkut_apung WHERE kodebarang = '$kodebarang'";
            $resultStokBarang = mysqli_query($conn, $queryStokBarang);
            $rowStokBarang = mysqli_fetch_assoc($resultStokBarang);
            $barangBaik = $rowStokBarang['jumlah'];
            $barangBaik = (int) trim($barangBaik);
            if ($barangBaik <= 0) {
                $is_valid = false;
                $error_message = "Stok barang tidak mencukupi";
            }
        } else {
            $error_message = "Jenis barang tidak tersedia!";
        }

        return [
            'is_valid' => $is_valid,
            'error_message' => $error_message,
        ];
    }
}
