<?php
//import koneksi ke database

require '../controller/koneksi.php';
session_start();
?>
<html>

<head>
    <title>Export History Peminjaman </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

</head>

<body>
    <div class="container">
        <br>
        <h2 class="mt-4 text-center">Riwayat Peminjaman Barang</h2>
        <br>
        <div class="data-tables datatable-dark">
            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table class="table table-bordered ml-0" id="mauexport" width="100" cellspacing="0">
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
                                <th class="table-info text-center align-middle">Lokasi Peminjaman</th>
                                <th class="table-info text-center align-middle">Lokasi Pengembalian</th>
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
                                    $namabarang = $data['namabarang'];
                                    $kodebarang = $data['kodebarang'];
                                    $jumlahpinjam = $data['jumlahpinjam'];
                                    $jumlahkembali = $data['jumlahkembali'];
                                    $jumlahrusak = $data['jumlahrusak'];
                                    $lokasi = $data['lokasi'];
                                    $lokasikembali = $data['lokasi_kembali'];
                                    $isApproved = $data['isApproved'];
                                    $status = $data['status'];
                                    $tanggalKembaliNull = "0000-00-00 00:00:00";

                                    // Ambil nama pegawai
                                    $query_pegawai = "SELECT users.nama_user
                        FROM users
                        WHERE users.nip_user = '$nip'";
                                    $result_pegawai = mysqli_query($conn, $query_pegawai);
                                    $namapegawai = "-";
                                    if ($result_pegawai) {
                                        $row_pegawai = mysqli_fetch_assoc($result_pegawai);
                                        $namapegawai = $row_pegawai['nama_user'];
                                    }

                                    // Ambil nama divisi
                                    $query_divisi = "SELECT divisi.namadivisi
                        FROM users
                        INNER JOIN divisi ON users.divisi_id = divisi.iddivisi
                        WHERE users.nip_user = '$nip'";
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
                                    echo '<td class="centered-cell">' . $lokasi . '</td>';
                                    echo '<td class="centered-cell">' . $lokasikembali . '</td>';
                                    echo '<td class="centered-cell">';
                                    if ($isApproved == 2) {
                                        echo '<span class="badge text-bg-danger text-light">Ditolak</span>';
                                    } else if ($isApproved == 0) {
                                        echo '<span class="badge text-bg-warning text-light">Menunggu Approval</span>';
                                    } else {
                                        echo '<span class="badge text-bg-success text-light">Disetujui</span>';
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                // *Menampilkan peminjaman apa saja yang dimiliki oleh suatu akun <-- Milik peminjam
                                $nip = $_SESSION['nip'];
                                $ambilsemuadatastock = mysqli_query($conn, "SELECT *
                                FROM keluar_masuk_barang km
                                INNER JOIN users u ON km.nip = u.nip_user
                                WHERE u.nip_user = '$nip';");
                                while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                    $tanggalpinjam = $data['tanggal'];
                                    $tanggalkembali = $data['tanggalkembali'];
                                    $kodetransaksi = $data['kodetransaksi'];
                                    $nip = $data['nip'];
                                    $namabarang = $data['namabarang'];
                                    $kodebarang = $data['kodebarang'];
                                    $jumlahpinjam = $data['jumlahpinjam'];
                                    $jumlahkembali = $data['jumlahkembali'];
                                    $jumlahrusak = $data['jumlahrusak'];
                                    $lokasi = $data['lokasi'];
                                    $lokasikembali = $data['lokasi_kembali'];
                                    $isApproved = $data['isApproved'];
                                    $status = $data['status'];
                                    $tanggalKembaliNull = "0000-00-00 00:00:00";

                                    // Ambil nama pegawai
                                    $query_pegawai = "SELECT users.nama_user
                        FROM users
                        WHERE users.nip_user = '$nip'";
                                    $result_pegawai = mysqli_query($conn, $query_pegawai);
                                    $namapegawai = "-";
                                    if ($result_pegawai) {
                                        $row_pegawai = mysqli_fetch_assoc($result_pegawai);
                                        $namapegawai = $row_pegawai['nama_user'];
                                    }

                                    // Ambil nama divisi
                                    $query_divisi = "SELECT divisi.namadivisi
                        FROM users
                        INNER JOIN divisi ON users.divisi_id = divisi.iddivisi
                        WHERE users.nip_user = '$nip'";
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
                                    echo '<td>' . $lokasi . '</td>';
                                    echo '<td>' . $lokasikembali . '</td>';
                                    echo '<td>';
                                    if ($isApproved == 2) {
                                        echo '<span class="badge text-bg-danger text-light">Ditolak</span>';
                                    } else if ($isApproved == 0) {
                                        echo '<span class="badge text-bg-warning text-light">Menunggu Approval</span>';
                                    } else if ($isApproved == 3) {
                                        echo '<span class="badge text-bg-success text-light">Barang Sudah Kembali</span>';
                                    } else {
                                        echo '<span class="badge text-bg-primary text-light">Disetujui/Barang Dipinjam</span>';
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
            <a href="javascript:history.back()" class="btn btn-danger">kembali</a>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>