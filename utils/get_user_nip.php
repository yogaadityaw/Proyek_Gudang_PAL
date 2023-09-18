<?php
require 'controller/koneksi.php'; 
if (isset($_POST['ceknip'])) {
    $nip = $_POST['nip'];

    // Query to retrieve data based on kode transaksi
    $query = "SELECT * FROM users WHERE nip_user = '$nip'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        // die(var_dump(json_encode($data)));
        json_encode($data);
    } else {
        echo json_encode(['error' => 'Data tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'User transaksi tidak ditemukan']);
}
?>