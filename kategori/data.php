<?php include_once('../header.php'); ?>
<div class="container mt-4">
    <div class="box">
        <h1 class="mb-4">Kategori</h1>
        <h4>
            <small>Data Kategori</small>
            <div class="float-right">
                <a href="" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-clockwise"></i></a>
                <a href="tambah.php" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Tambah Kategori </a>
            </div>
        </h4>
        <div class="mt-3 mb-4">
            <form class="row g-2" action="" method="post">
                <div class="col-auto">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">ID Kategori</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center"><i class="bi bi-gear"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $batas = 5;
                    $hal = @$_GET['hal'];
                    if (empty($hal)) {
                        $posisi = 0;
                        $hal = 1;
                    } else {
                        $posisi = ($hal - 1) * $batas;
                    }
                    $no = 1;

                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $pencarian = trim(mysqli_real_escape_string($conn, $_POST['pencarian']));
                        if ($pencarian != '') {
                            $sql = "SELECT * FROM tb_kategori WHERE id_kategori LIKE '%$pencarian%' OR nama_kategori LIKE '%$pencarian%' ORDER BY nama_kategori ASC";
                            $query = $sql;
                            $queryJml = $sql;
                        } else {
                            $query = "SELECT * FROM tb_kategori ORDER BY id_kategori, nama_kategori ASC LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_kategori ORDER BY id_kategori, nama_kategori ASC";
                            $no = $posisi + 1;
                        }
                    } else {
                        $query = "SELECT * FROM tb_kategori ORDER BY id_kategori, nama_kategori ASC LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_kategori ORDER BY id_kategori, nama_kategori ASC";
                        $no = $posisi + 1;
                    }

                    $sql_kategori = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($sql_kategori) > 0) {
                        while ($data = mysqli_fetch_array($sql_kategori)) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?>.</td>
                                <td class="text-center"><?= $data['id_kategori'] ?></td>
                                <td><?= $data['nama_kategori'] ?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?= $data['id_kategori'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="delete.php?id=<?= $data['id_kategori'] ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan=\"4\" class=\"text-center\">Data tidak ditemukan</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <?php
        if (@$_POST['pencarian'] == '') { ?>
            <div class="d-flex justify-content-between">
                <div>
                    <?php
                    $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
                    echo "Jumlah Data : <b>$jml</b>";
                    ?>
                </div>
                <div>
                    <ul class="pagination pagination-sm mb-0">
                        <?php
                        $jml_hal = ceil($jml / $batas);
                        for ($i = 1; $i <= $jml_hal; $i++) {
                            if ($i != $hal) {
                                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?hal=$i\">$i</a></li>";
                            } else {
                                echo "<li class=\"page-item active\"><a class=\"page-link\">$i</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php
        } else {
            echo "<div class=\"mt-3\">";
            $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
            echo "Data Hasil Pencarian : <b>$jml</b>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php include_once('../footer.php'); ?>