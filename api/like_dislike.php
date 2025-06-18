<?php
require_once '../koneksi/koneksi.php';
session_start();

header('Content-Type: application/json');

if (!isset($_POST['id_komentar']) || !isset($_POST['aksi'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
    exit;
}

$id_komentar = intval($_POST['id_komentar']);
$aksi = $_POST['aksi']; // 'like' atau 'dislike'

$field = $aksi === 'like' ? 'jumlah_like' : ($aksi === 'dislike' ? 'jumlah_dislike' : null);
if (!$field) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Aksi tidak valid']);
    exit;
}

$stmt = $koneksi->prepare("UPDATE tb_komentar SET {$field} = {$field} + 1 WHERE id_komentar = ?");
$stmt->bind_param("i", $id_komentar);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Gagal update like/dislike']);
}
?>
