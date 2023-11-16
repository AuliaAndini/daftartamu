        <!-- Main Sidebar Container -->
        <link rel="stylesheet" href="color.css">
        <aside class="main-sidebar sidebar-dark-primary elevation-4 andini">
            <!-- Brand Logo -->
            <a href="../index3.html" class="brand-link">
                <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DPMPTSP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/van.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION["username"]; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2 ini-font">
                    <ul class="nav nav-pills nav-sidebar flex-column andinip" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="konsumsi.php" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    Konsumsi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="daftartamu.php" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Daftar Tamu
                                </p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="jadwaltamu.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>
                                    Jadwal Tamu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-sliders-h"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lokasi.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lokasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="jabatan.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jabatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="bagian.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bagian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="presensi.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Presensi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-print"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="riwayat-gaji.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Menunggu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="rekap-gaji-bulan.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Di Verifikasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="rekap-gaji.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Di Tolak</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="slip-gaji-jabatan.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Konsumsi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>