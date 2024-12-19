<?php
require_once '_config/config.php';

// Query untuk mengambil jumlah tempat wisata
$query_count = "SELECT COUNT(*) AS total_wisata FROM tb_datawisata";
$sql_count = mysqli_query($conn, $query_count);
$data_count = mysqli_fetch_assoc($sql_count);
$total_wisata = $data_count['total_wisata'];

// Query untuk mengambil data wisata (termasuk latitude dan longitude)
$query_wisata = "SELECT * FROM tb_datawisata";
$sql_wisata = mysqli_query($conn, $query_wisata);
$wisata_data = [];
while ($row = mysqli_fetch_assoc($sql_wisata)) {
    $wisata_data[] = $row;
}

$lat_sum = 0;
$lng_sum = 0;
$count = count($wisata_data);

foreach ($wisata_data as $data) {
    $lat_sum += $data['latitude'];
    $lng_sum += $data['longitude'];
}

// Menghitung pusat peta (rata-rata latitude dan longitude)
$center_lat = $lat_sum / $count;
$center_lng = $lng_sum / $count;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sistem Informasi Geografis Wisata</title>
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
            height: 100vh;
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

        .content {
            position: absolute;
            top: 50%;
            left: 5%;
            transform: translateY(-50%);
            text-align: left;
            color: white;
            max-width: 500px;
            padding-right: 10px;
        }

        .content h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .content p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 20px auto;
        }

        .btn-custom {
            background-color: #FFD700;
            color: black;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #FFC107;
        }

        .map-section h2,
        .counter-section h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .counter {
            font-size: 3rem;
            font-weight: bold;
            color: #007BFF;
        }

        .counter-icon {
            font-size: 3rem;
            color: #007BFF;
        }
    </style>
</head>

<body>
    <!-- Background Section -->
    <div class="bg">
        <!-- Navbar -->
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

        <!-- Main Content -->
        <div class="content">
            <h5>SISTEM INFORMASI GEOGRAFIS WISATA</h5>
            <h1>KABUPATEN BANYUMAS</h1>
            <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Banyumas. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Banyumas.</p>
            <a class="btn btn-custom" href="#detail">LIHAT DETAIL</a>
        </div>
    </div>

    <!-- Peta Lokasi Section -->
    <section class="map-section py-5" id="detail">
        <div class="container">
            <h2 class="text-center">Peta Lokasi Wisata</h2>
            <div id="map" style="height: 500px; width: 100%;"></div>
        </div>
    </section>
    <section class="counter-section py-5 bg-light text-center">
        <div class="container">
            <h2 class="text-center">Jangkauan Peta</h2>
            <p>Aplikasi pemetaan geografis Wisata di kabupaten Banyumas ini memuat informasi dan lokasi dari Wisata di Banyumas.</p>
            <p>Pemetaan diambil dari data lokasi Google Maps dan data dari website masing-masing tempat wisata.</p>
        </div>
    </section>
    <!-- Jumlah Tempat Wisata Section -->
    <section class="counter-section py-5 bg-light text-center">
        <div class="container">
            <h2>Jumlah Tempat Wisata</h2>
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-map-marker-alt counter-icon me-3"></i>
                <span class="counter"><?= $total_wisata ?></span>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12, // Sesuaikan zoom peta
                center: {
                    lat: <?= $center_lat ?>,
                    lng: <?= $center_lng ?>
                }
            });

            // Menambahkan marker untuk setiap tempat wisata
            <?php foreach ($wisata_data as $data) : ?>
                var marker = new google.maps.Marker({
                    position: {
                        lat: <?= $data['latitude'] ?>,
                        lng: <?= $data['longitude'] ?>
                    },
                    map: map,
                    title: '<?= $data['nama_wisata'] ?>'
                });

                // Event listener untuk klik pada marker
                marker.addListener('click', function() {
                    // Mengarahkan ke Google Maps dengan latitude dan longitude wisata
                    var gmapsUrl = 'https://www.google.com/maps?q=<?= $data['latitude'] ?>,<?= $data['longitude'] ?>';
                    window.open(gmapsUrl, '_blank'); // Membuka di tab baru
                });
            <?php endforeach; ?>
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-xoWwdMkiUzcZElIqpXciA9OHuoUeFjI&callback=initMap"></script>

</body>

</html>