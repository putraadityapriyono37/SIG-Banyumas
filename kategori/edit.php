<?php
include_once('../header.php');
?>

<div class="box">
    <h1>Kategori</h1>
    <h4>
        <small>Edit Data Kategori</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="bi bi-arrow-left-square"></i> Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = '$id'") or die(mysqli_error($conn));
            $data = mysqli_fetch_array($sql_kategori);
            ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="nama">ID Kategori</label>
                    <input type="text" name="id" id="id" value="<?= $data['id_kategori'] ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Nama Kategori</label>
                    <textarea name="nama" id="nama" class="form-control" required><?= $data['nama_kategori'] ?></textarea>
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