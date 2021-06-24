<?php
include "../config/koneksi.php";
?>

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

    <!-- date Picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
</head>

<body id="page-top">

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

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../jabatan/index.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Jabatan</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Karyawan</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Absensi
            </div>

            <li class="nav-item">
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
            <li class="nav-item">
                <a class="nav-link" href="../rekap/index.php">
                    <i class="fas fa-fw fa-print"></i>
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
                    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Karyawan</h6>
                        </div>
                        <div class="card-body">
                            <form action="cek_edit.php" method="post" enctype="multipart/form-data">
                                <?php
                                include '../config/koneksi.php';
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                } else {
                                    die("Error. No ID Selected!");
                                }
                                $data = mysqli_query($koneski, "SELECT * FROM karyawan INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan WHERE id_karyawan = '$id'");
                                $row = mysqli_fetch_array($data)
                                ?>
                                <input type="hidden" name="id" value="<?= $row['id_karyawan']; ?>">
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        Jabatan
                                    </span>
                                    <select class="form-control" aria-label=".form-select-sm example" name="jabatan">
                                        <option>---Pilih Jabatan--- </option>
                                        <?php
                                        $query = mysqli_query($koneski, "SELECT * FROM jabatan");
                                        while ($value = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?= $value['kd_jabatan']; ?>" <?php if ($row['kd_jabatan'] == $value['kd_jabatan']) echo 'selected' ?>><?= $value['nama_jabatan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        NIK
                                    </span>
                                    <input type="number" class="form-control" id="nik" name="nik" value="<?= $row['nik']; ?>">
                                </div>
                                <div class=" form-group input-group">
                                    <span class="input-group-text">
                                        Nama
                                    </span>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        Agama
                                    </span>
                                    <select class="form-control" aria-label=".form-select-sm example" name="agama" required>
                                        <option>---Pilih Agama---</option>
                                        <option value="islam" <?php if ($row['agama'] == 'islam') echo 'selected' ?>>Islam</option>
                                        <option value="kristen" <?php if ($row['agama'] == 'kristen') echo 'selected' ?>>Kristen</option>
                                        <option value="hindu" <?php if ($row['agama'] == 'hindu') echo 'selected' ?>>Hindu</option>
                                        <option value="buddha" <?php if ($row['agama'] == 'buddha') echo 'selected' ?>>Buddha</option>
                                        <option value="katolik" <?php if ($row['agama'] == 'katolik') echo 'selected' ?>>Katolik</option>
                                        <option value="konghucu" <?php if ($row['agama'] == 'konghucu') echo 'selected' ?>>Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        No.tlp/Hp
                                    </span>
                                    <input type="number" class="form-control form-control-user" id="tlp" name="tlp" placeholder="Masukkan No Hp / Tlp" value="<?= $row['notlp']; ?>" required>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        Tanggal Lahir
                                    </span>
                                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl" placeholder="Masukkan Tanggal Lahir" value="<?= $row['ttl']; ?>" required>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        Alamat
                                    </span>
                                    <textarea type="text" class="form-control form-control-user" id="alamat" name="alamat"><?= $row['alamat']; ?></textarea>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        Tanggal Pendaftaran
                                    </span>
                                    <input type="date" class="form-control form-control-user" id="daftar" name="daftar" value="<?= $row['tgl_pendaftaran']; ?>" required>
                                </div>

                                <div class=form-group>
                                    <label for=" jk">Jenis Kelamin</label>
                                    <div class="radio">
                                        <label for="">
                                            <input type="radio" name="jk" id="jk" value="Laki-laki" <?php if ($row['jk'] == 'Laki-laki') echo 'checked' ?> required> Laki-Laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="">
                                            <input type="radio" name="jk" id="jk" value="Perempuan" <?php if ($row['jk'] == 'Perempuan') echo 'checked' ?> required> Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">
                                        Foto
                                    </span>
                                    <input type="file" class="form-control form-control-user" id="image" name="image">
                                    <input type="hidden" name="foto_lama" value="<?= $row['foto']; ?>" /></td>
                                </div>
                                <img id="preview" / style="width: 150px; margin: 10px;" alt="Gambar Anda" src="../Image/<?= $row['foto']; ?>"><br>
                                <div class="col-xs-3">
                                    <button class="btn btn-primary" type="submit" name="upload">Update</button>
                                    <a class="btn btn-danger" href="index.php">Back</a>
                                </div>
                            </form>
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

    <!-- date picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        });
    </script>

    <!-- preview gambar -->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>