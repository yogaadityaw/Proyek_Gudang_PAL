<div class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="user_dashboard.php">Divisi Harkan</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="user_dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseTabel" aria-expanded="false" aria-controls="pagesCollapseTabel">
                            Tabel Barang Gudang
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseTabel" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="user_alat_produksi.php">Peralatan Pendukung Produksi</a>
                                <a class="nav-link" href="user_komunikasi.php">Alat Komunikasi/(HT)</a>
                                <a class="nav-link" href="user_konsumable.php">Daftar Barang Konsumable</a>
                                <a class="nav-link" href="user_angkut_apung.php">Daftar angkat angkut dan alat apung</a>
                                <a class="nav-link" href="user_barang_asset.php">Daftar Barang Asset</a>
                                <a class="nav-link" href="user_transaksional.php">Form Peminjaman Barang</a>
                                <a class="nav-link" href="user_transaksional_kembali.php">Form Pengembalian Barang</a>
                                <a class="nav-link" href="user_mutasibarang.php">List Daftar Mutasi Barang</a>

                            </nav>
                        </div>
                        <a class="nav-link" href="user_peminjaman.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                            Pengajuan Peminjaman
                        </a>
                        <a class="nav-link" href="user_berita.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                            Update Berita
                        </a>
                    </div>
                </div>
                <div class="text-center mt-3 text-white">
                    <!-- Menampilkan NIP dan Nama Pegawai dari Sesi -->
                    <label>Nama Pengguna : </label>
                    <p><?php echo $_SESSION['nama']; ?></p>
                </div>
        </div>
    </div>
    </nav>
</div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarToggle = document.getElementById("sidebarToggle");
        const mainContent = document.getElementById("main-content");

        sidebarToggle.addEventListener("click", function() {
            mainContent.classList.toggle("main-with-sidebar");
        });
    });
</script>