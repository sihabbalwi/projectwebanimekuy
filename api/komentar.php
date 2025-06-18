<?php
require_once '../koneksi/koneksi.php';

$episode = $_GET['id_episode'] ?? 0;
$sql = "SELECT * FROM tb_komentar WHERE id_episode = ? ORDER BY waktu ASC";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $episode);
$stmt->execute();

$result = $stmt->get_result();
$rawKomentar = [];

while ($row = $result->fetch_assoc()) {
    $row['replies'] = []; // Default kosong
    $rawKomentar[] = $row;
}

// Proses struktur nested
$komentar = [];
$index = [];

foreach ($rawKomentar as &$row) {
    $index[$row['id_komentar']] = &$row;
}

foreach ($rawKomentar as &$row) {
    if (!empty($row['parent_id'])) {
        $index[$row['parent_id']]['replies'][] = &$row;
    } else {
        $komentar[] = &$row;
    }
}

header('Content-Type: application/json');
echo json_encode($komentar);
?>
