<?php
include '../config/koneksi.php';
include '../layout/header.php'; ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="proses.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

                        <input type="checkbox" onclick="myFunction()"> Lihat Password
                        <script>
                            function myFunction() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                    </div>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-primary" type="submit" name="upload">Simpan</button>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>


    <!-- DataTales Example -->
</div>



<?php include '../layout/footer.php'; ?>