<?php
session_start();
require_once '../koneksi/koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['email'])) {
    http_response_code(401);
    echo json_encode(['status' => 'unauthorized']);
    exit;
}

$id_komentar = $_POST['id_komentar'];
$aksi = $_POST['aksi']; // 'like' atau 'dislike'
$user_email = $_SESSION['email'];

// Cek apakah user sudah pernah reaksi
$sql = "SELECT reaksi FROM tb_komentar_reaksi WHERE id_komentar = ? AND user_email = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("is", $id_komentar, $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['reaksi'] == $aksi) {
        // Jika klik like lagi → hapus
        $stmt = $koneksi->prepare("DELETE FROM tb_komentar_reaksi WHERE id_komentar = ? AND user_email = ?");
        $stmt->bind_param("is", $id_komentar, $user_email);
        $stmt->execute();
        echo json_encode(['status' => 'deleted']);
    } else {
        // Ganti like ↔ dislike
        $stmt = $koneksi->prepare("UPDATE tb_komentar_reaksi SET reaksi = ? WHERE id_komentar = ? AND user_email = ?");
        $stmt->bind_param("sis", $aksi, $id_komentar, $user_email);
        $stmt->execute();
        echo json_encode(['status' => 'updated']);
    }
} else {
    // Belum ada reaksi, insert baru
    $stmt = $koneksi->prepare("INSERT INTO tb_komentar_reaksi (id_komentar, user_email, reaksi) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_komentar, $user_email, $aksi);
    $stmt->execute();
    echo json_encode(['status' => 'inserted']);
}
?>
