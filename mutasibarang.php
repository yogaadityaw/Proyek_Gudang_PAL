<?php

require 'cek.php';
require 'controller/koneksi.php';


$query = "SELECT * FROM keluar_masuk_barang";

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    // Anda sebaiknya membersihkan input untuk mencegah injeksi SQL
    $keyword = mysqli_real_escape_string($conn, $keyword);

    // Ubah query SQL untuk menyertakan filter pencarian
    // echo "Query: " . $query;
    $query = "SELECT * FROM keluar_masuk_barang WHERE namabarang LIKE '%$keyword%' OR kodebarang LIKE '%$keyword%' OR tanggal LIKE '%$keyword%' OR tanggalkembali LIKE '%$keyword%' OR kodetransaksi LIKE '%$keyword%' OR nip LIKE '%$keyword%' OR namapegawai LIKE '%$keyword%' ";
}
    // $result = mysqli_query($conn, $query);

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

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Divisi Harkan</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Akun
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Autentikasi Akun
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseTabel" aria-expanded="false" aria-controls="pagesCollapseTabel">
                            Tabel Barang Gudang
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseTabel" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">    
                                <a class="nav-link" href="alat_produksi.php">Peralatan Pendukung Produksi</a>
                                <a class="nav-link" href="komunikasi.php">Alat Komunikasi/(HT)</a>
                                <a class="nav-link" href="konsumable.php">Daftar Barang Konsumable</a>
                                <a class="nav-link" href="angkut_apung.php">Daftar angkat angkut dan alat apung</a>
                                <a class="nav-link" href="transaksional.php">Form Peminjaman Barang</a>
                                <a class="nav-link" href="transaksional_kembali.php">Form Pengembalian Barang</a>
                                <a class="nav-link" href="mutasibarang.php">List Daftar Mutasi Barang</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <br>
    <br>
    <main>
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
                    <input type="text" value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>" class="form-control" placeholder="Cari" name="cari">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
            <br>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
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
                                $tanggalKembaliNull = "0000-00-00 00:00:00";
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
                                            if ($tanggalkembali === $tanggalKembaliNull) { 
                                                echo '<span class="badge text-bg-danger">Belum kembali</span>';
                                            } else if($jumlahrusak > 0){
                                                echo '<span class="badge text-bg-warning">Barang rusak/kurang lengkap</span>';
                                            } else {
                                                echo '<span class="badge text-bg-success">Sudah kembali</span>';
                                            }
                                            ?></td> 
                                </tr>
                            <?php
                            };
                            ?>
                        </tbody>
                    </table>
                    <!-- untuk query menampilkan tabel -->

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</html>