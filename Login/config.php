<?php

require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

$client->setClientId("319413880233-hnjj95b1nbuk3o4uo083q8n5m4qapgf0.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/Login/google_callback.php");

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

?>