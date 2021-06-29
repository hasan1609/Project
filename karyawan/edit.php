<?php
session_start();
$header = 'karyawan';
include '../config/koneksi.php';
include 'akses.php';
include '../layout/header.php'
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
            <form action="cek_edit.php" method="post" enctype="multipart/form-data">
                <?php
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
<?php include '../layout/footer.php' ?>