<!-- kontroller untuk mutasi barang agar dapat menampilkan add to table dari database kedalam view -->
<?php
function searchMutasiBarang($conn, $searchTerm)
{
    $query = "SELECT * FROM keluar_masuk_barang
              WHERE tanggal LIKE '%$searchTerm%'
              OR kodetransaksi LIKE '%$searchTerm%'
              OR nip LIKE '%$searchTerm%'
              OR namapegawai LIKE '%$searchTerm%'
              OR birobengkel LIKE '%$searchTerm%'
              OR namabarang LIKE '%$searchTerm%'
              OR kodebarang LIKE '%$searchTerm%'
              OR jumlahpinjam LIKE '%$searchTerm%'
              OR jumlahkembali LIKE '%$searchTerm%'
              OR jumlahrusak LIKE '%$searchTerm%'
              OR keterangan LIKE '%$searchTerm%'
              OR status LIKE '%$searchTerm%'
              OR tanggalkembali LIKE '%$searchTerm%'";

    $result = mysqli_query($conn, $query);

    return $result;
}
