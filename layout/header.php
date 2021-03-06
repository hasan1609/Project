<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- search dropdown -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Custom styles for this page -->
    <!-- <link href="../vendor/datatable/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <!-- <link href="../vendor/DataTables/datatables.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="../vendor/DataTables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="../vendor/DataTables/Buttons-1.7.1/css/buttons.bootstrap4.min.css" />



</head>

<body id="page-top">

    <?php
    include '../config/koneksi.php';
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Administrator</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($header == "dashboard") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="../dashboard/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if ($header == "jabatan") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="../jabatan/index.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Jabatan</span></a>
            </li>

            <li class="nav-item <?php if ($header == "karyawan") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="../karyawan/index.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Karyawan</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Absensi
            </div>

            <li class="nav-item <?php if ($header == "absensi") {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Absensi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../absensi/index.php">Absensi Harian</a>
                        <a class="collapse-item" href="../absensi/data-index.php">Master Absensi</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php if ($header == "rekap") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="../rekap/index.php">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Rekap Absen</span></a>
            </li>
            <li class="nav-item <?php if ($header == "surat") {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Surat Peringatan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../surat/data_surat.php">Daftar Surat</a>
                        <a class="collapse-item" href="../surat/index.php">Data SP</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../profil/index.php">
                                    <i class="fas fa-cog fa-faw text-gray-600"></i>
                                    <span class="text-gray-600">&nbsp Setting</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <?php if ($_SESSION['role'] != "admin") { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../admin/index.php">
                                    <i class="fa fa-plus fa-faw text-gray-600"></i>
                                    <span class="text-gray-600"> &nbsp Admin </span>
                                </a>
                            </li>
                        <?php } ?>
                        <div class="topbar-divider d-none d-sm-block">

                        </div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'] ?></span>
                                <img class="img-profile rounded-circle" src="../Image/default.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php?id=<?= $_SESSION['id_user']; ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>