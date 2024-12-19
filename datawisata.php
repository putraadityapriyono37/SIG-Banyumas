<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Data Wisata - Sistem Informasi Geografis Wisata</title>
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link rel="icon" href="_assets/img/bms.png">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .bg {
            background-image: url('_assets/img/slamet.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #FFD700 !important;
        }

        .centered-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .centered-content h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .centered-content p {
            font-size: 1.2rem;
        }

        .table-container {
            margin: 3rem auto;
            max-width: 90%;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="bg">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img alt="Logo Banyumas" class="d-inline-block align-top" height="50" src="_assets/img/bms.png" width="50" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="datawisata.php">Data Wisata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/login.php">Login Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="centered-content">
            <h1>Data Wisata</h1>
            <p>Halaman Ini memuat Informasi Tempat Wisata di Kabupaten Banyumas</p>
        </div>
    </div>
    <div class="table-container">
        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Wisata</th>
                    <th>Alamat</th>
                    <th>Harga Tiket</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('_config/config.php');
                $query = "SELECT * FROM tb_datawisata ORDER BY nama_wisata ASC";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$data['nama_wisata']}</td>";
                        echo "<td>{$data['alamat']}</td>";
                        echo "<td>Rp " . number_format($data['harga_tiket'], 0, ',', '.') . "</td>";
                        echo "<td><a href='detail.php?id={$data['id_datawisata']}' class='btn btn-custom'>📍 Detail dan Lokasi</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script crossorigin="anonymous" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>