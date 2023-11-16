<?php include "../koneksi.php"?>
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

// $id = $_SESSION["id"];

// $query_user = "SELECT * FROM daftartamu WHERE id = $id";
// $result_user = mysqli_query($conn, $query_user);
// $row_user = mysqli_fetch_assoc($result_user);

if (isset($_POST['add'])) {
    $id                 = htmlspecialchars($_POST['id']);
    $nama_instansi      = htmlspecialchars($_POST["nama_instansi"]);
    $nama_tamu          = htmlspecialchars($_POST["nama_tamu"]);
    $jumlah             = htmlspecialchars($_POST["jumlah"]);
    $no_telepon         = htmlspecialchars($_POST["no_telepon"]);
    $perihal_kunjungan  = htmlspecialchars($_POST["perihal_kunjungan"]);
    $tanggal            = htmlspecialchars($_POST["tanggal"]);
    $jam                = htmlspecialchars($_POST["jam"]);
    $alasan             = htmlspecialchars($_POST["alasan"]);

    $namaFile = $_FILES["surat_permohonan"]["name"];
    $ukuranFile = $_FILES["surat_permohonan"]["size"];
    $errorFile = $_FILES["surat_permohonan"]["error"];
    $tmpName = $_FILES["surat_permohonan"]["tmp_name"];

    $ekstensifileValid = ['pdf', 'doc', 'docx'];
    $ekstensifile = explode('.', $namaFile);
    $ekstensifile = strtolower(end($ekstensifile));

    if (!in_array($ekstensifile, $ekstensifileValid)) {
        echo "<script>alert('Yang anda upload bukan file yang sesuai...!'); history.go(-1);</script>";
        return false;
    }

    if ($ukuranFile > 10000000) {
        echo "<script>alert('Ukuran file terlalu besar, Maksimal 10 MB'); history.go(-1);</script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifile;

    move_uploaded_file($tmpName, '../assets/files/' . $namaFileBaru);
    $surat_permohonan = $namaFileBaru;

    //jalankan Query
    $query = "INSERT INTO daftartamu VALUES (NULL, '$nama_instansi', '$nama_tamu', '$jumlah', '$no_telepon', '$perihal_kunjungan', '$tanggal', '$jam','$surat_permohonan','$status','$alasan')";
    $tambah = mysqli_query($conn, $query);

    if ($tambah) {
        echo "<script>
            alert('Data berhasil disimpan...!');
            document.location.href = 'daftartamu.php';
        </script>";
    } else {
        echo "<script>
            alert('Data GAGAL disimpan...!');
            history.go(-1);
        </script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Daftar Tamu | DPMPTSP KOTA BANJARMASIN</title>
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
                                <li class="breadcrumb-item"><a href="daftartamu.php">Data Tamu</a></li>
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
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="id">ID :</label>
                                            <input type="hidden" class="form-control" id="id" name="id" placeholder="Masukkan Nama instansi" required>
                                            <label for="nama_instansi">Nama Instansi :</label>
                                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Masukkan Nama instansi" required>
                                            <label for="nama_tamu">Nama Tamu :</label>
                                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="Masukkan Naman Lengkap Anda" required>
                                            <label for="jumlah">Jumlah :</label>
                                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah Tamu" required>
                                            <label for="no_telepon">No Handphone :</label>
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan no_telepon yang di sediakan" required>
                                            <label for="perihal_kunjungan">Perihal Kunjungan :</label>
                                            <input type="text" class="form-control" id="perihal_kunjungan" name="perihal_kunjungan" placeholder="Masukkan Perihal Kunjungan" required>
                                            <label for="tanggal">Tanggal :</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" required>
                                            <label for="jam">Jam :</label>
                                            <input type="time" class="form-control" id="jam" name="jam" placeholder="Masukkan Jam Untuk Berkunjung " required>
                                            <label for="surat_permohonan">Surat Permohonan :</label>
                                            <input type="file" class="form-control" id="surat_permohonan" name="surat_permohonan" placeholder="Scan Surat Permohonan " required>
                                            <label for="status" class="form-label">Status :</label>
                                            <input type="text" class="form-control" id="status" name="status" value="Menunggu" readonly>
                                            <label for="alasan">Alasan :</label>
                                            <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Masukkan alasan Untuk Berkunjung " required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="add" name="add" class="btn btn-primary mr-1">Simpan</button>
                                        <a href="daftartamu.php" class="btn btn-secondary">Batal</a>
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
    <!-- <script>
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
    </script> -->
</body>

</html>