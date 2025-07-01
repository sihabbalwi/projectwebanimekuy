<?php 
header("content-type: application/json");
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

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$limit = 12;
$offset = ($page - 1) * $limit;

$total = $dbConn->fetchColumn("SELECT COUNT(*) FROM tb_episode");
$totalPages = ceil($total / $limit);

$result = $dbConn->fetchRowMany("SELECT * FROM tb_episode ORDER BY id_episode DESC LIMIT $limit OFFSET $offset");
$result_fix = [];
foreach($result as $list){
    $list = (object)$list;
    $list->detail_anime = $dbConn->fetchRow("SELECT * FROM tb_anime WHERE id_anime=$list->id_anime");
    $result_fix[] = $list;
}

// Kirim data + info pagination
echo json_encode([
    'result' => $result_fix,
    'totalPages' => $totalPages,
    'currentPage' => $page
], JSON_PRETTY_PRINT);
?>
