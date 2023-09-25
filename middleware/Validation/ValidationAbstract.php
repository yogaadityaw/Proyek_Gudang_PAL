<?php
abstract class ValidationAbstract{
    abstract public static function validateAlatProduksi($namabarang, $kodebarang, $kategoribarang, $jumlah, $barangbaik, $barangrusak, $lokasi);
    abstract public static function validateKomunikasi($namabarang, $noseri, $jumlah, $barangbaik, $barangrusak, $lokasi);
    abstract public static function validateKonsumable($namabarang, $kodebarang, $jumlah, $lokasi);
    abstract public static function validateAngkutApung($namabarang, $kodebarang, $jumlah, $barangbaik, $barangrusak, $lokasi);
    abstract public static function validateBarangAset($namabarang, $kategoribarang, $jumlah, $barangbaik, $barangrusak, $lokasi, $keterangan);
}