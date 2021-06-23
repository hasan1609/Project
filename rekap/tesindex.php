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

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php
    include '../config/koneksi.php';
    //deklarasi variable absen
    $keterangan_alpha = 0;
    $keterangan_izin = 0;
    $keterangan_hadir = 0;
    $ambil_bulan_t = 0;
    $nama_bulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
        'September', 'Oktober', 'November', 'Desember'
    ];
    //pencarian data
    if (isset($_GET['carinama'])) {
        $cari_nama = $_GET['nama'];
        $cari_bulan = $_GET['bulan'];
        $query_tampil = mysqli_query($koneski, "SELECT * FROM karyawan WHERE nama like '%$cari_nama%' ORDER BY nama");
    } else {
        // query tampil
        $query_tampil = mysqli_query($koneski, "SELECT * FROM karyawan");
    }
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
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
            <li class="nav-item">
                <a class="nav-link" href="../jabatan/index.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Jabatan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../karyawan/index.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Karyawan</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Absensi
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../absensi/index.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Absen</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Rekap Absen</span></a>
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Rekap Absensi</h1>

                    <div class="card shadow-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" aria-label="form-select-sm example" name="jabatan">
                                                <option>----Pilih Jabatan----</option>
                                                <?php
                                                $data = mysqli_query($koneski, "SELECT * FROM jabatan");
                                                while ($value = mysqli_fetch_array($data)) {
                                                ?>
                                                    <option value="<?= $value['kd_jabatan']; ?>"><?= $value['nama_jabatan']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" aria-label="form-select-sm example" name="bulan">
                                                <?php
                                                $nama_bulan = [
                                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                                                    'September', 'Oktober', 'November', 'Desember'
                                                ];
                                                for ($nomor_bulan = 1; $nomor_bulan <= 12; $nomor_bulan++) {
                                                    if ($nomor_bulan < 10) {
                                                        echo "<option value='0$nomor_bulan'>" . $nama_bulan[$nomor_bulan - 1] . "</option>";
                                                    } else {
                                                        echo "<option value='$nomor_bulan'>" . $nama_bulan[$nomor_bulan - 1] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <input class="btn btn-primary" type="submit" name="carinama">
                                </div>
                            </form>
                        </div>

                    </div>

                    <hr>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php if (isset($_GET['carinama'])) { ?>
                                <h5><?php echo "$_GET[bulan]-$_GET[tahun]"; ?></h5>
                            <?php } else { ?>
                                <h5><?php echo date('m-y'); ?></h5>
                            <?PHP } ?>
                        </div>
                        <div class="card-body">
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped with-check">
                                        <thead>
                                            <tr>
                                                <th rowspan='2'><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
                                                <th rowspan='2'>Nama</th>
                                                <th rowspan='2'>L/P</th>
                                                <?php for ($tanggal_table = 1; $tanggal_table <= 31; $tanggal_table++) {
                                                    echo "<th rowspan='2'>$tanggal_table</th>";
                                                } ?>
                                                <th colspan="4">Jumlah</th>
                                            </tr>
                                            <tr>
                                                <th>H</th>
                                                <th>A</th>
                                                <th>I</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($data = mysqli_fetch_array($query_tampil)) {
                                                if ($data['jk'] == "Laki-laki") {
                                                    $jk = "L";
                                                } else {
                                                    $jk = "P";
                                                } ?>
                                                <tr>
                                                    <td><input type="checkbox" name="id_karyawan[]" value="<?PHP echo $data['id_karyawan']; ?>" /></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $jk ?></td>
                                                    <?php
                                                    //perulangan kehadiran sesuai tanggal
                                                    $nomor2 = 1;
                                                    //perulangan kehadiran sesuai tanggal
                                                    if (isset($_GET['bulan'])) {
                                                        $query_tampil_tanggal = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan=$data[id_karyawan] and tgl_absen like '%$_GET[tahun]-$cari_bulan%' ORDER BY tgl_absen ASC;");
                                                    } else {
                                                        $cari_bulann = date('m');
                                                        $tahunn = date('Y');
                                                        $query_tampil_tanggal = mysqli_query($koneski, "SELECT * FROM absensi WHERE id_karyawan=$data[id_karyawan]
                                                                and tgl_absen like '%$tahunn-$cari_bulann%' ORDER BY tgl_absen ASC;");
                                                    }
                                                    while ($data_tanggal = mysqli_fetch_array($query_tampil_tanggal)) {
                                                        //mengabil tanggal
                                                        $ambil_tanggal = explode("-", $data_tanggal['tgl_absen']);
                                                        //merubah menjadi tanggal jadi integer
                                                        $ambil_tanggal[2] = (int)$ambil_tanggal[2];

                                                        //perulangan kehadiran sesuai tanggal
                                                        for ($nomor = $nomor2; $nomor <= $ambil_tanggal[2]; $nomor++) {
                                                            if ($nomor == $ambil_tanggal[2]) {
                                                                if ($data_tanggal['keterangan'] == 'h') {
                                                                    echo '<td><i class="fa fa-check" aria-hidden="true"></i></span></td>';
                                                                } else {
                                                                    echo "<td><b>" . strtoupper($data_tanggal['keterangan']) . "</b></td>";
                                                                }
                                                            } else {
                                                                echo "<td></td>";
                                                            }
                                                        }
                                                        //meng rekap bulannan
                                                        if ($data_tanggal['keterangan'] == 'h') {
                                                            $keterangan_hadir++;
                                                        } else if ($data_tanggal['keterangan'] == 'a') {
                                                            $keterangan_alpha++;
                                                        } else if ($data_tanggal['keterangan'] == 'i') {
                                                            $keterangan_izin++;
                                                        }
                                                        $nomor2 = $ambil_tanggal[2] + 1;
                                                        $sisa_td = 31 - $nomor2;
                                                    }
                                                    if (isset($sisa_td) != true) {
                                                        $sisa_td = 30;
                                                    }
                                                    for ($td = 0; $td <= $sisa_td; $td++) {
                                                        echo "<td></td>";
                                                    }
                                                    //tampilan rekap absen
                                                    echo "<td>$keterangan_hadir</td>
                                                            <td>$keterangan_alpha</td>
                                                            <td>$keterangan_izin</td>";
                                                    $keterangan_alpha = 0;
                                                    $keterangan_izin = 0;
                                                    $keterangan_hadir = 0;
                                                    ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                            </div>
                            <br>
                            <div class="col-xs-3">
                                <!-- Ambil absen perbulan -->
                                <?php
                                $q_ambil_bulan = mysqli_query($koneski, "SELECT DISTINCT tgl_absen FROM absensi ORDER BY tgl_absen");
                                while ($t_bulan = mysqli_fetch_array($q_ambil_bulan)) {
                                    //mengabil bulan
                                    $ambil_bulan = explode("-", $t_bulan['tgl_absen']);
                                    //merubah menjadi bulan jadi integer
                                    $ambil_bulan[1] = (int)$ambil_bulan[1];
                                    if ($ambil_bulan_t == $ambil_bulan[1]) {
                                        continue;
                                    }
                                    $ambil_bulan_t = $ambil_bulan[1];
                                    $pilih_bulan = $nama_bulan[$ambil_bulan_t - 1];
                                ?>

                                    <a href="report.php?bulan=<?php echo "$ambil_bulan_t&tahun=$ambil_bulan[0]"; ?>" target="_blank" class="btn btn-outline-primary">
                                        <i class="fas fa-print"></i><b> Cetak Pdf</b></a>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }
    </script>


</body>

</html>