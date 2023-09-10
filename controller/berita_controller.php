<?php
require '../controller/koneksi.php';
$queryBerita = "SELECT * FROM berita ORDER BY created_at ASC LIMIT 5";
$resultBerita = mysqli_query($conn, $queryBerita);
if (!$resultBerita) {
    die(var_dump("Gagal mendapatkan berita."));
}
$dataBerita = array();
while ($row = mysqli_fetch_assoc($resultBerita)) {
    $dataBerita[] = $row;
}
$jsonDataBerita = json_encode($dataBerita);