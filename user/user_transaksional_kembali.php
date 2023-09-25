<?php
// require 'controller/konsumable_controller.php';
require '../controller/koneksi.php';
require '../controller/transaksi_kembali_controller.php';
require '../middleware/auth_middleware.php';
checkRole("user", '../middleware/auth_prohibit.php');

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
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="/assets/img/logo_pal.ico" type="image/x-icon">
    <link rel="icon" href="/assets/img/logo_pal.ico" type="image/x-icon">
</head>
<?php include 'user_sidebar.php' ?>
<br>
<br>

<body class="bg-success">
    <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
        <div class="container-fluid px-4">
            <h3 class="mt-4 text-center" style="color: white;">Formulir Pengembalian Barang / Alat</h3>
        </div>
        <!--form peminjaman-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Form Pengembalian</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <button type="button" class="btn btn-primary btn-md btn-block" name="kodepeminjaman" data-bs-toggle="modal" data-bs-target="#modalKodeTransaksi">
                                    Masukkan Kode Transaksi
                                </button>
                                <div class="form-row mt-2">
                                    <div class="form-group col-md-6">
                                        <label>NIP Pegawai</label>
                                        <input type="number" class="form-control" name="nip" id="nip" placeholder="NIP" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="disabledTextInput">Nama Barang</label>
                                    <input type="text" class="form-control" name="namabarang" id="namabarang" placeholder="Nama Barang" readonly>
                                </div>
                                <div class="form-row">
                                    <label for="disabledTextInput">Kode Barang</label>
                                    <input type="text" class="form-control" name="kodebarang" id="kodebarang" placeholder="Kode Barang" readonly>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Barang yang dipinjam</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Barang" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Barang baik</label>
                                        <input type="number" class="form-control" name="jumlahbaik" id="jumlahbaik" placeholder="Jumlah Barang baik">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Barang rusak</label>
                                        <input type="number" class="form-control" name="jumlahrusak" id="jumlahrusak" placeholder="Jumlah Barang Rusak">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Lokasi Barang yang dikembalikan</label>
                                        <input type="text" class="form-control" name="lokasikembali" id="lokasikembali" placeholder="Lokasi Barang yang dikembalikan">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggalkembali">Tanggal dan Jam Pengembalian</label>
                                            <input type="datetime-local" class="form-control" name="tanggalkembali" id="tanggalkembali" placeholder="Tanggal dan Jam kembali">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Kode Peminjaman</label>
                                            <input type="text" class="form-control" id="kodepinjam" name="kodepinjam" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="kembali">Kembalikan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </main>
    <div class="modal fade" id="modalKodeTransaksi" tabindex="-1" aria-labelledby="modalKodeTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKodeTransaksiLabel">Masukkan Kode Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control form-control-lg" placeholder="Kode Transaksi" name="kodeTransaksi" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
<script>
    $(document).ready(function() {
        // Event handler ketika tombol "Submit" pada modal kode transaksi ditekan
        $("#modalKodeTransaksi button.btn-primary").click(function() {
            var kodeTransaksi = $("input[name='kodeTransaksi']").val();

            // Lakukan permintaan AJAX ke server untuk mendapatkan data
            $.ajax({
                type: "POST",
                url: "../utils/get_keluar_masuk_barang.php", // Ganti dengan URL yang sesuai
                data: {
                    kodeTransaksi: kodeTransaksi
                },
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        alert(response.error); // Display error message
                    } else {
                        $("#nip").val(response.nip);
                        $("#namabarang").val(response.namabarang);
                        $("#kodebarang").val(response.kodebarang);
                        $("#jumlah").val(response.jumlahpinjam);
                        $("#lokasikembali").val(response.jumlahkembali);
                        $("#kodepinjam").val(response.kodetransaksi);
                        $("#modalKodeTransaksi").modal("hide");
                    }
                },
                error: function() {
                    // Menampilkan pesan jika terjadi kesalahan
                    alert("Terjadi kesalahan saat mengambil data.");
                }
            });
        });
    });
</script>
</body>

</html>

<!--jadi:
1. input nip langsung ada namanya bisa read only
2. nama barang bisa terlhat ketika kode barang di input seperti di model choose dibawah
3. jumlah barang ditampilkan yang kondisi baik
4. date dibikin setiap hari update
5. masih kurang paham kode peminjaman saran 2 digit kode barang, inisial peminjam dan tanggal peminjaman
6. disetiap tabel hilang nama pengebon kecuali di tabel pelaporan pencatatan rekap transaksi barang-->