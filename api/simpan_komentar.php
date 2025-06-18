<?php
session_start();
require_once '../koneksi/koneksi.php';

header('Content-Type: application/json');

if (!isset($_SESSION['email'])) {
    http_response_code(401);
    echo json_encode(['status' => 'unauthorized']);
    exit;
}

$episode    = $_POST['id_episode'] ?? null;
$komentar   = $_POST['komentar'] ?? $_POST['isi_komentar'] ?? '';
$u_email    = $_SESSION['email'];
$u_nama     = $_SESSION['user'];
$u_avatar   = $_SESSION['avatar'];
$parent_id  = $_POST['parent_id'] ?? null;

if (!$episode || !$komentar) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
    exit;
}

$stmt = $koneksi->prepare("INSERT INTO tb_komentar (id_episode, user_email, user_nama, user_avatar, isi_komentar, parent_id) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssi", $episode, $u_email, $u_nama, $u_avatar, $komentar, $parent_id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan komentar.']);
}
?>