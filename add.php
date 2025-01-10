<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];

    $stmt = $mysqli->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit, genre) 
                              VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $judul_buku, $penulis, $penerbit, $tahun_terbit, $genre);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2 class="text-center">Tambah Buku</h2>
    <form method="POST" class="w-50 mx-auto">
        <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Tambah Buku</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
