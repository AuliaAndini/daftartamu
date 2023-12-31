<?php
session_start();
date_default_timezone_set('Asia/Singapore');

if (isset($_SESSION['login'])) {
    header('Location: admin/index.php');
    exit;
}

require 'koneksi.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $login_terakhir = date("Y-m-d H:i:s");

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1){

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            $_SESSION["peran"] = $row["nama"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["id"] = $row["id"];

            if ($row["peran"] == "ADMIN" ){
                //mengupdate data ke database
                $update = mysqli_query($conn, "UPDATE pengguna SET login_terakhir = '$login_terakhir' WHERE username = '$username'");
                header("Location: admin/index.php");
            } else if ($row["peran"] == "USER") {
                $update = mysqli_query($conn, "UPDATE pengguna SET login_terakhir = '$login_terakhir' WHERE username = '$username'");
                header("Location: user/index.php");
            }

            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | BUKU TAMU DPMPTSP</title>

    <!--  Google Font: Source Sans Pro   -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!--  Font Awesome   -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!--  icheck bootstrap   -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!--  Theme style   -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!--  /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>BUKU TAMU</b><br>DPMPTSP BANJARMASIN</br></h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masukkan username dan Password</p>
                <?php if (isset($error)){?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i>Alert!</h5>
                    Username atau password salah...!
                </div>
                <?php }?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Masuk</button>
                            <a href="user.php" class="btn btn-block btn-danger">Buat Akun</a>
                        </div>
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mt-3">
                    <a href="#">Lupa Password?</a>
                </p>
                <p class="mt-3">
                    <a href="../index.html">Home</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login.box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>