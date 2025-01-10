<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("DELETE FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>
