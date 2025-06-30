<?php
session_start();
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cari user manual
    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE email = ? AND login_type='manual'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Update password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE tb_users SET password = ? WHERE email = ? AND login_type='manual'");
        $stmt->bind_param("ss", $hashed, $email);
        $stmt->execute();

        header("Location: Login.php?success=Password berhasil direset, silakan login.");
        exit;
    } else {
        header("Location: forget_password.php?error=Email tidak ditemukan.");
        exit;
    }
}
?>
