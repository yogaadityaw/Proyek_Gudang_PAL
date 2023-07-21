<!-- cek php dan login php sangat berkaitan dengan login
karena sangat mengatur keduanya , sehingga ketika sudah pernah login
tidak perlu kembali untuk selalu login-->

<?php
session_start();
//jika belum login

if(isset($_SESSION['log'])){

}else {
    header('location:login.php');
}

?>