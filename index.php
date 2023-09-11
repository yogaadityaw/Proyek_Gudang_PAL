<?php
require 'controller/koneksi.php';
require 'cek.php';
require 'middleware/auth_middleware.php';
require 'controller/berita_controller.php';

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
    <title>Divisi Harkan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .card-text {
            text-align: justify;
        }

        .announcement-card {
            max-width: 1500px;
            max-height: 400px;
            min-width: 300px;
            margin: 0 auto;
        }
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="/assets/img/logo_pal.png">
</head>

<?php include 'sidebar.php' ?>
<br>
<br>

<body>
    <div id="layoutSidenav_content">
        <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <br>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Peralatan Pendukung Produksi</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="alat_produksi.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Alat Komunikasi/(HT)</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="komunikasi.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Daftar Angkat Angkut dan Alat Apung</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="angkut_apung.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Daftar Barang Konsumable</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="konsumable.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Form Peminjaman Barang</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="transaksional.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Form Pengembalian Barang</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="transaksional_kembali.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">List Daftar Mutasi Barang</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="mutasibarang.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Manajemen Akun & Data Personil</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="user_manajemen.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-4 carousel-container mt-4">
                <div class="card text-center announcement-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <button id="prevBtn" class="btn btn-primary"><i class="fas fa-chevron-left"></i></button>
                            <h2>PENGUMUMAN</h2>
                            <button id="nextBtn" class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text mt-4"></p>
                    </div>
                    <!-- <div class="card-footer text-muted"> -->
                    <div class="card-footer mt-3">
                        <p class="text-dark tanggalberita"></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        const nextButton = document.getElementById("nextBtn");
        const prevButton = document.getElementById("prevBtn");
        let currentIndex = 0;
        let autoSlideInterval;
        const dataBerita = <?= $jsonDataBerita ?>;

        // Format tanggal
        function formatDate(dateString) {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', options);
        }

        // Menampilkan berita
        function displayBerita(index) {
            const berita = dataBerita[index];
            if (berita) {
                document.querySelector(".card-title").textContent = berita.judul_berita;
                document.querySelector(".card-text").textContent = berita.deskripsi_berita;
                const formattedDate = formatDate(berita.created_at)
                document.querySelector(".tanggalberita").textContent = formattedDate;
            } else {
                document.querySelector(".card-title").textContent = "Tidak ada berita";
                document.querySelector(".card-text").textContent = "Tidak ada berita";
                document.querySelector(".tanggalberita").textContent = "Tidak ada berita";
            }
        }

        // Fungsi next ketika tombol next ditekan
        function showNextBerita() {
            currentIndex++;
            if (currentIndex < dataBerita.length) {
                displayBerita(currentIndex);
            } else {
                nextBtn.disabled = true;
            }
            prevBtn.disabled = false;
            clearInterval(autoSlideInterval);
            startAutoSlide();
        };

        // Fungsi previous ketika tombol previous ditekan
        function showPrevBerita() {
            currentIndex--;
            if (currentIndex >= 0) {
                displayBerita(currentIndex);
            } else {
                prevBtn.disabled = true;
            }
            nextBtn.disabled = false;
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Auto slide card
        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                showNextBerita();
            }, 5000);
        }

        prevBtn.addEventListener("click", showPrevBerita);
        nextBtn.addEventListener("click", showNextBerita);
        window.addEventListener('load', () => {
            startAutoSlide();
        });

        displayBerita(currentIndex);

        if (currentIndex === 0) {
            prevBtn.disabled = true;
        }
        if (currentIndex === 5) {
            nextBtn.disabled = true;
        }
    </script>
</body>

</html>