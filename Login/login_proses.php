<?php
session_start();
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE email = ? AND login_type = 'manual'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user']   = $user['name'];
            $_SESSION['email']  = $user['email'];
            $_SESSION['avatar'] = $user['avatar'];
            header("Location: /index.php");
            exit;
        } else {
            header("Location: Login.php?error=Password salah!");
            exit;
        }
    } else {
    header("Location: Login.php?error=Akun tidak ditemukan!");
    exit;
}
}
?>
