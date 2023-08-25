<?php
require 'koneksi.php';
session_start();
if (isset($_SESSION['log'])) {
    $nip = $_SESSION['nip'];
    $query = "SELECT *
              FROM keluar_masuk_barang km
              INNER JOIN users u ON km.nip = u.nip_user
              WHERE u.nip_user = '$nip';";

    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<table border="1">';
        echo '<tr><th>ID Transaksi</th><th>Tanggal</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['idtransaksi'] . '</td>';
            echo '<td>' . $row['tanggal'] . '</td>';
            echo '<td>' . $row['namabarang'] . '</td>';
            echo '<td>' . $row['nip'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }
}


?>