<?php
header("Content-Type: application/json");

use Simplon\Mysql\Mysql;
use Simplon\Mysql\PDOConnector;

require_once("vendor/autoload.php");

$pdo = new PDOConnector(
    'localhost',
    'root',
    '',
    'db_anime'
);
$pdoConn = $pdo->connect('utf8', []);
$dbConn = new Mysql($pdoConn);

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $limit = 12;
    $offset = ($page - 1) * $limit;

    $totalRow = $dbConn->fetchRow(
        "SELECT COUNT(*) as total FROM tb_anime WHERE judul LIKE :search",
        ['search' => "%$search%"]
    );
    $totalData = $totalRow ? (int)$totalRow['total'] : 0;
    $totalPages = $totalData > 0 ? ceil($totalData / $limit) : 1;

    $dataSearch = $dbConn->fetchRowMany(
        "SELECT * FROM tb_anime WHERE judul LIKE :search ORDER BY id_anime DESC LIMIT $limit OFFSET $offset",
        ['search' => "%$search%"]
    );

    if (!empty($dataSearch)) {
        echo json_encode([
            "status" => true,
            "result" => $dataSearch,
            "total_pages" => $totalPages,
            "total_data" => $totalData,
            "current_page" => $page
        ], JSON_PRETTY_PRINT);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Tidak ditemukan"
        ], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Parameter tidak valid"
    ], JSON_PRETTY_PRINT);
}
