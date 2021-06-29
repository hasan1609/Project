<?php
$header = 'karyawan';
include "../config/koneksi.php";
include 'akses.php';
include '../layout/header.php';
?>
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
            <form class="" action="cek_karyawan.php" method="post" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Jabatan
                    </span>
                    <select class="form-control" aria-label=".form-select-sm example" name="jabatan">
                        <option>----Pilih Jabatan----</option>
                        <?php
                        $data = mysqli_query($koneski, "SELECT * FROM jabatan");
                        while ($value = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?= $value['kd_jabatan']; ?>"><?= $value['nama_jabatan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group input-group-append">
                    <span class="input-group-text">
                        NIK
                    </span>
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Nama
                    </span>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Agama
                    </span>
                    <select class="form-control" aria-label=".form-select-sm example" name="agama" required>
                        <option>---Pilih Agama---</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="katolik">Katolik</option>
                        <option value="konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text">
                        No.tlp/Hp
                    </span>
                    <input type="number" class="form-control form-control-user" id="tlp" name="tlp" placeholder="Masukkan No Hp / Tlp" required>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Tanggal Lahir
                    </span>
                    <input type="date" class="form-control form-control-user" id="ttl" name="ttl" placeholder="Masukkan Tanggal Lahir" required>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Alamat
                    </span>
                    <textarea type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat"></textarea>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Tanggal Pendaftaran
                    </span>
                    <input type="date" class="form-control form-control-user" id="daftar" name="daftar" required>
                </div>

                <div class=form-group>
                    <label for="jk">Jenis Kelamin</label>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="jk" id="jk" value="Laki-laki" required> Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="jk" id="jk" value="Perempuan" required> Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-text">
                        Foto
                    </span>
                    <input type="File" class="form-control form-control-user" id="image" name="image" placeholder="Masukkan Foto" required>
                </div>
                <img id="preview" src="#" / style="width: 150px; margin: 10px;" alt="Gambar Anda"><br>
                <div class="col-xs-3">
                    <button class="btn btn-primary" type="submit" name="upload">Simpan</button>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../layout/footer.php' ?>