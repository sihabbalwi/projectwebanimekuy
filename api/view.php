<?php
header("content-type: application/json");

use Simplon\Mysql\Mysql;
use Simplon\Mysql\PDOConnector;

require_once("vendor/autoload.php");

$pdo = new PDOConnector(
    'localhost', // server
    'root',      // user
    '',      // password
    'db_anime'   // database
);

$pdoConn = $pdo->connect('utf8', []);
$dbConn = new Mysql($pdoConn);

if (isset($_GET['anime'], $_GET['episode'])) {
    $id_anime = $_GET['anime'];
    $episode = $_GET['episode'];
    $data_episode = $dbConn->fetchRow("
    SELECT e.*, a.judul, a.image 
    FROM tb_episode e 
    JOIN tb_anime a ON a.id_anime = e.id_anime 
    WHERE e.id_anime = $id_anime AND e.episode = $episode
");


    if (!($data_episode == null)) {
        echo json_encode([
            "status" => true,
            "result" => $data_episode
        ], JSON_PRETTY_PRINT);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Episode tidak ditemukan"
        ], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Parameter tidak valid"
    ], JSON_PRETTY_PRINT);
}
