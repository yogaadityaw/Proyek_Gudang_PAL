<?php
require 'Validation.php';
class AlatProduksiValidation extends Validation {
    public static function validate($barangbaik, $barangrusak, $jumlah, $kategoribarang, $kodebarang, $lokasi, $namabarang) {
        if ($barangbaik == "" || $barangrusak == "" || $jumlah == "" || $kategoribarang == "" || $kodebarang == "" || $lokasi == "" || $namabarang == "") {
            die("Input tidak valid");
        } else {
            return true;
        }
    }
}
