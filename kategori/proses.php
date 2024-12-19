<?php
require_once "../_config/config.php";

if (isset($_POST['tambah'])) {
    $id = trim(mysqli_real_escape_string($conn, $_POST['id']));
    $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));

    $sql = "INSERT INTO tb_kategori (id_kategori, nama_kategori) VALUES ('$id', '$nama')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    echo "<script>alert('Data berhasil ditambahkan!');window.location='data.php';</script>";
} elseif (isset($_POST['edit'])) {
    $id = trim(mysqli_real_escape_string($conn, $_POST['id']));
    $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));

    $sql = "UPDATE tb_kategori SET id_kategori = '$id', nama_kategori = '$nama' WHERE id_kategori = '$id'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    echo "<script>alert('Data berhasil diubah!');window.location='data.php';</script>";
}
