<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

$client = new Google\Client();
$client->setClientId('319413880233-hnjj95b1nbuk3o4uo083q8n5m4qapgf0.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Login/google_callback.php');
$client->addScope(['email', 'profile']);

if (!isset($_GET['code'])) exit('No code');

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);

$oauth = new Google\Service\Oauth2($client);
$u = $oauth->userinfo->get();

$_SESSION['user']   = $u->name;
$_SESSION['avatar'] = $u->picture;
$_SESSION['email']  = $u->email;

header('Location: /index.php');
exit;
