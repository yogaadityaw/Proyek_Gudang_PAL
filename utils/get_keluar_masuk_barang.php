<?php
require '../controller/koneksi.php'; // Make sure this points to the correct file

if (isset($_POST['kodeTransaksi'])) {
    $kodeTransaksi = $_POST['kodeTransaksi'];

    // Query to retrieve data based on kode transaksi
    $query = "SELECT * FROM keluar_masuk_barang WHERE kodetransaksi = '$kodeTransaksi'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Data tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'Kode transaksi tidak ditemukan']);
}
?>