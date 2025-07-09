<?php
session_start();
include '../koneksi/koneksi.php';

if (isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM tb_users WHERE email='$email' AND login_type='manual'");
    $user = mysqli_fetch_assoc($q);
    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['admin'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Email atau kata sandi salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('/assets/img/Bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
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

        .login-box {
            position: relative;
            z-index: 1;
            background: rgba(0, 0, 0, 0.75);
            padding: 60px 68px 40px;
            max-width: 400px;
            margin: 100px auto;
            border-radius: 8px;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
        }

        .form-control:focus {
            background-color: #444;
            color: #fff;
            border-color: rgb(33, 59, 227);
            box-shadow: none;
        }

        .btn-login {
            background: rgb(33, 59, 227);
            border: none;
        }

        .btn-login:hover {
            background: rgb(23, 4, 167);
        }

        .animekuy-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: rgba(0, 0, 0, 0.85);
            z-index: 2;
            color: white;
            font-weight: 600;
            font-size: 20px;
        }
                .form-control::placeholder {
            color: #e0e0e0;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>

    <div class="login-box">
        <h3 class="mb-4">Login Admin</h3>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
            <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Kata sandi" required></div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-login text-white">Masuk</button>
            </div>
        </form>
    </div>
</body>

</html>