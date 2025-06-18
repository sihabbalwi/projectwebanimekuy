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
    // Tambahkan hitung like/dislike dari tabel reaksi
    $id = $row['id_komentar'];
    $res1 = $koneksi->query("SELECT COUNT(*) as total FROM tb_komentar_reaksi WHERE id_komentar=$id AND reaksi='like'");
    $res2 = $koneksi->query("SELECT COUNT(*) as total FROM tb_komentar_reaksi WHERE id_komentar=$id AND reaksi='dislike'");
    $row['jumlah_like'] = $res1->fetch_assoc()['total'];
    $row['jumlah_dislike'] = $res2->fetch_assoc()['total'];

    $row['replies'] = [];
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
