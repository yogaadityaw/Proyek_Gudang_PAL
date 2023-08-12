<?php
require 'cek.php';
require 'controller/koneksi.php';
require 'controller/user_manajemen_controller.php';


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
            <h3 class="mt-4 text-center">MANAJEMEN USER</h3>
        </div>
        <br>

        <div class="container -fluid">
            <div class="card-mb-4">
                <!-- button buat open modal-->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah User
                </button>
                <br>
                <br>
                <br>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT NIP FROM login";
                                $i = 1;
                                $ambilSemuaUser = mysqli_query($conn, $query);
                                while ($data = mysqli_fetch_array($ambilSemuaUser)) {
                                    $nip = $data['NIP'];

                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $nip ?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $idb; ?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
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
    <form method="POST">
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah User</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <form method="post">
                        <div class="modal-body">
                            <input type="text" class="form-control form-control-lg" placeholder="NIP" name="nip" required>
                            <br>
                            <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                            <br>
                            <input type="password" class="form-control form-control-lg" placeholder="Masukkan password kembali" name="password2" required>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="tambahUser">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>