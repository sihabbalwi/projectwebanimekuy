<?php
session_start();
include '../koneksi/koneksi.php';
$message = '';
$email = $_SESSION['reg_email'] ?? '';

if (empty($email)) {
    $message = "<div class='text-danger mb-2'>Sesi tidak valid. Silakan daftar ulang.</div>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify'])) {
    $code = trim($_POST['code'] ?? '');
    if (empty($code)) {
        $message = "<div class='text-danger mb-2'>Harap isi kode verifikasi</div>";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$email' AND verif_code='$code'");
        if (mysqli_num_rows($check) > 0) {
            mysqli_query($conn, "UPDATE tb_users SET is_verified=1 WHERE email='$email'");
            header('Location: set_password.php');
            exit;
        } else {
            $message = "<div class='text-danger mb-2'>Kode salah!</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Kode</title>
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
        <h3 class="mb-4">Verifikasi Kode</h3>
        <?= $message ?>
        <form method="post">
            <div class="mb-3">
                <input type="text" name="code" class="form-control" placeholder="Kode verifikasi" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" name="verify" class="btn btn-submit text-white">VERIFIKASI</button>
            </div>
        </form>
    </div>
</body>

</html>