<?php
session_start();
include '../koneksi/koneksi.php';
require 'config_mail.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$code = rand(100000, 999999);

// simpan email ke session
$_SESSION['reset_email'] = $email;

// cek user
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$email'"));
if ($user) {
    mysqli_query($conn, "UPDATE tb_users SET verif_code='$code' WHERE email='$email'");
    // kirim email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USER;
        $mail->Password = MAIL_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom(MAIL_USER, 'Animekuy');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Kode Reset Password Animekuy';
        $mail->Body = "Kode reset password Anda adalah: <b>$code</b>";
        $mail->send();

        header('Location: verify_reset_code.php');
        exit;
    } catch (Exception $e) {
        echo "Gagal kirim email. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "❌ Email tidak ditemukan! <a href='forgot_password.php'>Coba lagi</a>";
}
