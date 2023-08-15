<?php

require 'controller/koneksi.php';
session_start();
// cek login
if (isset($_POST['login'])) {
    $nip = $_POST['nip'];
    $password = $_POST['password'];
    $errorOccurred = false;

    if (!empty($nip) || !empty($password)) {
        $query = mysqli_query($conn, "SELECT * FROM login WHERE NIP = '$nip'");
        $data = mysqli_fetch_array($query);
        $row = mysqli_num_rows($query);
        if ($row > 0) {
            if (password_verify($password, $data['Password'])) {
                $role = $data['role_id'];
                if ($role == 1) {
                    $_SESSION['log'] = 'True';
                    $_SESSION['role'] = "admin";
                    header('location: index.php');
                    exit();
                } else if ($role == 2) {
                    $_SESSION['log'] = 'True';
                    $_SESSION['role'] = "user";
                    header('location: user/user_dashboard.php');
                } else if($role == 3){
                    $_SESSION['log'] = 'True';
                    $_SESSION['role'] = "atasan";
                    header('location: atasan/atasan_mutasibarang.php');
                } else {
                    $loginError = "User tidak tersedia.";
                }
            } else {
                $errorOccurred = true;
                $loginError = "NIP atau password salah. Silakan coba lagi.";
            }
        }
    }

    // $cekdatabase = mysqli_query($conn, "SELECT * FROM login WHERE NIP = '$nip' AND Password = '$password'");

    // //hitung jumlah data 
    // $hitung = mysqli_num_rows($cekdatabase);


    // if ($hitung > 0) {
    //     $_SESSION['log'] = 'True';
    //     header('location: index.php');
    //     exit();
    // } else {
    //     $errorOccurred = true;
    //     $loginError = "NIP atau password salah. Silakan coba lagi.";
    // }
}

// if ((isset($_SESSION['log']))) {
//     header('Location: index.php');
//     exit();
// }

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="/assets/img/logo_pal.png">
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputNIP">NIP</label>
                                            <input class="form-control py-4" name="nip" id="inputNIP" type="number" placeholder="NIP" />

                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for=inputPassword>Password</label>
                                            <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Password" />

                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary w-100" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="modal-error-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-error-label">Login Error</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if ($loginError) echo $loginError; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        <?php if ($errorOccurred) { ?>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById("modal-error"));
                myModal.show();
            });
        <?php } ?>
    </script>
</body>

</html>