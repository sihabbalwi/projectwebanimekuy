<?php
session_start();
include('config.php');
$username_value = $_SESSION['reg_username'] ?? '';
$email_value = $_SESSION['reg_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .or-divider {
            text-align: center;
            margin: 15px 0;
            color: #888;
            position: relative;
        }

        .or-divider::before,
        .or-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #444;
        }

        .or-divider::before {
            left: 0;
        }

        .or-divider::after {
            right: 0;
        }

        a {
            color: #b3b3b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-google {
            background-color: #fff;
            color: #000;
            font-weight: 500;
            border: 1px solid #ccc;
        }

        .btn-google:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="form-box">
        <h3 class="mb-4">Daftar Sekarang</h3>
        <form method="post" action="send_verif_code.php">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?= htmlspecialchars($username_value) ?>" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Masukkan emailmu" value="<?= htmlspecialchars($email_value) ?>" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-submit text-white">Kirim kode</button>
            </div>
        </form>
        <div class="or-divider">atau</div>
        <form>
            <div class="mb-3 d-grid">
                <button type="button" class="btn btn-google">
                    <a href="<?= $url ?>"><img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo" class="me-2">
                        Masuk dengan Google
                </button>
            </div>

            <div class="mt-3">
                <p><a href="Login.php">Sudah punya akun? Masuk di sini</a></p>
            </div>
        </form>
    </div>
</body>

</html>