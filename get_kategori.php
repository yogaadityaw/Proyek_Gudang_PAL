<?php
// Ambil data nama barang berdasarkan kategori "Peralatan Pendukung Produksi"
require 'controller/koneksi.php';

// Jenis Barang Peralatan Pendukung Produksi
if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Peralatan Pendukung Produksi") {
    // Query untuk mengambil data nama barang dari tabel "barang" berdasarkan kategori
    $sql = "SELECT idbarang, namabarang, kodebarang FROM alat_produksi WHERE kategori_id = 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            // Tambahkan data nama barang ke dalam array
            $data[] = $row;
        }
        // Konversi array menjadi format JSON dan kirimkan sebagai respons
        echo json_encode($data);
    } else {
        echo "Tidak ada data nama barang yang sesuai.";
    }
} else if (isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Alat Komunikasi") {
    // Query untuk mengambil data nama barang dari tabel "barang" berdasarkan kategori
    $sql = "SELECT idbarang, namabarang, noseri FROM komunikasi WHERE kategori_id = 2";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            // Tambahkan data nama barang ke dalam array
            $data[] = $row;
        }
        // Konversi array menjadi format JSON dan kirimkan sebagai respons
        echo json_encode($data);
    } else {
        echo "Tidak ada data nama barang yang sesuai.";
    }
} else {
    echo "Kategori barang tidak valid.";
}


$conn->close();
