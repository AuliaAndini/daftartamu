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

$id = $_GET["id"];  
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
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $jam = htmlspecialchars($_POST["jam"]);
    $status = htmlspecialchars($_POST["status"]);    
    $surat_permohonan = htmlspecialchars($_POST["surat_permohonan"]);

    $query = "UPDATE daftartamu SET
            nama_instansi = '$nama_instansi',
            nama_tamu = '$nama_tamu',
            jumlah = '$jumlah',
            no_telepon = '$no_telepon',
            perihal_kunjungan = '$perihal_kunjungan',
            tanggal= '$tanggal',
            jam= '$jam',
            status= '$status',
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
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_instansi">Nama Instansi :</label>
                                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?= $row_daftartamu["nama_instansi"]; ?>" placeholder="Masukkan Nama tamu" readonly>
                                            <label for="nama_tamu">Nama Tamu:</label>
                                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="<?= $row_daftartamu["nama_tamu"]; ?>" placeholder="Masukkan No HP" readonly>
                                            <label for="jumlah">Jumlah Tamu :</label>
                                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $row_daftartamu["jumlah"]; ?>" placeholder="Masukkan jumlah Tamu Yang Berkunjung" readonly>
                                            <label for="no_telepon">No Telepon :</label>
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $row_daftartamu["no_telepon"]; ?>" placeholder="Masukkan Nomor Telephone Yang AKtif" readonly>
                                            <label for="perihal_kunjungan">Perihal Kunjungan :</label>
                                            <input type="text" class="form-control" id="perihal_kunjungan" name="perihal_kunjungan" value="<?= $row_daftartamu["perihal_kunjungan"]; ?>" placeholder="Masukkan Perihal Kunjungan Bertamu" readonly>    
                                            <label for="tanggal">Tanggal :</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row_daftartamu["tanggal"]; ?>" placeholder="Masukkan Tanggal In Bertamu" readonly>    
                                            <label for="jam">Jam :</label>
                                            <input type="time" class="form-control" id="jam" name="jam" value="<?= $row_daftartamu["jam"]; ?>" placeholder="Jam ingin berkunjung" readonly>    
                                             <!-- <label type="hidden" for="surat_permohonan">Surat Permohonan :</label> -->
                                            <input type="hidden" class="form-control" id="surat_permohonan" name="surat_permohonan" value="<?= $row_daftartamu["surat_permohonan"]; ?>" placeholder="Scan Surat Permohonan" readonly> 
                                            <input type="hidden" class="form-control" id="status" name="status" value="Terima" >
                                            <input type="hidden" class="form-control" id="alasan" name="alasan" value="-" >       
                                            <!-- <label for="status">Status :</label>
                                            <input type="text" class="form-control" id="status" name="status" value="<?= $row_daftartamu["surat_permohonan"]; ?>" placeholder="Scan Surat Permohonan" required> -->
                                            <!-- <label for="status" class="form-label">Status :</label> -->
                                            <br>
                                            <!-- <select name="status" id="status" class="form-select" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Terima">Terima</option>
                                                <option value="Tolak">Tolak</option>
                                                
                                            </select>   
                                                         -->
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary mr-1">Verifikasi</button>
                                        <a href="daftartamu-verifikasi-tolak.php?id=<?php echo $row_daftartamu["id"]; ?>" class="btn btn-danger">Tolak</a>
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

</html>