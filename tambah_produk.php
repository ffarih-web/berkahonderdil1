<?php
include "config.php";
include "form.php";

$form = new Form("tambah_produk.php");

// Ambil data mobil dari tabel model untuk dropdown
$models = [];
$sql = "SELECT id_mobil, model FROM model";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $models[$row['id_mobil']] = $row['model'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_mobil  = $_POST['id_mobil'];
    $nama      = $_POST['nama'];
    $stock     = $_POST['stock'];
    $grade     = $_POST['grade'];
    $harga     = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO sparepart (id_mobil, nama, stock, grade, harga, deskripsi) 
            VALUES ('$id_mobil', '$nama', '$stock', '$grade', '$harga', '$deskripsi')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success text-center fw-bold'>Sparepart berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger text-center fw-bold'>Error: " . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Sparepart - Toko Onderdil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #eceff1, #f8f9fa);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
