<?php
session_start();
if ($_SESSION["peran"] == "USER") {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';

//query tampilan data Konsumsi
if (isset($_POST["submit"])) {
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $nama_instansi = htmlspecialchars($_POST["nama_instansi"]);
    $nama_tamu = htmlspecialchars($_POST["nama_tamu"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $konsumsi = htmlspecialchars($_POST["konsumsi"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $total = $jumlah*$harga;

    $query = "INSERT INTO konsumsi VALUES ('', '$tanggal', '$nama_instansi', '$nama_tamu', '$jumlah', '$konsumsi', '$harga', '$total')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
            alert('Data berhasil disimpan...!');
            document.location.href = 'konsumsi.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Data gagal disimpan...!');
            document.location.href = 'konsumsi-tambah.php';
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data konsumsi | DPMPTSP KOTA BANJARMASIN</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include "theme-header.php"; ?>

        <?php include "theme-sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data konsumsi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="konsumsi.php">konsumsi</a></li>
                                <li class="breadcrumb-item active">Tambah Data</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal :</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal" required>
                                            <label for="nama_instansi">Nama Instansi :</label>
                                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Masukkan Nama instansi" required>
                                            <label for="nama_tamu">Nama Tamu :</label>
                                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="Masukkan Nama Lengkap Anda" required>
                                            <label for="jumlah">Jumlah :</label>
                                            <input type="number" step="any" min="0"id="jumlah" name="jumlah" placeholder="Masukkan jumlah Tamu" class="form-control" required>
                                            <label for="konsumsi">Konsumsi :</label>
                                            <input type="text" class="form-control" id="konsumsi" name="konsumsi" placeholder="Masukkan Konsumsi yang di sediakan" required>
                                            <label for="harga">Harga :</label>
                                            <input type="number" step="any" min="0" id="harga" name="harga" placeholder="Masukkan Harga Per Pcs" class="form-control" required>
                                             <label for="total">Total :</label>
                                            <input type="text" class="form-control"step="any" min="0" id="total" value="0" readonly required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary mr-1">Simpan</button>
                                        <a href="konsumsi.php" class="btn btn-secondary">Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "theme-footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <!-- JQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTablles & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>
<script type="text/javascript">
    $("#jumlah").keyup(function() {
        var a = parseFloat($("#jumlah").val());
        var b = parseFloat($("#harga").val());
        var d = a * b;
        $("#total").val(d);
    });

    $("#harga").keyup(function() {
        var a = parseFloat($("#jumlah").val());
        var b = parseFloat($("#harga").val());
        var d = a * b;
        $("#total").val(d);
    });
</script>

</html>