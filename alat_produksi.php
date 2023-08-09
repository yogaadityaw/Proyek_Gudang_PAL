<?php
require 'controller/alat_produksi_controller.php';
require 'cek.php';
require 'controller/koneksi.php';

$query = "SELECT * FROM alat_produksi";

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    // Anda sebaiknya membersihkan input untuk mencegah injeksi SQL
    // $keyword = mysqli_real_escape_string($conn, $keyword);

    // Ubah query SQL untuk menyertakan filter pencarian
    $query = "SELECT * FROM alat_produksi WHERE namabarang LIKE '%$keyword%' OR kodebarang LIKE '%$keyword%'";
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
    <title>Alat Produksi</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php include 'sidebar.php' ?>

<br>
<br>

<body>
    <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
        <div class="container-fluid px-4">
            <h3 class="mt-4 text-center">DAFTAR PERALATAN PENDUKUNG PRODUKSI DIVISI HARKAN 2023</h3>
        </div>
        <br>

        <div class="container -fluid">
            <div class="card-mb-4">
                <!-- button buat open modal-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah Stok
                </button>
                <a href="export.php" class="btn btn-info">Export Data</a>
                <br>
                <br>
                <form action="alat_produksi.php" method="GET">
                    <div class="input-group mb-3">
                        <!-- Search bar using Bootstrap -->
                        <input type="text" value="" class="form-control" placeholder="Cari" name="cari">
                        <button typ="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>

                <br>
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
                                <!-- untuk search-->

                                <!-- //"SELECT * FROM alat_produksi" -->


                                <?php
                                $i = 1;
                                $ambilsemuadatabarang = mysqli_query($conn, $query);
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
                                                        <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control form-control-lg" placeholder="Nama barang" require>

                                                        <label>Kode Barang</label>
                                                        <input type="text" name="kodebarang" value="<?= $kodebarang; ?>" class="form-control form-control-lg" placeholder="Kode barang" required>

                                                        <label>Jumlah</label>
                                                        <input type="number" name="jumlah" value="<?= $jumlah; ?>" class="form-control" placeholder="Jumlah" required>

                                                        <label>Barang Kondisi Baik</label>
                                                        <input type="number" name="barangbaik" value="<?= $barangbaik; ?>" class="form-control" placeholder="Barang Kondisi Baik" required>

                                                        <label>Barang Kondisi Rusak</label>
                                                        <input type="number" name="barangrusak" value="<?= $barangrusak; ?>" class="form-control" placeholder="Kondisi Barang Rusak" required>

                                                        <label>Keterangan</label>
                                                        <input type="text" name="keterangan" value="<?= $keterangan; ?>" class="form-control form-control-lg" placeholder="Keterangan" required>

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
                                    <div class="modal fade" id="delete<?= $idb; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-white">
                                                <!-- Modal Header -->
                                                <form method="post">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Stok Barang</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <!-- <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control form-control-lg" required>
                                                    <br>
                                                    <input type="text" name="namapengebon" value="<?= $namapengebon; ?>" class="form-control form-control-lg" required>
                                                    <br>
                                                    <input type="text" name="bengkel" value="<?= $bengkel; ?>" class="form-control form-control-lg" required>
                                                    <br>
                                                    <input type="number" name="jumlah" value="<?= $jumlah; ?>" class="form-control" required>
                                                    <br>
                                                    <input type="number" name="barangbaik" value="<?= $barangbaik; ?>" class="form-control" required>
                                                    <br>
                                                    <input type="number" name="barangrusak" value="<?= $barangrusak; ?>" class="form-control" required>
                                                    <br>
                                                    <input type="text" name="keterangan" value="<?= $keterangan; ?>" class="form-control form-control-lg" required>
                                                    <br> -->
                                                        apakah anda yakin ingin menghapus satu kolom ini?
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
    <!-- The Modal -->
    <form method="POST" action="alat_produksi.php">
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
                        <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" required>
                        <br>
                        <input type="number" class="form-control" placeholder="Kondisi Barang Baik" name="barangbaik" required>
                        <br>
                        <input type="number" class="form-control" placeholder="Kondisi Barang Rusak" name="barangrusak" required>
                        <br>
                        <input type="text" class="form-control form-control-lg" placeholder="Keterangan" name="keterangan" required>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="addnewbarangproduksi">Tambahkan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>