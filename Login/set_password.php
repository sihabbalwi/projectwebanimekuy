<?php
session_start();
include '../koneksi/koneksi.php';
$email = $_SESSION['reg_email'] ?? '';
$message = '';

if (empty($email)) {
    $message = "<div class='text-danger mb-2'>Sesi tidak valid. Silakan daftar ulang.</div>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm'] ?? '';

    if (empty($password) || empty($confirm)) {
        $message = "<div class='text-danger mb-2'>Harap isi semua field</div>";
    } elseif ($password !== $confirm) {
        $message = "<div class='text-danger mb-2'>Password dan konfirmasi tidak sama</div>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "UPDATE tb_users SET password='$hash' WHERE email='$email' AND is_verified=1");
        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['success'] = "berhasil daftar! Silakan login.";
            unset($_SESSION['reg_email']);
            header('Location: Login.php');
            exit;
        } else {
            $message = "<div class='text-danger mb-2'>Gagal menyimpan password. Pastikan akun sudah diverifikasi.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Password Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('/assets/img/Bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            height: 100vh;
            margin: 0;
        }

        .overlay {
            background-color: rgba(5, 5, 5, 0.87);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .form-box {
            position: relative;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.75);
            padding: 60px 68px 40px;
            max-width: 400px;
            margin: 80px auto;
            border-radius: 8px;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus {
            background-color: #444;
            color: #fff;
            border-color: rgb(33, 59, 227);
            box-shadow: none;
        }

        .btn-submit {
            background-color: rgb(33, 59, 227);
            border: none;
        }

        .btn-submit:hover {
            background-color: rgb(23, 4, 167);
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="form-box">
        <h3 class="mb-4">Buat Password</h3>
        <?= $message ?>
        <form method="post">
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password baru" required>
            </div>
            <div class="mb-3">
                <input type="password" name="confirm" class="form-control" placeholder="Konfirmasi password" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-submit text-white">SIMPAN PASSWORD</button>
            </div>
        </form>
    </div>
</body>

</html>