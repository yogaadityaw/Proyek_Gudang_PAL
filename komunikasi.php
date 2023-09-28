<?php
require 'controller/komunikasi_controller.php';
require 'cek.php';
require 'controller/koneksi.php';
require 'middleware/auth_middleware.php';

checkRole("admin", 'middleware/auth_prohibit.php');

$query = "SELECT * FROM komunikasi";

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    // Anda sebaiknya membersihkan input untuk mencegah injeksi SQL
    // $keyword = mysqli_real_escape_string($conn, $keyword);

    // Ubah query SQL untuk menyertakan filter pencarian
    $query = "SELECT * FROM komunikasi WHERE namabarang LIKE '%$keyword%' OR noseri LIKE '%$keyword%' OR lokasi LIKE '%$keyword%'";
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
    <title>Alat Komunikasi</title>
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
            <h3 class="mt-4 text-center">DAFTAR ALAT KOMUNIKASI / (HT) DIVISI HARKAN</h3>
        </div>

        <div class="container -fluid">
            <div class="card-mb-4">
                <!-- button buat open modal-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah Stok
                </button>
                <a href="export_komunikasi.php" class="btn btn-info">Export Data</a>
                <br>
                <br>
                <form action="komunikasi.php" method="GET">
                    <div class="input-group mb-3">
                        <!-- Search bar using Bootstrap -->
                        <input type="text" value="" class="form-control" placeholder="Cari" name="cari">
                        <br>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
                <br>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="table-info text-center align-middle">No</th>
                                    <th class="table-info text-center align-middle">Nama Barang / Alat</th>
                                    <th class="table-info text-center align-middle">No. Seri</th>
                                    <th class="table-info text-center align-middle">Jumlah</th>
                                    <th class="table-info text-center align-middle">Kondisi Barang Baik</th>
                                    <th class="table-info text-center align-middle">Kondisi Barang Rusak</th>
                                    <th class="table-info text-center align-middle">lokasi</th>
                                    <th class="table-info text-center align-middle">action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                $ambilsemuadatabarang = mysqli_query($conn, $query);
                                while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {

                                    $namabarang = $data['namabarang'];
                                    $noseri = $data['noseri'];
                                    $jumlah = $data['jumlah'];
                                    $barangbaik = $data['baik'];
                                    $barangrusak = $data['rusak'];
                                    $lokasi = $data['lokasi'];
                                    $idb = $data['idbarang'];
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="text-align: center;"><?= $namabarang ?></td>
                                        <td style="text-align: center;"><?= $noseri ?></td>
                                        <td style="text-align: center;"><?= $jumlah ?></td>
                                        <td style="text-align: center;"><?= $barangbaik ?></td>
                                        <td style="text-align: center;"><?= $barangrusak ?></td>
                                        <td style="text-align: center;"><?= $lokasi ?></td>
                                        <td style="text-align: center;">
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
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Stok Barang</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method=post>
                                                    <div class="modal-body">
                                                        <label>Nama Barang</label>
                                                        <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control form-control-lg" placeholder="Nama Barang">

                                                        <label>Nomor Seri</label>
                                                        <input type="text" name="noseri" value="<?= $noseri; ?>" class="form-control form-control-lg" placeholder="Nomor Seri">

                                                        <label>Jumlah</label>
                                                        <input type="number" name="jumlah" value="<?= $jumlah; ?>" class="form-control" placeholder="Jumlah">

                                                        <label>Barang Kondisi Baik</label>
                                                        <input type="number" name="barangbaik" value="<?= $barangbaik; ?>" class="form-control" placeholder="Barang Kondisi Baik">

                                                        <label>Barang Kondisi Rusak</label>
                                                        <input type="number" name="barangrusak" value="<?= $barangrusak; ?>" class="form-control" placeholder="Barang Kondisi Rusak">

                                                        <label>lokasi</label>
                                                        <input type="text" name="lokasi" value="<?= $lokasi; ?>" class="form-control form-control-lg" placeholder="lokasi">

                                                        <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-warning" name="updatebarang">simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="Delete<?= $idb; ?>">
                                        <div class="modal-dia class=" table-info text-center align-middle>
                                            <div class="modal-content bg-white">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Stok Barang</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method=post>
                                                    <div class="modal-body">
                                                        <!-- <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control form-control-lg">
                                                        <br>
                                                        <input type="text" name="noseri" value="<?= $noseri; ?>" class="form-control form-control-lg">
                                                        <br>
                                                        <input type="text" name="namapengebon" value="<?= $namapengebon; ?>" class="form-control form-control-lg">
                                                        <br>
                                                        <input type="number" name="jumlah" value="<?= $jumlah; ?>" class="form-control">
                                                        <br>
                                                        <input type="number" name="barangbaik" value="<?= $barangbaik; ?>" class="form-control">
                                                        <br>
                                                        <input type="number" name="barangrusak" value="<?= $barangrusak; ?>" class="form-control">
                                                        <br>
                                                        <input type="text" name="lokasi" value="<?= $lokasi; ?>" class="form-control form-control-lg">
                                                        <br> -->
                                                        apakah anda yakin ingin menghapus satu kolom ini ?
                                                        <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" name="hapusbarang">hapus</button>
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
    <form method="POST" action="komunikasi.php">
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
                        <input type="text" class="form-control form-control-lg" placeholder="Nama Barang" name="namabarang">
                        <br>
                        <input type="text" class="form-control form-control-lg" placeholder="Nomor Seri" name="noseri">
                        <br>
                        <input type="number" class="form-control" placeholder="Jumlah" name="jumlah">
                        <br>
                        <input type="number" class="form-control" placeholder="Kondisi Barang Baik" name="barangbaik">
                        <br>
                        <input type="number" class="form-control" placeholder="Kondisi Barang Rusak" name="barangrusak">
                        <br>
                        <input type="text" class="form-control form-control-lg" placeholder="lokasi" name="lokasi">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="addnewbarangkomunikasi">Tambahkan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>