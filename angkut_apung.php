<?php
require 'controller/angkut_apung_controller.php';
require 'cek.php';
require 'controller/koneksi.php';

$query = "SELECT * FROM barang_angkut_apung";

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    // Anda sebaiknya membersihkan input untuk mencegah injeksi SQL
    // $keyword = mysqli_real_escape_string($conn, $keyword);

    // Ubah query SQL untuk menyertakan filter pencarian
    $query = "SELECT * FROM barang_angkut_apung WHERE namabarang LIKE '%$keyword%' OR kodebarang LIKE '%$keyword%'";
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Alat Produksi</title>
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
            <h3 class="mt-4 text-center">DAFTAR FASILITAS ALAT ANGKAT, ANGKUT dan APUNG DIVISI HARKAN 2023</h3>
        </div>
        <br>
        <div class="container -fluid">
            <div class="card-mb-4">
                <!-- button buat open modal-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah Stok
                </button>
                <a href="export_angkut_apung.php" class="btn btn-info">Export Data</a>
                <br>
                <br>

                <form action="angkut_apung.php" method="GET">
                    <div class="input-group mb-3">
                        <!-- Search bar using Bootstrap -->
                        <input type="text" value="" class="form-control" placeholder="Cari" name="cari">
                        <br>
                        <button type="submit" class="btn btn-primary" >Cari</button>
                    </div>
                </form>

                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang / Alat</th>
                                    <th>Kode Barang</th>
                                    <th>Jumlah</th>
                                    <th>Kondisi Barang Baik</th>
                                    <th>Kondisi Barang Rusak</th>
                                    <th>keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                $ambilsemuadatabarang = mysqli_query($conn,$query);
                                while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {
                                    $namabarang = $data['namabarang'];
                                    $kodebarang = $data['kodebarang'];
                                    $jumlah = $data['jumlah'];
                                    $barangbaik = $data['baik'];
                                    $barangrusak = $data['rusak'];
                                    $keterangan = $data['keterangan'];
                                    $idb = $data['idbarang'];
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $namabarang ?></td>
                                        <td><?= $kodebarang ?></td>
                                        <td><?= $jumlah ?></td>
                                        <td><?= $barangbaik ?></td>
                                        <td><?= $barangrusak ?></td>
                                        <td><?= $keterangan ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $idb; ?>">
                                                Update
                                            </button>
                                            <!-- <input type="hidden" name="idbarangyangmaudihapus" value="<?= $idb; ?>"> -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $idb; ?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Update Modal -->
                                    <div class="modal fade" id="edit<?= $idb; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-white">
                                                <!-- Modal Header -->
                                                <form method="post">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Stok Barang</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <label>Nama Barang</label>
                                                        <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control form-control-lg" placeholder="Nama Barang" required>
                                                        <br>
                                                        <label>Kode Barang</label>
                                                        <input type="text" name="kodebarang" value="<?= $kodebarang; ?>" class="form-control form-control-lg" placeholder="Kode Barang" required>
                                                        <br>
                                                        <label>Jumlah</label>
                                                        <input type="number" name="jumlah" value="<?= $jumlah; ?>" class="form-control" placeholder="Jumlah" required>
                                                        <br>
                                                        <label>Barang Kondisi Baik</label>
                                                        <input type="number" name="barangbaik" value="<?= $barangbaik; ?>" class="form-control" placeholder="Barang Kondisi Baik" required>
                                                        <br>
                                                        <label>Barang Kondisi Rusak</label>
                                                        <input type="number" name="barangrusak" value="<?= $barangrusak; ?>" class="form-control" placeholder="Barang Kondisi Rusak" required>
                                                        <br>
                                                        <label>Keterangan</label>
                                                        <input type="text" name="keterangan" value="<?= $keterangan; ?>" class="form-control form-control-lg" placeholder="Keterangan" required>
                                                        <br>
                                                        <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-warning" data-bs-dismiss="modal" name="updatebarang">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $idb; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-white">
                                                <!-- Modal Header -->
                                                <form method="post">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Stok Barang</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <!-- <input type="text" name="namabarang" value="<?= $namabarang ?>" class="form-control form-control-lg" required>
                                                    <br>
                                                    <input type="number" name="jumlah" value="<?= $jumlah ?>" class="form-control form-control-lg" required>
                                                    <br>
                                                    <input type="number" name="barangbaik" value="<?= $barangbaik ?>" class="form-control form-control-lg" required>
                                                    <br>
                                                    <input type="number" name="barangrusak" value="<?= $barangrusak ?>" class="form-control form-control-lg" required>
                                                    <br>
                                                    <input type="text" name="keterangan" value="<?= $keterangan ?>" class="form-control form-control-lg" required>
                                                    <br> -->
                                                        apakah anda yakin ingin menghapus satu kolom ini?
                                                        <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="hapusbarang">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                };
                                ?>
                            </tbody>
                        </table>
    </main>
    <!-- The Modal -->
    <form method="POST" action="angkut_apung.php">
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Stok Barang</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" class="form-control form-control-lg" placeholder="Nama Barang" name="namabarang" required>
                        <br>
                        <input type="text" class="form-control form-control-lg" placeholder="kode Barang" name="kodebarang" required>
                        <br>
                        <input type="number" class="form-control form-control-lg" placeholder="Jumlah" name="jumlah" required>
                        <br>
                        <input type="number" class="form-control form-control-lg" placeholder="Kondisi Barang Baik" name="barangbaik" required>
                        <br>
                        <input type="number" class="form-control form-control-lg" placeholder="Kondisi Barang Rusak" name="barangrusak" required>
                        <br>
                        <input type="text" class="form-control form-control-lg" placeholder="Keterangan" name="keterangan" required>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="addnewbarangangkut">Tambahkan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</html>