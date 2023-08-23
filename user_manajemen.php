<?php
require 'cek.php';
require 'controller/koneksi.php';
require 'controller/user_manajemen_controller.php';
require 'middleware/auth_middleware.php';

checkRole("admin", 'middleware/auth_prohibit.php');

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
    <style>
        .form-select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
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
                                    <th class="table-info text-center align-middle">No</th>
                                    <th class="table-info text-center align-middle">NIP</th>
                                    <th class="table-info text-center align-middle">Nama</th>
                                    <th class="table-info text-center align-middle">Role</th>
                                    <th class="table-info text-center align-middle">Divisi</th>
                                    <th class="table-info text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'controller/koneksi.php';
                                $query = "SELECT nip_user, nama_user, role_id FROM users";
                                $i = 1;
                                $ambilSemuaUser = mysqli_query($conn, $query);
                                while ($data = mysqli_fetch_array($ambilSemuaUser)) {
                                    $nip = $data['nip_user'];
                                    $nama = $data['nama_user'];
                                    $role = $data['role_id'];
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="text-align: center;"><?= $nip ?></td>
                                        <td style="text-align: center;"><?= $nama ?></td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($role == 1) {
                                                echo "Admin";
                                            } else if ($role == 2) {
                                                echo "User";
                                            } else if ($role == 3) {
                                                echo "Atasan";
                                            } else if ($role == 4) {
                                                echo "Peminjam";
                                            } else {
                                                echo "User tidak diketahui";
                                            }
                                            ?></td>
                                        <td style="text-align: center;">
                                            <?php
                                            // Query untuk mengambil nama divisi
                                            $queryDivisi = "SELECT d.namadivisi FROM divisi d INNER JOIN users u ON d.iddivisi = u.divisi_id WHERE u.nip_user = '$nip'";
                                            $resultDivisi = mysqli_query($conn, $queryDivisi);

                                            if ($resultDivisi && mysqli_num_rows($resultDivisi) > 0) {
                                                $rowDivisi = mysqli_fetch_assoc($resultDivisi);
                                                echo $rowDivisi['namadivisi'];
                                            } else {
                                                echo "Tidak ada data divisi";
                                            }
                                            ?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#delete<?= $nip; ?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $nip; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-white">
                                                <!-- Modal Header -->
                                                <form method="post">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Akun</h4>
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
                                                        <input type="hidden" name="nip" value="<?= $nip; ?>">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" name="hapusakun">Hapus</button>
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
                            <input type="text" class="form-control form-control-lg" placeholder="Nama" name="nama" required>
                            <br>
                            <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                            <br>
                            <input type="password" class="form-control form-control-lg" placeholder="Masukkan password kembali" name="password2" required>
                            <br>
                            <select class="form-select" name="role" required>
                                <option value="" selected disabled>Pilih Role</option>
                                <option value="2">User</option>
                                <option value="3">Atasan</option>
                                <option value="4">Peminjam</option>
                            </select>
                            <br>
                            <select class="form-select" name="divisi" id="divisi" required>
                                <?php echo $divisiOptions; ?>
                            </select>
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
</body>

</html>