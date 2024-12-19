<?php
require_once '../_config/config.php';

if (isset($_POST['tambah'])) {
    $id_kategori = mysqli_real_escape_string($conn, $_POST['id_kategori']);
    $nama_wisata = mysqli_real_escape_string($conn, $_POST['nama_wisata']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga_tiket = preg_replace('/[^\d]/', '', $_POST['harga_tiket']); // Hanya angka
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);

    // Validasi ID Kategori
    $query_kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = '$id_kategori'");
    if (mysqli_num_rows($query_kategori) > 0) {
        $query_insert = "INSERT INTO tb_datawisata (id_kategori, nama_wisata, alamat, deskripsi, harga_tiket, latitude, longitude) 
                         VALUES ('$id_kategori', '$nama_wisata', '$alamat', '$deskripsi', '$harga_tiket', '$latitude', '$longitude')";
        if (mysqli_query($conn, $query_insert)) {
            echo "<script>alert('Data berhasil disimpan!'); window.location='data.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data!'); window.location='tambah.php';</script>";
        }
    } else {
        echo "<script>alert('Kategori tidak ditemukan!'); window.location='tambah.php';</script>";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $id_kategori = $_POST['kategori'];
    $nama_wisata = mysqli_real_escape_string($conn, $_POST['nama_wisata']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga_tiket = preg_replace('/[^\d]/', '', $_POST['harga_tiket']); // Hanya ambil angka
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);

    $sql = "UPDATE tb_datawisata 
            SET id_kategori = '$id_kategori', 
                nama_wisata = '$nama_wisata', 
                alamat = '$alamat', 
                deskripsi = '$deskripsi',
                harga_tiket = '$harga_tiket', 
                latitude = '$latitude', 
                longitude = '$longitude' 
            WHERE id_datawisata = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil diubah!'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data.'); window.location='edit.php?id=$id';</script>";
    }
}
?>
