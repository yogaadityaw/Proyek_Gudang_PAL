<?php
// require 'controller/konsumable_controller.php';
require 'controller/koneksi.php';
require 'controller/transaksi_pinjam_controller.php';
require 'middleware/auth_middleware.php';
require 'controller/berita_controller.php';
checkRole("admin", '../middleware/auth_prohibit.php');

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
    <title>Upload Berita</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php include 'sidebar.php' ?>

<body class="bg-primary">
    <br>
    <br>
    <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
        <div class="container-fluid px-4">
            <h3 class="mt-4 text-center" style="color: white;">Upload Berita</h3>
        </div>
        <!--form peminjaman-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Upload Berita</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-row">
                                    <div class="mb-3">
                                        <label for="judulberita" class="form-label">Judul Berita</label>
                                        <input type="text" class="form-control" id="judulberita" name="judulberita" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsiberita">Deskripsi Berita</label>
                                    <textarea class="form-control mt-2" id="deskripsiberita" name="deskripsiberita" rows="3"></textarea>
                                    <p><span id="characterCount">0</span></p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" name="post">Posting</button>
                                </div>
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
    // Fungsi untuk mengupdate hitungan karakter
    function updateCharacterCount() {
        var textarea = document.getElementById("deskripsiberita");
        var text = document.getElementById("characterCount");
        var maxCharacterCount = 2056;
        var currentCharacterCount = textarea.value.length;

        // Tampilkan hitungan karakter dalam format "current/total"
        document.getElementById("characterCount").innerText = currentCharacterCount + "/" + maxCharacterCount +" Karakter";
        if(currentCharacterCount > maxCharacterCount){
            text.style.color = "red";
        } else {
            text.style.color = "black";
        }
    }

    // Panggil fungsi saat teks berubah dalam textarea
    document.getElementById("deskripsiberita").addEventListener("input", updateCharacterCount);

    // Panggil fungsi saat halaman dimuat untuk menampilkan hitungan karakter awal
    window.addEventListener("load", updateCharacterCount);
</script>
</body>

</html>