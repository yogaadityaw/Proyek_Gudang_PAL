<?php
require 'controller/konsumable_controller.php';
require 'cek.php';
require 'controller/koneksi.php';
require 'middleware/auth_middleware.php';

checkRole("admin", 'middleware/auth_prohibit.php');

$query = "SELECT * FROM barang_konsumable";

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    // Anda sebaiknya membersihkan input untuk mencegah injeksi SQL
    // $keyword = mysqli_real_escape_string($conn, $keyword);

    // Ubah query SQL untuk menyertakan filter pencarian
    $query = "SELECT * FROM barang_konsumable WHERE namabarang LIKE '%$keyword%' OR kodebarang LIKE '%$keyword%' OR lokasi LIKE '%$keyword%'";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Barang Konsumable</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/assets/img/logo_pal.ico" type="image/x-icon">
    <link rel="icon" href="/assets/img/logo_pal.ico" type="image/x-icon">
</head>
<?php include 'sidebar.php' ?>

<body>
    <br>
    <br>
    <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">

        <div class="container-fluid px-4">
            <h3 class="mt-4 text-center">DAFTAR BARANG KONSUMABLE DIVISI HARKAN</h3>

        </div>
        <br>

        <div class="container -fluid">
            <div class="card-mb-4">
                <!-- button buat open modal-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah Stok
                </button>
                <a href="export_konsumable.php" class="btn btn-info">Export Data</a>

                <br>
                <br>
                <form action="konsumable.php" method="GET">
                    <div class="input-group mb-3">
                        <!-- Search bar using Bootstrap -->
                        <input type="text" value="" class="form-control" placeholder="Cari" name="cari">
                        <br>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>


                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="table-info text-center align-middle">No</th>
                                    <th class="table-info text-center align-middle">Nama Barang / Alat</th>
                                    <th class="table-info text-center align-middle">Kode Barang</th>
                                    <th class="table-info text-center align-middle">Jumlah</th>
                                    <th class="table-info text-center align-middle">lokasi</th>
                                    <th class="table-info text-center align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <br>
                                <?php
                                $i = 1;
                                $ambilsemuadatabarang = mysqli_query($conn, $query);
                                while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {
                                    $namabarang = $data['namabarang'];
                                    $kodebarang = $data['kodebarang'];
                                    $jumlah = $data['jumlah'];
                                    $lokasi = $data['lokasi'];
                                    $idb = $data['idbarang'];
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="text-align: center;"><?= $namabarang ?></td>
                                        <td style="text-align: center;"><?= $kodebarang ?></td>
                                        <td style="text-align: center;"><?= $jumlah ?></td>
                                        <td style="text-align: center;"><?= $lokasi ?></td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $idb; ?>">
                                                Update
                                            </button>
                                            <!-- <input type="hidden" name="idbarangyangmaudihapus" value="<?= $idb; ?>"> -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete<?= $idb; ?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Update Modal -->
                                    <div class="modal fade" id="edit<?= $idb; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-white">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Stok Barang</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <label>Nama Barang</label>
                                                        <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control from-control-lg" placeholder="Nama Barang">
                                                        <br>
                                                        <label>Kode Barang</label>
                                                        <input type="text" name="kodebarang" value="<?= $kodebarang; ?>" class="form-control from-control-lg" placeholder="Kode Barang">
                                                        <br>
                                                        <label>Jumlah</label>
                                                        <input type="number" name="jumlah" value="<?= $jumlah; ?>" class="form-control" placeholder="Jumlah">
                                                        <br>
                                                        <label>lokasi</label>
                                                        <input type="text" name="lokasi" value="<?= $lokasi; ?>" class="form-control from-control-lg" placeholder="lokasi">
                                                        <br>
                                                        <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-warning" name="updatebarang">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="Delete<?= $idb; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-white">
                                                <!-- Modal Header -->

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Stok Barang</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <!-- <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control from-control-lg">
                                                <br>
                                                <input type="number" class="form-control form-control-lg" placeholder="Jumlah" name="jumlah"> 
                                                <br>
                                                <input type="text" name="lokasi" value="<?= $lokasi; ?>" class="form-control from-control-lg"> -->
                                                        Apakah Anda yakin ingin menghapus <?= $namabarang; ?> ?
                                                        <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    </div>


                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
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
</body>
<!-- The Modal -->
<form method="POST" action="konsumable.php">
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
                    <label>Nama Barang</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Nama Barang" name="namabarang">
            
                    <label>Kode Barang</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Kode Barang" name="kodebarang">
                
                    <label>Jumlah</label>
                    <input type="number" class="form-control form-control-lg" placeholder="Jumlah" name="jumlah">
                    
                    <label>Lokasi</label>
                    <input type="text" class="form-control form-control-lg" placeholder="lokasi" name="lokasi">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="addnewbarangkonsumable">Tambahkan</button>
                </div>

            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>

</html>