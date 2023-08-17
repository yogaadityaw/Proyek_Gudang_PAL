<?php

require 'cek.php';

require 'controller/koneksi.php';
require 'controller/mutasi_controller.php';
require 'middleware/auth_middleware.php';

checkRole("admin", 'middleware/auth_prohibit.php');

$query = "SELECT * FROM keluar_masuk_barang";

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    // Anda sebaiknya membersihkan input untuk mencegah injeksi SQL
    $keyword = mysqli_real_escape_string($conn, $keyword);

    // Ubah query SQL untuk menyertakan filter pencarian
    $query = "SELECT * FROM keluar_masuk_barang WHERE namabarang LIKE '%$keyword%' OR kodebarang LIKE '%$keyword%'";
}
$searchTerm = isset($_GET['cari']) ? $_GET['cari'] : '';
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mutasi Barang</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<?php include 'sidebar.php' ?>

<body>
    <br>
    <br>
    <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
        <div class="container-fluid px-4">
            <h3 class="mt-4 text-center">List Daftar Mutasi Barang DIVISI HARKAN 2023</h3>

        </div>

        <div class="container -fluid">
            <a href="export_mutasibarang.php" class="btn btn-info">Export Data</a>
            <br>
            <br>

            <form action="mutasibarang.php" method="GET">
                <div class="input-group mb-3">
                    <!-- Search bar using Bootstrap -->
                    <input type="text" class="form-control" placeholder="Cari" name="cari" value="<?= $searchTerm ?>">
                    <button type="submit" class="btn btn-primary">Cari</button> 
                </div>
            </form>

            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="table-info text-center align-middle">Tanggal Pinjam</th>
                                <th class="table-info text-center align-middle">Tanggal Kembali</th>
                                <th class="table-info text-center align-middle">kode transaksi</th>
                                <th class="table-info text-center align-middle">NIP Pegawai</th>
                                <th class="table-info text-center align-middle">Nama Pegawai</th>
                                <th class="table-info text-center align-middle">Biro/Bengkel</th>
                                <th class="table-info text-center align-middle">Nama Barang & Kode Barang</th>
                                <th class="table-info text-center align-middle">Kode Barang </th>
                                <th class="table-info text-center align-middle">Jumlah/Unit Pinjam</th>
                                <th class="table-info text-center align-middle">Jumlah barang Kembali</th>
                                <th class="table-info text-center align-middle">Jumlah barang rusak</th>
                                <th class="table-info text-center align-middle">Keterangan</th>
                                <th class="table-info text-center align-middle">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($searchTerm)) {
                                $searchResults = searchMutasiBarang($conn, $searchTerm);
                                while ($data = mysqli_fetch_array($searchResults)) {
                                    $tanggalpinjam = $data['tanggal'];
                                    $tanggalkembali = $data['tanggalkembali'];
                                    $kodetransaksi = $data['kodetransaksi'];
                                    $nip = $data['nip'];
                                    $namapegawai = $data['namapegawai'];
                                    $birobengkel = $data['birobengkel'];
                                    $namabarang = $data['namabarang'];
                                    $kodebarang = $data['kodebarang'];
                                    $jumlahpinjam = $data['jumlahpinjam'];
                                    $jumlahkembali = $data['jumlahkembali'];
                                    $jumlahrusak = $data['jumlahrusak'];
                                    $keterangan = $data['keterangan'];
                                    $status = $data['status'];
                                    $tanggalKembaliNull = "0000-00-00 00:00:00";

                                    // Ambil nama pegawai
                                    $query_pegawai = "SELECT pegawai.namapegawai
                        FROM pegawai
                        WHERE pegawai.nip = '$nip'";
                                    $result_pegawai = mysqli_query($conn, $query_pegawai);
                                    $namapegawai = "-";
                                    if ($result_pegawai) {
                                        $row_pegawai = mysqli_fetch_assoc($result_pegawai);
                                        $namapegawai = $row_pegawai['namapegawai'];
                                    }

                                    // Ambil nama divisi
                                    $query_divisi = "SELECT divisi.namadivisi
                        FROM pegawai
                        INNER JOIN divisi ON pegawai.divisi_id = divisi.iddivisi
                        WHERE pegawai.nip = '$nip'";
                                    $result_divisi = mysqli_query($conn, $query_divisi);
                                    $namadivisi = "-";
                                    if ($result_divisi) {
                                        $row_divisi = mysqli_fetch_assoc($result_divisi);
                                        $namadivisi = $row_divisi['namadivisi'];
                                    }

                                    echo '<tr class="centered-cell">';
                                    echo '<td class="centered-cell">' . $tanggalpinjam . '</td>';
                                    echo '<td class="centered-cell">' . $tanggalkembali . '</td>';
                                    echo '<td class="centered-cell">' . $kodetransaksi . '</td>';
                                    echo '<td class="centered-cell">' . $nip . '</td>';
                                    echo '<td class="centered-cell">' . $namapegawai . '</td>';
                                    echo '<td class="centered-cell">' . $namadivisi . '</td>';
                                    echo '<td class="centered-cell">' . $namabarang . '</td>';
                                    echo '<td class="centered-cell">' . $kodebarang . '</td>';
                                    echo '<td class="centered-cell">' . $jumlahpinjam . '</td>';
                                    echo '<td class="centered-cell">' . $jumlahkembali . '</td>';
                                    echo '<td class="centered-cell">' . $jumlahrusak . '</td>';
                                    echo '<td class="centered-cell">' . $keterangan . '</td>';
                                    echo '<td class="centered-cell">';
                                    if ($tanggalkembali === $tanggalKembaliNull) {
                                        echo '<span class="badge text-bg-danger">Belum kembali</span>';
                                    } else if ($jumlahrusak > 0) {
                                        echo '<span class="badge text-bg-warning">Barang rusak/kurang lengkap</span>';
                                    } else {
                                        echo '<span class="badge text-bg-success">Sudah kembali</span>';
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                $ambilsemuadatastock = mysqli_query($conn, "select * from keluar_masuk_barang");
                                while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                    $tanggalpinjam = $data['tanggal'];
                                    $tanggalkembali = $data['tanggalkembali'];
                                    $kodetransaksi = $data['kodetransaksi'];
                                    $nip = $data['nip'];
                                    $namapegawai = $data['namapegawai'];
                                    $birobengkel = $data['birobengkel'];
                                    $namabarang = $data['namabarang'];
                                    $kodebarang = $data['kodebarang'];
                                    $jumlahpinjam = $data['jumlahpinjam'];
                                    $jumlahkembali = $data['jumlahkembali'];
                                    $jumlahrusak = $data['jumlahrusak'];
                                    $keterangan = $data['keterangan'];
                                    $status = $data['status'];
                                    $tanggalKembaliNull = "0000-00-00 00:00:00";

                                    // Ambil nama pegawai
                                    $query_pegawai = "SELECT pegawai.namapegawai
                        FROM pegawai
                        WHERE pegawai.nip = '$nip'";
                                    $result_pegawai = mysqli_query($conn, $query_pegawai);
                                    $namapegawai = "-";
                                    if ($result_pegawai) {
                                        $row_pegawai = mysqli_fetch_assoc($result_pegawai);
                                        $namapegawai = $row_pegawai['namapegawai'];
                                    }

                                    // Ambil nama divisi
                                    $query_divisi = "SELECT divisi.namadivisi
                        FROM pegawai
                        INNER JOIN divisi ON pegawai.divisi_id = divisi.iddivisi
                        WHERE pegawai.nip = '$nip'";
                                    $result_divisi = mysqli_query($conn, $query_divisi);
                                    $namadivisi = "-";
                                    if ($result_divisi) {
                                        $row_divisi = mysqli_fetch_assoc($result_divisi);
                                        $namadivisi = $row_divisi['namadivisi'];
                                    }

                                    echo '<tr>';
                                    echo '<td>' . $tanggalpinjam . '</td>';
                                    echo '<td>' . $tanggalkembali . '</td>';
                                    echo '<td>' . $kodetransaksi . '</td>';
                                    echo '<td>' . $nip . '</td>';
                                    echo '<td>' . $namapegawai . '</td>';
                                    echo '<td>' . $namadivisi . '</td>';
                                    echo '<td>' . $namabarang . '</td>';
                                    echo '<td>' . $kodebarang . '</td>';
                                    echo '<td>' . $jumlahpinjam . '</td>';
                                    echo '<td>' . $jumlahkembali . '</td>';
                                    echo '<td>' . $jumlahrusak . '</td>';
                                    echo '<td>' . $keterangan . '</td>';
                                    echo '<td>';
                                    if ($tanggalkembali === $tanggalKembaliNull) {
                                        echo '<span class="badge text-bg-danger">Belum kembali</span>';
                                    } else if ($jumlahrusak > 0) {
                                        echo '<span class="badge text-bg-warning">Barang rusak/kurang lengkap</span>';
                                    } else {
                                        echo '<span class="badge text-bg-success">Sudah kembali</span>';
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- untuk query menampilkan tabel -->

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>