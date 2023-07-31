<?php

require 'controller/koneksi.php';
session_start();
// cek login
if (isset($_POST['login'])) {
    $nip = $_POST['nip'];
    $password = $_POST['password'];

    $cekdatabase = mysqli_query($conn, "SELECT * FROM login WHERE NIP = '$nip' AND Password = '$password'");

    //hitung jumlah data 
    $hitung = mysqli_num_rows($cekdatabase);


    if ($hitung > 0) {
        $_SESSION['log'] = 'True';
        header('location: index.php');
        exit();
    } else {
        header('location: login.php');
        exit();
    }
}

if ((isset($_SESSION['log']))) {
    header('Location: index.php');
    exit();
}

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
                                            <button class="btn btn-primary" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">Belum Punya Akun? Sign up!</a></div>
                                </div>
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
</body>

</html>