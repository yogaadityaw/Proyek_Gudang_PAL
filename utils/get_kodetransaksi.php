<?php
// get_last_kodetransaksi.php
require '../controller/koneksi.php';

// Query untuk mendapatkan nomor terakhir dari kolom kodetransaksi
$query = "SELECT MAX(CAST(SUBSTRING(kodetransaksi, 3) AS UNSIGNED)) AS last_kodetransaksi FROM keluar_masuk_barang"; // Ganti nama_tabel sesuai dengan nama tabel di database Anda
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $last_kodetransaksi = $row['last_kodetransaksi'];
    $next_kodetransaksi = "PJ" . ($last_kodetransaksi + 1); // Menggabungkan kembali dengan awalan "PJ"
    echo $next_kodetransaksi; // Mengembalikan nomor berikutnya ke JavaScript
} else {
    echo "Error";
}

