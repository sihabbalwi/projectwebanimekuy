<?php
session_start();
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tb_users (name, email, password, login_type) VALUES (?, ?, ?, 'manual')");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['user'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['avatar'] = ""; 
        header("Location: Login.php");
    } else {
        echo "Registrasi gagal: " . $stmt->error;
    }
}
?>
