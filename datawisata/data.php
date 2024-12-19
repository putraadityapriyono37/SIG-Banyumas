<?php include_once('../header.php'); ?>
<div class="container mt-4">
    <div class="box">
        <h1 class="mb-4">Data Wisata</h1>
        <h4>
            <small>Daftar Data Wisata</small>
            <div class="float-right">
                <a href="" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-clockwise"></i></a>
                <a href="tambah.php" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Tambah Data Wisata </a>
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
        <!-- Table Responsiveness -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Nama Wisata</th>
                        <th>Alamat</th>
                        <th>Harga Tiket</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th><i class="bi bi-gear"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $batas = 5; // Data per halaman
                    $hal = @$_GET['hal']; // Halaman saat ini
                    if (empty($hal)) {
                        $posisi = 0;
                        $hal = 1;
                    } else {
                        $posisi = ($hal - 1) * $batas;
                    }
                    $no = $posisi + 1;

                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $pencarian = trim(mysqli_real_escape_string($conn, $_POST['pencarian']));
                        if ($pencarian != '') {
                            $query = "SELECT tb_datawisata.*, tb_kategori.nama_kategori 
                                      FROM tb_datawisata 
                                      JOIN tb_kategori ON tb_datawisata.id_kategori = tb_kategori.id_kategori 
                                      WHERE tb_datawisata.nama_wisata LIKE '%$pencarian%' 
                                      OR tb_kategori.nama_kategori LIKE '%$pencarian%' 
                                      OR tb_datawisata.alamat LIKE '%$pencarian%' 
                                      ORDER BY tb_datawisata.nama_wisata ASC 
                                      LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_datawisata 
                                         JOIN tb_kategori ON tb_datawisata.id_kategori = tb_kategori.id_kategori 
                                         WHERE tb_datawisata.nama_wisata LIKE '%$pencarian%' 
                                         OR tb_kategori.nama_kategori LIKE '%$pencarian%'";
                        } else {
                            $query = "SELECT tb_datawisata.*, tb_kategori.nama_kategori 
                                      FROM tb_datawisata 
                                      JOIN tb_kategori ON tb_datawisata.id_kategori = tb_kategori.id_kategori 
                                      ORDER BY tb_datawisata.nama_wisata ASC 
                                      LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_datawisata 
                                         JOIN tb_kategori ON tb_datawisata.id_kategori = tb_kategori.id_kategori";
                        }
                    } else {
                        $query = "SELECT tb_datawisata.*, tb_kategori.nama_kategori 
                                  FROM tb_datawisata 
                                  JOIN tb_kategori ON tb_datawisata.id_kategori = tb_kategori.id_kategori 
                                  ORDER BY tb_datawisata.nama_wisata ASC 
                                  LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_datawisata 
                                     JOIN tb_kategori ON tb_datawisata.id_kategori = tb_kategori.id_kategori";
                    }

                    $sql_datawisata = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($sql_datawisata) > 0) {
                        while ($data = mysqli_fetch_array($sql_datawisata)) {
                    ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data['nama_kategori'] ?></td>
                                <td><?= $data['nama_wisata'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= "Rp " . number_format($data['harga_tiket'], 0, ',', '.') ?></td>
                                <td><?= $data['latitude'] ?></td>
                                <td><?= $data['longitude'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $data['id_datawisata'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="delete.php?id=<?= $data['id_datawisata'] ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan=\"8\">Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        // Hitung jumlah halaman
        $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
        $jmlHalaman = ceil($jml / $batas);
        echo "<p class='mt-2'>Jumlah Data : <b>$jml</b></p>";

        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-center'>";
        for ($i = 1; $i <= $jmlHalaman; $i++) {
            if ($i == $hal) {
                echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?hal=$i'>$i</a></li>";
            }
        }
        echo "</ul>";
        echo "</nav>";
        ?>
    </div>
</div>

<?php include_once('../footer.php'); ?>