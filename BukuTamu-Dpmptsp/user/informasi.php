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

$id = $_SESSION["id"];
$query_daftartamu = "SELECT * FROM daftartamu WHERE id = $id";
$result_daftartamu = mysqli_query($conn, $query_daftartamu);
$row_daftartamu = mysqli_fetch_assoc($result_daftartamu);

//query tampilan data daftartamu
if (isset($_POST["submit"])) {
    $nama_instansi = htmlspecialchars($_POST["nama_instansi"]);
    $nama_tamu = htmlspecialchars($_POST["nama_tamu"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $no_telepon = htmlspecialchars($_POST["no_telepon"]);
    $perihal_kunjungan = htmlspecialchars($_POST["perihal_kunjungan"]);
    $waktu = htmlspecialchars($_POST["waktu"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $jam = htmlspecialchars($_POST["jam"]);
    $surat_permohonan = htmlspecialchars($_POST["surat_permohonan"]);

    $query = "UPDATE daftartamu SET
            nama_instansi = '$nama_instansi',
            nama_tamu = '$nama_tamu',
            jumlah = '$jumlah',
            no_telepon = '$no_telepon',
            perihal_kunjungan = '$perihal_kunjungan',
            tanggal= '$tanggal',
            jam= '$jam',
            surat_permohonan = '$surat_permohonan'
            WHERE id = $id
            ";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
            alert('Data berhasil diedit...!');
            document.location.href = 'daftartamu.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Data GAGAL diedit...!');
            document.location.href = 'daftartamu-edit.php?id=$id';
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Tamu | DPMPTSP KOTA BANJARMASIN</title>
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
                            <h1>Data Tamu</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="daftartamu.php">Daftar Tamu</a></li>
                                <li class="breadcrumb-item active">Edit Data</li>
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
                            </div>
                                <!-- /.card-header -->
                                <div class="card">
                                    <div class="class-body">
                                        <div class="table-responsive">
                                            <table id="" class="table table-hover table-bordered">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Nama Instansi</th>
                                                        <th>Nama Tamu</th>
                                                        <th>Jumlah Tamu</th>
                                                        <th>Nomor Handphone</th>
                                                        <th>Perihal Kunjungan</th>
                                                        <th>Tanggal</th>
                                                        <th>Jam</th>
                                                        <th>Surat Permohonan</th>
                                                        <th>Status</th>
                                                        <th>Alasan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <?= $row_daftartamu["nama_instansi"]?>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["nama_tamu"]?>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["jumlah"]?>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["no_telepon"]?>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["perihal_kunjungan"]?>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["tanggal"]?>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["jam"]?>
                                                    </td>
                                                    <td>
                                                        <a href="../assets/files/<?= $row_daftartamu["surat_permohonan"]?>" target="_blank"><?= $row_daftartamu["surat_permohonan"]?></a>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["status"]?>
                                                    </td>
                                                    <td>
                                                        <?= $row_daftartamu["alasan"]?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
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

</html>