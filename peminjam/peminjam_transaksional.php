<?php
// require 'controller/konsumable_controller.php';
require '../controller/koneksi.php';
require '../controller/transaksi_pinjam_controller.php';
require '../middleware/auth_middleware.php';
checkRole("peminjam", '../middleware/auth_prohibit.php');

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
</head>
<?php include 'peminjam_sidebar.php' ?>

<body class="bg-primary">
    <br>
    <br>
    <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
        <div class="container-fluid px-4">
            <h3 class="mt-4 text-center" style="color: white;">Formulir Peminjaman Barang / Alat</h3>
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
                            <form method="post">
                                <div class="form-row">
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP Pegawai</label>
                                        <input type="text" class="form-control" id="nip" name="nip" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label>Pilih Jenis Barang</label>
                                    <select class="form-control" name="jenisbarang" id="jenisbarang" onchange="loadNamaBarangpinjam()">
                                        <option value="" <?php echo isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === '' ? 'selected' : ''; ?>></option>
                                        <option value="Peralatan Pendukung Produksi" <?php echo isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === "Peralatan Pendukung Produksi" ? 'selected' : ''; ?>>Peralatan Pendukung Produksi</option>
                                        <option value="Alat Komunikasi" <?php echo isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === 'Alat Komunikasi' ? 'selected' : ''; ?>>Alat Komunikasi</option>
                                        <option value="Barang Konsumable" <?php echo isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === 'Barang Konsumable' ? 'selected' : ''; ?>>Barang Konsumable</option>
                                        <option value="Angkat, Angkut, Alat Apung" <?php echo isset($_POST['jenisbarang']) && $_POST['jenisbarang'] === 'Angkat, Angkut, Alat Apung' ? 'selected' : ''; ?>>Angkat, Angkut, Alat Apung</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <label>Nama Barang</label>
                                    <select class="form-control" name="namabarang" id="namabarang">
                                        <!-- Opsi pilihan nama barang akan diisi secara dinamis oleh JavaScript -->
                                    </select>
                                </div>
                                <!-- <div class="form-row">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="namabarang" id="namabarang" placeholder="Nama Barang">
                                </div> -->
                                <div class="form-row">
                                    <label for="disabledTextInput">Kode Barang</label>
                                    <input type="text" class="form-control" name="kodebarang" id="kodebarang" placeholder="Kode Barang" readonly style="background-color: #e9ecef;">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Barang</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Barang">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Lokasi Barang yang dipinjaman</label>
                                        <input type="text" class="form-control" name="lokasipinjam" id="lokasipinjam" placeholder="Lokasi barang yang dipinjam">
                                    </div>
                                </div>
                                    <div class="form-row">
                                        <!-- <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for=tanggal>Tanggal Peminjaman</label>
                                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
                                            </div> -->
                                        <!-- <div class="form-group col-md-4">
                                                <label for="inputState">Kondisi Barang</label>
                                                <select id="inputState" class="form-control">
                                                    <option>Baik</option>
                                                    <option>Buruk</option>
                                                </select>
                                            </div> -->
                                        <div class="form-group col-md-4">
                                            <label>Kode Peminjaman</label>
                                            <input type="text" class="form-control" id="kodepinjam" name="kodepinjam" readonly style="background-color: #e9ecef;">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="pinjam">Pinjam</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>

<script>
    function loadNamaBarangpinjam() {
        var jenisbarang = $("#jenisbarang").val();
        // untuk peralatan produksi 
        if (jenisbarang === "Peralatan Pendukung Produksi") {
            // Jika kategori "Peralatan Pendukung Produksi" dipilih, lakukan permintaan AJAX
            $.ajax({
                url: "../utils/get_kategori.php", // Ganti dengan URL yang mengambil data nama barang dari server
                method: "POST",
                data: {
                    jenisbarang: jenisbarang
                },
                success: function(response) {
                    // Proses respons dari server
                    var data = JSON.parse(response);
                    var dropdownNamaBarang = $("#namabarang");
                    dropdownNamaBarang.empty(); // Hapus semua opsi sebelumnya

                    // Tambahkan opsi nama barang ke dalam dropdown "namabarang"
                    for (var i = 0; i < data.length; i++) {
                        dropdownNamaBarang.append(new Option(data[i].namabarang));
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(error);
                },
            });
            //untuk alat komunikasi
        } else if (jenisbarang == "Alat Komunikasi") {
            // Jika kategori "alat komunikasi" dipilih, lakukan permintaan AJAX
            $.ajax({
                url: "../utils/get_kategori.php", // Ganti dengan URL yang mengambil data nama barang dari server
                method: "POST",
                data: {
                    jenisbarang: jenisbarang
                },
                success: function(response) {
                    // Proses respons dari server
                    var data = JSON.parse(response);
                    var dropdownNamaBarang = $("#namabarang");
                    dropdownNamaBarang.empty(); // Hapus semua opsi sebelumnya

                    // Tambahkan opsi nama barang ke dalam dropdown "namabarang"
                    for (var i = 0; i < data.length; i++) {
                        dropdownNamaBarang.append(new Option(data[i].namabarang));
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(error);
                },
            });

        } else if (jenisbarang == "Barang Konsumable") {
            // Jika kategori "alat komunikasi" dipilih, lakukan permintaan AJAX
            $.ajax({
                url: "../utils/get_kategori.php", // Ganti dengan URL yang mengambil data nama barang dari server
                method: "POST",
                data: {
                    jenisbarang: jenisbarang
                },
                success: function(response) {
                    // Proses respons dari server
                    var data = JSON.parse(response);
                    var dropdownNamaBarang = $("#namabarang");
                    dropdownNamaBarang.empty(); // Hapus semua opsi sebelumnya

                    // Tambahkan opsi nama barang ke dalam dropdown "namabarang"
                    for (var i = 0; i < data.length; i++) {
                        dropdownNamaBarang.append(new Option(data[i].namabarang));
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(error);
                },
            });

        } else if (jenisbarang == "Angkat, Angkut, Alat Apung") {
            // Jika kategori "Angkat, Apung, Alat Apung" dipilih, lakukan permintaan AJAX
            $.ajax({
                url: "../utils/get_kategori.php", // Ganti dengan URL yang mengambil data nama barang dari server
                method: "POST",
                data: {
                    jenisbarang: jenisbarang
                },
                success: function(response) {
                    // Proses respons dari server
                    var data = JSON.parse(response);
                    var dropdownNamaBarang = $("#namabarang");
                    dropdownNamaBarang.empty(); // Hapus semua opsi sebelumnya

                    // Tambahkan opsi nama barang ke dalam dropdown "namabarang"
                    for (var i = 0; i < data.length; i++) {
                        dropdownNamaBarang.append(new Option(data[i].namabarang));
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error(error);
                },
            });

        } else {
            // Jika kategori lain dipilih, hapus opsi dari dropdown "namabarang"
            var dropdownNamaBarang = $("#namabarang");
            dropdownNamaBarang.empty();
        }
    }

    //readn only kode barang
    function setKodeBarang() {
        var jenisbarang = $("#jenisbarang").val();
        var namabarang = $("#namabarang").val();

        // Lakukan permintaan AJAX untuk mendapatkan kode barang berdasarkan jenis barang dan nama barang
        $.ajax({
            url: "../utils/get_kodebarang.php", // Ganti dengan URL yang mengambil kode barang dari server berdasarkan jenis dan nama barang
            method: "POST",
            data: {
                jenisbarang: jenisbarang,
                namabarang: namabarang
            },
            success: function(response) {
                // Proses respons dari server
                var kodebarang = response; // Anggap respons dari server adalah kode barang yang sesuai
                $("#kodebarang").val(kodebarang); // Isi nilai input kode barang dengan kode barang yang didapatkan
                console.log(kodebarang);
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan jika ada
                console.error(error);
            },
        });
    }

    // Panggil fungsi setKodeBarang() ketika pilihan nama barang berubah
    $("#namabarang").on("change", function() {
        setKodeBarang();
    });

    // *Get kode transaksi
    function getNextKodeTransaksi() {
        $.ajax({
            url: "../utils/get_kodetransaksi.php", // Ganti dengan URL yang mengambil nomor terakhir dari kolom kodetransaksi
            method: "GET",
            success: function(response) {
                // Proses respons dari server (nomor berikutnya)
                var nextKodeTransaksi = response; // Konversi menjadi angka
                $("#kodepinjam").val(nextKodeTransaksi); // Isi nilai input kodepinjam dengan nomor berikutnya
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan jika ada
                console.error(error);
            },
        });
    }

    // Panggil fungsi untuk mengisi input kodepinjam saat halaman dimuat
    $(document).ready(function() {
        getNextKodeTransaksi();
    });

    // untuk memanggil nip dan juga nama pegawai

    function loadnip() {
        $(document).ready(function() {
            $("#nip").on("input", function() {
                const nip = $(this).val();
                if (nip !== "") {
                    $.ajax({
                        url: "../utils/get_pegawai.php", // Ganti dengan URL yang sesuai untuk mengambil data nama pegawai
                        method: "POST",
                        data: {
                            nip: nip
                        },
                        success: function(response) {
                            $("#namapegawai").val(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching employee name:", error);
                        },
                    });
                } else {
                    $("#namapegawai").val("");
                }
            });
        });
    }
</script>
<!-- untuk menyimpan dan menampikan data nip dan nama pegawai -->
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const nipInput = document.getElementById("nip");
        const namaPegawaiInput = document.getElementById("namapegawai");

        nipInput.addEventListener("input", function() {
            const nip = nipInput.value.trim();
            if (nip !== "") {
                fetch("get_employee_name.php?nip=" + nip)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            namaPegawaiInput.value = data.nama_pegawai;
                        } else {
                            namaPegawaiInput.value = "";
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching employee name:", error);
                    });
            } else {
                namaPegawaiInput.value = "";
            }
        });
    });
</script> -->




</body>

</html>

<!--jadi:
1. input nip langsung ada namanya bisa read only
2. nama barang bisa terlhat ketika kode barang di input seperti di model choose dibawah
3. jumlah barang ditampilkan yang kondisi baik
4. date dibikin setiap hari update
5. masih kurang paham kode peminjaman saran 2 digit kode barang, inisial peminjam dan tanggal peminjaman
6. disetiap tabel hilang nama pengebon kecuali di tabel pelaporan pencatatan rekap transaksi barang-->