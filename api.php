<?php
require_once '../_config/config.php';

// Mendapatkan jumlah tempat wisata
$query_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_datawisata");
$row_count = mysqli_fetch_assoc($query_count);
$total_wisata = $row_count['total'];

// Mendapatkan data wisata
$query = mysqli_query($conn, "SELECT * FROM tb_datawisata");
$data_wisata = [];

while ($row = mysqli_fetch_assoc($query)) {
    // Menyusun data wisata yang dibutuhkan untuk peta
    $data_wisata[] = [
        'id' => $row['id_datawisata'],
        'nama' => $row['nama_wisata'],
        'latitude' => (float) $row['latitude'], // Pastikan kolom latitude ada
        'longitude' => (float) $row['longitude'], // Pastikan kolom longitude ada
        'alamat' => $row['alamat'],
        'deskripsi' => $row['deskripsi'],
        'harga_tiket' => $row['harga_tiket'],
        'lokasi' => $row['lokasi']
    ];
}

// Membuat response JSON
$response = [
    'total_wisata' => $total_wisata,
    'data' => $data_wisata
];

// Menyusun header untuk response JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
