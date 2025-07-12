<?php
include 'koneksi/koneksi.php';

$limit = 12;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : null;

if ($search) {
    $query = "SELECT * FROM tb_anime WHERE tipe='donghua' AND judul LIKE '%$search%' ORDER BY judul ASC LIMIT $limit OFFSET $offset";
    $countQuery = "SELECT COUNT(*) as total FROM tb_anime WHERE tipe='donghua' AND judul LIKE '%$search%'";
} else {
    $query = "SELECT * FROM tb_anime WHERE tipe='donghua' ORDER BY judul ASC LIMIT $limit OFFSET $offset";
    $countQuery = "SELECT COUNT(*) as total FROM tb_anime WHERE tipe='donghua'";
}

$result = mysqli_query($conn, $query);
$totalAnime = mysqli_fetch_assoc(mysqli_query($conn, $countQuery))['total'];
$totalPages = ceil($totalAnime / $limit);
