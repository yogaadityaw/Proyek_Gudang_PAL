<?php
//import koneksi ke database
require 'cek.php';
require 'controller/koneksi.php';
?>
<html>

<head>
    <title>DAFTAR FASILITAS ALAT ANGKAT, ANGKUT dan APUNG DIVISI HARKAN 2023</title>
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
        <h2 class="mt-4 text-center">AFTAR FASILITAS ALAT ANGKAT, ANGKUT dan APUNG DIVISI HARKAN 2023</h2>
        
        <div class="data-tables datatable-dark">
        <br>
            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table class="table table-bordered" id="mauexport" width="100" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang / Alat</th>
                        <th>Jumlah</th>
                        <th>Kondisi Barang Baik</th>
                        <th>Kondisi Barang Rusak</th>
                        <th>keterangan</th>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    $ambilsemuadatabarang = mysqli_query($conn, "SELECT * FROM barang_angkut_apung");
                    while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {
                        $namabarang = $data['namabarang'];
                        $jumlah = $data['jumlah'];
                        $barangbaik = $data['baik'];
                        $barangrusak = $data['rusak'];
                        $keterangan = $data['keterangan'];
                        $idb = $data['idbarang'];
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?php echo $namabarang ?></td>
                            <td><?php echo $jumlah ?></td>
                            <td><?php echo $barangbaik ?></td>
                            <td><?php echo $barangrusak ?></td>
                            <td><?php echo $keterangan ?></td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
            <a href="angkut_apung.php" class="btn btn-Danger">Kembali</a>
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