<?php
session_start();
include '../koneksi/koneksi.php';
require 'config_mail.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$code = rand(100000,999999);

$_SESSION['reg_email'] = $email;
$_SESSION['reg_username'] = $username;

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$email'"));
if($user){
    mysqli_query($conn, "UPDATE tb_users SET verif_code='$code', name='$username' WHERE email='$email'");
} else {
    mysqli_query($conn, "INSERT INTO tb_users (email, verif_code, login_type, name) VALUES ('$email','$code','manual','$username')");
}

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username=MAIL_USER;
    $mail->Password=MAIL_PASS;
    $mail->SMTPSecure='tls';
    $mail->Port=587;

    $mail->setFrom(MAIL_USER, 'Animekuy');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject='Kode Verifikasi Animekuy';
    $mail->Body="Kode verifikasi Anda adalah: <b>$code</b>";
    $mail->send();

    header('Location: verify_code.php'); exit;
} catch (Exception $e) {
    echo "Gagal kirim email. Error: {$mail->ErrorInfo}";
}
?>
