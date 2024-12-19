<?php
include_once('_config/config.php');

// Ambil data berdasarkan ID
$id = @$_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM tb_datawisata WHERE id_datawisata = '$id'") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($sql);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata - <?= $data['nama_wisata']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="_assets/img/bms.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .bg {
            background-image: url('_assets/img/slamet.jpg');
            min-height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
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

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .info-wisata {
            padding: 20px;
            border-radius: 8px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .map-container {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        #map {
            height: 400px;
        }

        .info-wisata .border-bottom {
            border-bottom: 1px solid #ddd;
        }

        .pb-3 {
            padding-bottom: 15px;
        }

        .info-wisata h4 {
            font-size: 1.5rem;
        }

        .info-wisata .bi {
            font-size: 1.5rem;
        }

        .map-container {
            padding: 15px;
            background-color: #ffffff;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        .col-lg-6,
        .col-md-12 {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="bg">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="_assets/img/bms.png" alt="Logo Banyumas" width="50" height="50" class="d-inline-block align-top">
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
            <h1>Detail Informasi Geografis Wisata</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Informasi Wisata -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="info-wisata card shadow-sm">
                    <div class="card-body">
                        <h4><b>Informasi Wisata</b></h4>
                        <br>
                        <!-- Nama Wisata -->
                        <div class="d-flex align-items-center mb-3 border-bottom pb-3">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            <p class="m-0"><strong>Nama Wisata:</strong> <?= $data['nama_wisata']; ?></p>
                        </div>

                        <!-- Alamat -->
                        <div class="d-flex align-items-center mb-3 border-bottom pb-3">
                            <i class="bi bi-geo-alt me-2"></i>
                            <p class="m-0"><strong>Alamat:</strong> <?= $data['alamat']; ?></p>
                        </div>

                        <!-- Deskripsi -->
                        <div class="d-flex align-items-center mb-3 border-bottom pb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <p class="m-0"><strong>Deskripsi:</strong> <?= $data['deskripsi']; ?></p>
                        </div>

                        <!-- Harga Tiket -->
                        <div class="d-flex align-items-center mb-3 border-bottom pb-3">
                            <i class="bi bi-wallet2 me-2"></i>
                            <p class="m-0"><strong>Harga Tiket:</strong> Rp <?= number_format($data['harga_tiket'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lokasi (Google Maps) -->
            <div class="col-lg-6 col-md-12 mb-4">
                <h4><b>Lokasi</b></h4>
                <div class="map-container card shadow-sm">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var location = {
                lat: <?= $data['latitude']; ?>,
                lng: <?= $data['longitude']; ?>
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: '<?= $data['nama_wisata']; ?>'
            });

            marker.addListener('click', function() {
                var gmapsUrl = 'https://www.google.com/maps?q=<?= $data['latitude']; ?>,<?= $data['longitude']; ?>';
                window.open(gmapsUrl, '_blank');
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-xoWwdMkiUzcZElIqpXciA9OHuoUeFjI&callback=initMap"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>