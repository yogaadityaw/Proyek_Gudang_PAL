<?php
// require 'controller/konsumable_controller.php';
require 'cek.php';
require 'controller/koneksi.php';
// require 'controller/update_controller.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Transaksional</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed bg-primary">
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
                                <a class="nav-link" href="transaksional.php">Form Transaksional Barang</a>
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
            <h3 class="mt-4 text-center" style="color: white;">Formulir Peminjaman dan Pengembalian Barang / Alat</h3>
        </div>
        <!--form peminjaman-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Form Peminjaman</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nama Peminjam</label>
                                        <input type="text" class="form-control" id="namapengebon" placeholder="Nama Peminjam">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>NIP</label>
                                        <input type="number" class="form-control" id="nip" placeholder="NIP">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" id="namabarang" placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Kode Barang">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Barang</label>
                                        <input type="number" class="form-control" id="jumlah" placeholder="Jumlah Barang">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Divisi/PT</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Divisi/PT">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" placeholder="Tanggal">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Kondisi Barang</label>
                                                <select id="inputState" class="form-control">
                                                    <option>Baik</option>
                                                    <option>Buruk</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Kode Peminjaman</label>
                                                <input type="text" class="form-control" id="kodepinjam">
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Form Pengembalian</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nama Peminjam</label>
                                        <input type="text" class="form-control" id="namapengebon" placeholder="Nama Peminjam">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>NIP</label>
                                        <input type="number" class="form-control" id="nip" placeholder="NIP">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" id="namabarang" placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Kode Barang">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Barang</label>
                                        <input type="number" class="form-control" id="jumlah" placeholder="Jumlah Barang">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Divisi/PT</label>
                                            <input type="text" class="form-control" id="divisi" placeholder="Divisi/PT">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" placeholder="Tanggal">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Kondisi Barang</label>
                                                <select id="inputState" class="form-control">
                                                    <option>Baik</option>
                                                    <option>Buruk</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Kode Peminjaman</label>
                                                <input type="text" class="form-control" id="kodepinjam">
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Sign in</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>

</html>

<!--jadi:
1. input nip langsung ada namanya bisa read only
2. nama barang bisa terlhat ketika kode barang di input seperti di model choose dibawah
3. jumlah barang ditampilkan yang kondisi baik
4. date dibikin setiap hari update
5. masih kurang paham kode peminjaman saran 2 digit kode barang, inisial peminjam dan tanggal peminjaman
6. disetiap tabel hilang nama pengebon kecuali di tabel pelaporan pencatatan rekap transaksi barang-->