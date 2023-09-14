<?php
require 'koneksi.php';
$queryBerita = "SELECT * FROM berita ORDER BY created_at DESC LIMIT 5";
$resultBerita = mysqli_query($conn, $queryBerita);
if (!$resultBerita) {
    die(var_dump("Gagal mendapatkan berita."));
}
$dataBerita = array();
while ($row = mysqli_fetch_assoc($resultBerita)) {
    $dataBerita[] = $row;
}
$jsonDataBerita = json_encode($dataBerita);


//untuk post inputan form berita kedalam database

if (isset($_POST['post'])) {

    $judulberita = $_POST['judulberita'];
    $deskripsiberita = $_POST['deskripsiberita'];

    // Cek apakah NIP sudah terdaftar

    $query = "INSERT INTO berita (judul_berita, deskripsi_berita) VALUES ('$judulberita', '$deskripsiberita')";
    $addberita = mysqli_query($conn, $query);
    if ($addberita) {
        echo "<script>alert('berita berhasil ditambahkan!.');</script>";
        header('location: berita.php');
        session_write_close();
    } else {
        echo "<script>alert('Gagal menambah berita!.');</script>";
    }
}