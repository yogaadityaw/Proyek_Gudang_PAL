<?php
// Koneksi ke database
require 'controller/koneksi.php'; // Sesuaikan dengan file koneksi Anda

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nip"])) {
    // Ambil NIP dari permintaan POST
    $nip = $_POST["nip"];

    // Query ke database untuk mengambil nama pegawai berdasarkan NIP
    $query = "SELECT namapegawai FROM pegawai WHERE nip = :nip";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":nip", $nip, PDO::PARAM_STR);
    $stmt->execute();

    // Ambil hasil query
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Mengirimkan respons JSON dengan nama pegawai
        echo json_encode(array("success" => true, "nama_pegawai" => $result["nama_pegawai"]));
    } else {
        // Jika NIP tidak ditemukan, mengirimkan respons JSON bahwa tidak berhasil
        echo json_encode(array("success" => false, "message" => "NIP tidak ditemukan"));
    }
} else {
    // Mengirimkan respons JSON jika permintaan tidak valid
    echo json_encode(array("success" => false, "message" => "Permintaan tidak valid"));
}
?>
