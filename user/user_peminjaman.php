<?php



require '../controller/koneksi.php';
require '../controller/mutasi_controller.php';
require '../middleware/auth_middleware.php';

checkRole("user", 'middleware/auth_prohibit.php');

$query = "SELECT * FROM keluar_masuk_barang";

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    // Anda sebaiknya membersihkan input untuk mencegah injeksi SQL
    $keyword = mysqli_real_escape_string($conn, $keyword);

    // Ubah query SQL untuk menyertakan filter pencarian
    $query = "SELECT * FROM keluar_masuk_barang WHERE namabarang LIKE '%$keyword%' OR kodebarang LIKE '%$keyword%'";
}
$searchTerm = isset($_GET['cari']) ? $_GET['cari'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pengajuan Peminjaman</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        .button-container {
            display: flex;
            justify-content: space-between;
            /* Ini akan menjaga tombol agar sejajar kanan-kiri */
            align-items: center;
            /* Ini akan menjaga tombol agar berada pada tengah-tengah vertikal */
            gap: 10px;
            /* Jarak antara tombol */
        }
    </style>

</head>
<?php include 'user_sidebar.php' ?>
<br>
<br>
<main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
    <div class="container-fluid px-4">
        <h3 class="mt-4 text-center">List Permohonan Peminjaman Barang</h3>
    </div>
    <div class="container -fluid">
        <br>
        <br>
        <form action="user_peminjaman.php" method="GET">
            <div class="input-group mb-3">
                <!-- Search bar using Bootstrap -->
                <input type="text" class="form-control" placeholder="Cari" name="cari" value="<?= $searchTerm ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <div class="card-body">
            <div class="table table-responsive">
                <table class="table table-bordered" id="dataTable" width="100" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-info text-center align-middle">Tanggal Pinjam</th>
                            <th class="table-info text-center align-middle">Tanggal Kembali</th>
                            <th class="table-info text-center align-middle">kode transaksi</th>
                            <th class="table-info text-center align-middle">NIP Pegawai</th>
                            <th class="table-info text-center align-middle">Nama Pegawai</th>
                            <th class="table-info text-center align-middle">Biro/Bengkel</th>
                            <th class="table-info text-center align-middle">Nama Barang & Kode Barang</th>
                            <th class="table-info text-center align-middle">Kode Barang </th>
                            <th class="table-info text-center align-middle">Jumlah/Unit Pinjam</th>
                            <th class="table-info text-center align-middle">Jumlah barang Kembali</th>
                            <th class="table-info text-center align-middle">Jumlah barang rusak</th>
                            <th class="table-info text-center align-middle">Lokasi Peminjaman</th>
                            <th class="table-info text-center align-middle">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($searchTerm)) {
                            $searchResults = searchMutasiBarang($conn, $searchTerm);
                            while ($data = mysqli_fetch_array($searchResults)) {
                                $idtransaksi = $data['idtransaksi'];
                                $tanggalpinjam = $data['tanggal'];
                                $tanggalkembali = $data['tanggalkembali'];
                                $kodetransaksi = $data['kodetransaksi'];
                                $nip = $data['nip'];
                                $namabarang = $data['namabarang'];
                                $kodebarang = $data['kodebarang'];
                                $jumlahpinjam = $data['jumlahpinjam'];
                                $jumlahkembali = $data['jumlahkembali'];
                                $jumlahrusak = $data['jumlahrusak'];
                                $lokasi = $data['lokasi'];
                                $status = $data['status'];
                                $tanggalKembaliNull = "0000-00-00 00:00:00";

                                // Ambil nama pegawai
                                $query_pegawai = "SELECT users.nama_user
                        FROM users
                        WHERE users.nip_user = '$nip'";
                                $result_pegawai = mysqli_query($conn, $query_pegawai);
                                $namapegawai = "-";
                                if ($result_pegawai) {
                                    $row_pegawai = mysqli_fetch_assoc($result_pegawai);
                                    $namapegawai = $row_pegawai['nama_user'];
                                }

                                // Ambil nama divisi
                                $query_divisi = "SELECT divisi.namadivisi
                        FROM users
                        INNER JOIN divisi ON users.divisi_id = divisi.iddivisi
                        WHERE users.nip_user = '$nip'";
                                $result_divisi = mysqli_query($conn, $query_divisi);
                                $namadivisi = "-";
                                if ($result_divisi) {
                                    $row_divisi = mysqli_fetch_assoc($result_divisi);
                                    $namadivisi = $row_divisi['namadivisi'];
                                }
                        ?>
                                <tr class="centered-cell">
                                    <td class="centered-cell"> <?= $tanggalpinjam ?></td>
                                    <td class="centered-cell"> <?= $tanggalkembali ?></td>
                                    <td class="centered-cell"> <?= $kodetransaksi ?></td>
                                    <td class="centered-cell"> <?= $nip ?></td>
                                    <td class="centered-cell"> <?= $namapegawai ?></td>
                                    <td class="centered-cell"> <?= $namadivisi ?></td>
                                    <td class="centered-cell"> <?= $namabarang ?></td>
                                    <td class="centered-cell"> <?= $kodebarang ?></td>
                                    <td class="centered-cell"> <?= $jumlahpinjam ?></td>
                                    <td class="centered-cell"> <?= $jumlahkembali ?></td>
                                    <td class="centered-cell"> <?= $jumlahrusak ?></td>
                                    <td class="centered-cell"> <?= $lokasi ?></td>
                                    <td class="centered-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $idtransaksi ?>">Lihat Detail</button>
                                    </td>
                                </tr>
                                <!-- EDIT LAGI MODAL -->
                                <div class="modal fade" id="modal<?= $idtransaksi; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-white">
                                            <!-- Modal Header -->
                                            <form method="post">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Aksi</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="button-container">
                                                        <button type="submit" class="btn btn-success" name="approve">Approve</button>
                                                        <button type="submit" class="btn btn-danger" name="disaprove">Tolak</button>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning" name="updatebarang">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM keluar_masuk_barang WHERE isApproved = false");
                            while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                $idtransaksi = $data['idtransaksi'];
                                $tanggalpinjam = $data['tanggal'];
                                $tanggalkembali = $data['tanggalkembali'];
                                $kodetransaksi = $data['kodetransaksi'];
                                $nip = $data['nip'];
                                $namabarang = $data['namabarang'];
                                $kodebarang = $data['kodebarang'];
                                $jumlahpinjam = $data['jumlahpinjam'];
                                $jumlahkembali = $data['jumlahkembali'];
                                $jumlahrusak = $data['jumlahrusak'];
                                $lokasi = $data['lokasi'];
                                $status = $data['status'];
                                $tanggalKembaliNull = "0000-00-00 00:00:00";

                                // Ambil nama pegawai
                                $query_pegawai = "SELECT users.nama_user
                        FROM users
                        WHERE users.nip_user = '$nip'";
                                $result_pegawai = mysqli_query($conn, $query_pegawai);
                                $namapegawai = "-";
                                if ($result_pegawai) {
                                    $row_pegawai = mysqli_fetch_assoc($result_pegawai);
                                    $namapegawai = $row_pegawai['nama_user'];
                                }

                                // Ambil nama divisi
                                $query_divisi = "SELECT divisi.namadivisi
                        FROM users
                        INNER JOIN divisi ON users.divisi_id = divisi.iddivisi
                        WHERE users.nip_user = '$nip'";
                                $result_divisi = mysqli_query($conn, $query_divisi);
                                $namadivisi = "-";
                                if ($result_divisi) {
                                    $row_divisi = mysqli_fetch_assoc($result_divisi);
                                    $namadivisi = $row_divisi['namadivisi'];
                                }
                            ?>

                                <tr class="centered-cell">
                                    <td class="centered-cell"> <?= $tanggalpinjam ?></td>
                                    <td class="centered-cell"> <?= $tanggalkembali ?></td>
                                    <td class="centered-cell"> <?= $kodetransaksi ?></td>
                                    <td class="centered-cell"> <?= $nip ?></td>
                                    <td class="centered-cell"> <?= $namapegawai ?></td>
                                    <td class="centered-cell"> <?= $namadivisi ?></td>
                                    <td class="centered-cell"> <?= $namabarang ?></td>
                                    <td class="centered-cell"> <?= $kodebarang ?></td>
                                    <td class="centered-cell"> <?= $jumlahpinjam ?></td>
                                    <td class="centered-cell"> <?= $jumlahkembali ?></td>
                                    <td class="centered-cell"> <?= $jumlahrusak ?></td>
                                    <td class="centered-cell"> <?= $lokasi ?></td>
                                    <td class="centered-cell">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $idtransaksi ?>">Lihat Detail</button>
                                    </td>
                                </tr>
                                <!-- EDIT LAGI MODAL -->
                                <div class="modal fade" id="modal<?= $idtransaksi; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-white">
                                            <!-- Modal Header -->
                                            <form method="post">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Aksi</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="button-container">
                                                        <button type="submit" class="btn btn-success" name="approve">Approve</button>
                                                        <button type="submit" class="btn btn-danger" name="disaprove">Tolak</button>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning" name="updatebarang">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>

</html>