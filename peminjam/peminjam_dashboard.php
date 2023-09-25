<?php
require '../controller/koneksi.php';
require '../middleware/auth_middleware.php';
require '../controller/berita_controller.php';

checkRole("peminjam", 'middleware/auth_prohibit.php');
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
    <link href="../css/styles.css" rel="stylesheet" />
    <style>
        .card-text {
            text-align: justify;
        }

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
    <link rel="shortcut icon" href="/assets/img/logo_pal.ico" type="image/x-icon">
    <link rel="icon" href="/assets/img/logo_pal.ico" type="image/x-icon">
</head>

<?php include 'peminjam_sidebar.php' ?>
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
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Ajukan Peminjaman</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="peminjam_transaksional.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Riwayat Peminjaman</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="peminjam_history.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-4 carousel-container mt-4 ">
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
    </div>

    </main>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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