<?php
//import koneksi ke database
require 'cek.php';
require 'controller/koneksi.php';
?>
<html>

<head>
    <title>DAFTAR PERALATAN PENDUKUNG PRODUKSI DIVISI HARKAN 2023 </title>
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
        <h2 class="mt-4 text-center">List Daftar Mutasi Barang DIVISI HARKAN 2023</h2>
        <br>
        <div class="data-tables datatable-dark">


            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table class="table table-bordered" id="mauexport" width="100" cellspacing="0">
                <thead>
                    <tr>

                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>kode transaksi</th>
                        <th>NIP Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Biro/Bengkel</th>
                        <th>Nama Barang & Kode Barang</th>
                        <th>Kode Barang </th>
                        <th>Jumlah/Unit Pinjam</th>
                        <th>Jumlah barang Kembali</th>
                        <th>Jumlah barang rusak</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    ?>

                        <tr>

                            <td> <?= $tanggalpinjam; ?> </td>
                            <td> <?= $tanggalkembali; ?> </td>
                            <td> <?= $kodetransaksi; ?> </td>
                            <td> <?= $nip; ?> </td>
                            <td> <?= $namapegawai; ?> </td>
                            <td> <?= $birobengkel; ?> </td>

                            <td> <?= $namabarang; ?> </td>
                            <td> <?= $kodebarang; ?> </td>
                            <td> <?= $jumlahpinjam; ?> </td>
                            <td> <?= $jumlahkembali; ?> </td>
                            <td> <?= $jumlahrusak; ?> </td>
                            <td> <?= $keterangan; ?> </td>
                            <td> <?php
                                    if ($tanggalkembali === "0000-00-00 00:00:00") {
                                        echo '<span class="badge text-bg-danger">Barang belum kembali</span>';
                                    } else if ($jumlahrusak > 0) {
                                        echo '<span class="badge text-bg-warning">Barang Rusak</span>';
                                    } else {
                                        echo '<span class="badge text-bg-primary">Selesai</span>';
                                    }
                                    ?></td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
            <a href="mutasibarang.php" class="btn btn-danger">kembali</a>

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