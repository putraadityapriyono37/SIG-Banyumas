<?php
include_once('../header.php');
?>

<div class="box">
    <h1>Wisata</h1>
    <h4>
        <small>Tambah Data Wisata</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="bi bi-arrow-left-square"></i> Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php
                        // Ambil data kategori dari database
                        $sql_kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC") or die(mysqli_error($conn));
                        while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
                            echo '<option value="' . $data_kategori['id_kategori'] . '">' . $data_kategori['nama_kategori'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_wisata">Nama Wisata</label>
                    <input type="text" name="nama_wisata" id="nama_wisata" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Deskripsi wisata..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="harga_tiket">Harga Tiket</label>
                    <input type="text" name="harga_tiket" id="harga_tiket" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Contoh: -6.175110" required>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Contoh: 106.865039" required>
                </div>

                <div class="form-group pull-right">
                    <input type="submit" name="tambah" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once('../footer.php');
?>