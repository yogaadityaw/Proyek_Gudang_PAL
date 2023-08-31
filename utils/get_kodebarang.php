<?php
require '../controller/koneksi.php';

if (isset($_POST['jenisbarang']) && isset($_POST['namabarang'])) {
    $jenisbarang = $_POST['jenisbarang'];
    $namabarang = $_POST['namabarang'];

    if ($jenisbarang === "Peralatan Pendukung Produksi") {
        // Query untuk mengambil data kode barang dari tabel "barang" berdasarkan kategori dan nama barang
        $sql = "SELECT kodebarang FROM alat_produksi WHERE kategori_id = 1 AND namabarang = '$namabarang' LIMIT 1";
    } else if ($jenisbarang === "Alat Komunikasi") {
        // Query untuk mengambil data kode barang dari tabel "barang" berdasarkan kategori dan nama barang
        $sql = "SELECT noseri FROM komunikasi WHERE kategori_id = 2 AND namabarang = '$namabarang' LIMIT 1";
    } else if ($jenisbarang === "Barang Konsumable") {
        // Query untuk mengambil data kode barang dari tabel "barang" berdasarkan kategori dan nama barang
        $sql = "SELECT kodebarang FROM barang_konsumable WHERE kategori_id = 3 AND namabarang = '$namabarang' LIMIT 1";
    } else if ($jenisbarang === "Angkat, Angkut, Alat Apung") {
        // Query untuk mengambil data kode barang dari tabel "barang" berdasarkan kategori dan nama barang
        $sql = "SELECT kodebarang FROM barang_angkut_apung WHERE kategori_id = 4 AND namabarang = '$namabarang' LIMIT 1";
    } else {
        echo "Kategori barang tidak valid.";
        exit;
    }
    // Execute the SQL query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Kirimkan kode barang sebagai respons
        if ($jenisbarang == "Alat Komunikasi") {
            echo $row['noseri'];
        } else {
            echo $row['kodebarang'];
        }
    } else {
        echo "Tidak ada data kode barang yang sesuai.";
    }
}
