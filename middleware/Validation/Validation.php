<?php
require 'ValidationAbstract.php';

class Validation extends ValidationAbstract
{
    public static function validateAlatProduksi($namabarang, $kodebarang, $kategoribarang, $jumlah, $barangbaik, $barangrusak, $lokasi)
    {
        $is_valid = true;
        $error_message = "";
        $barangbaik = (int) trim($barangbaik);
        $barangrusak = (int) trim($barangrusak);
        $jumlah = (int) trim($jumlah);

        if ($namabarang == "" || $kodebarang == "" || $kategoribarang == "" || $jumlah == 0 || $barangbaik == 0 || $barangrusak == 0 || $lokasi == "") {
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

        if ($namabarang == "" || $noseri == "" || $jumlah == 0 || $lokasi == "") {
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

        if ($namabarang == "" || $kodebarang == "" || $jumlah == 0 || $lokasi == "") {
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

        if ($namabarang == "" || $kodebarang == "" || $jumlah == 0 || $barangbaik == 0 || $barangrusak == 0 || $lokasi == "") {
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
    public static function validateBarangAset($namabarang, $kategoribarang, $jumlah, $barangbaik, $barangrusak, $lokasi, $keterangan)
    {
        $is_valid = true;
        $error_message = "";
        $barangbaik = (int) trim($barangbaik);
        $barangrusak = (int) trim($barangrusak);
        $jumlah = (int) trim($jumlah);

        if ($namabarang == "" || $kategoribarang == "" || $jumlah == 0 || $barangbaik == 0 || $barangrusak == 0 || $lokasi == "" || $keterangan == "") {
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
}
