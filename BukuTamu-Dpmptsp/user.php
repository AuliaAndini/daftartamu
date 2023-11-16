<?php include "koneksi.php"?>
<?php

if (isset($_POST['registrasi'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];
    $peran =$_POST['peran'];

    if ($pass !== $pass2) {
        echo '<script>alert("Password konfirmasi salah!");</script>';
        echo "<meta http-equiv='refresh' content='0 url=?page=user-add'>";
        return false;
    }

    $cekUsername = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '" . $username . "' ");
    if (mysqli_num_rows($cekUsername) >= 1) {
        echo '<script>alert("username sudah digunakan");</script>';
        echo "<meta http-equiv='refresh' content='0 url=?page=user-add'>";
        return false;
    }

    // merubah karakter password enkripsi hash
    $passHash = password_hash($pass, PASSWORD_DEFAULT);

    // simpan user baru
    $exec = mysqli_query($conn, "INSERT INTO pengguna (username,password,peran) VALUES('$username','$passHash','$peran')");

    if ($exec === true) {
        echo '<script>alert("User berhasil di tambahkan");</script>';
    } else {
        '<script>alert("User gagal di tambahkan");</script>';
    }
    
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
    <link rel="stylesheet" href="user-style.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!--  /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>REGISTRASI AKUN</b><br>DPMPTSP BANJARMASIN</br></h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Buat Username dan Password</p>
                <?php if (isset($error)){?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i>Alert!</h5>
                    Username tidak dapat digunakan...!
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
                    <div class="input-group mb-3">
                        <input type="password2" class="form-control" placeholder="Password Confirmation" name="password2" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                      <input type="hidden" class="form-control" placeholder="ADMIN" name="peran" value="USER" readonly>
                        <!-- <div class="input-group-append justify-content-center">
                            <div class="input-group-text ">
                            <span class="fas fa-lock" aria-hidden="true"></span>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        
                        <div class="col">
                            <button type="submit" class="btn btn-info btn-block" name="registrasi">Buat Akun</button>
                            <a href="index.php" class="btn btn-block btn-success">Kembali</a>
                        </div>
                    </div>
                </form>

                <!-- /.social-auth-links -->

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