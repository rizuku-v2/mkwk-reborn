<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../includes/db.php';

$id = $_GET['id'];
$query_get = mysqli_query($conn, "SELECT gambar_thumbnail FROM berita WHERE id = $id");
$data = mysqli_fetch_assoc($query_get);

if ($data) {
    if (file_exists('../assets/img/uploads/' . $data['gambar_thumbnail'])) {
        unlink('../assets/img/uploads/' . $data['gambar_thumbnail']);
    }
    mysqli_query($conn, "DELETE FROM berita WHERE id = $id");
}

header("Location: index.php");
exit;
?>