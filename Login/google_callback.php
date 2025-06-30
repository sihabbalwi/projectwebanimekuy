<?php
session_start();
include '../koneksi/koneksi.php';
require __DIR__ . '/vendor/autoload.php';

$client = new Google\Client();
$client->setClientId('319413880233-hnjj95b1nbuk3o4uo083q8n5m4qapgf0.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Login/google_callback.php');
$client->addScope(['email', 'profile']);

if (isset($_GET['error'])) {
    header('Location: /Login/Login.php?msg=cancelled');
    exit;
}

if (!isset($_GET['code'])) {
    header('Location: /Login/Login.php?msg=no_code');
    exit;
}

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);

$oauth = new Google\Service\Oauth2($client);
$u = $oauth->userinfo->get();

$_SESSION['user']   = $u->name;
$_SESSION['avatar'] = $u->picture;
$_SESSION['email']  = $u->email;

$stmt = $conn->prepare("SELECT id FROM tb_users WHERE email = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $name = $_SESSION['user'];
    $email = $_SESSION['email'];
    $avatar = $_SESSION['avatar'];
    $login_type = 'google';

    $insert = $conn->prepare("INSERT INTO tb_users (name, email, avatar, login_type) VALUES (?, ?, ?, ?)");
    $insert->bind_param("ssss", $name, $email, $avatar, $login_type);
    $insert->execute();
}

header('Location: /index.php');
exit;
