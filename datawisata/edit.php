<?php
include_once('../header.php');
?>

<div class="box">
    <h1>Data Wisata</h1>
    <h4>
        <small>Edit Data Wisata</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="bi bi-arrow-left-square"></i> Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_datawisata = mysqli_query($conn, "SELECT * FROM tb_datawisata WHERE id_datawisata = '$id'") or die(mysqli_error($conn));
            $data = mysqli_fetch_array($sql_datawisata);
            ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="id">ID Data Wisata</label>
                    <input type="text" name="id" id="id" value="<?= $data['id_datawisata'] ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <?php
                        $sql_kategori = mysqli_query($conn, "SELECT * FROM tb_kategori") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($sql_kategori)) {
                            $selected = ($data['id_kategori'] == $row['id_kategori']) ? "selected" : "";
                            echo "<option value='{$row['id_kategori']}' $selected>{$row['nama_kategori']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_wisata">Nama Wisata</label>
                    <input type="text" name="nama_wisata" id="nama_wisata" value="<?= $data['nama_wisata'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" required><?= $data['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required><?= $data['deskripsi'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="harga_tiket">Harga Tiket</label>
                    <input type="text" name="harga_tiket" id="harga_tiket" value="<?= $data['harga_tiket'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" id="latitude" value="<?= $data['latitude'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" id="longitude" value="<?= $data['longitude'] ?>" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once('../footer.php');
?>