<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include_once("config.php");
$result = $mysqli->query("SELECT * FROM buku ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Perpustakaan</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="add.php">Tambah Buku</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<!-- Daftar Buku -->
<div class="container my-5">
    <h1 class="text-center mb-4">Daftar Buku Perpustakaan</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Genre</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($book_data = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $book_data['judul_buku'] . "</td>";
                echo "<td>" . $book_data['penulis'] . "</td>";
                echo "<td>" . $book_data['penerbit'] . "</td>";
                echo "<td>" . $book_data['tahun_terbit'] . "</td>";
                echo "<td>" . $book_data['genre'] . "</td>";
                echo "<td><a href='edit.php?id={$book_data['id']}' class='btn btn-warning btn-sm'>Edit</a>
                          <a href='delete.php?id={$book_data['id']}' class='btn btn-danger btn-sm'>Delete</a></td>";
                echo "</tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
