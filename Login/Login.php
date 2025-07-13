<?php
session_start();
include('config.php');
unset($_SESSION['reg_username'], $_SESSION['reg_email']);
$message = '';

if (!empty($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

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

        .login-box {
            position: relative;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.75);
            padding: 60px 68px 40px;
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            border-radius: 8px;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #e0e0e0;
        }

        .form-control:focus {
            background-color: #444;
            color: #fff;
            border-color: rgb(33, 59, 227);
            box-shadow: none;
        }

        .btn-login {
            background-color: rgb(33, 59, 227);
            border: none;
        }

        .btn-login:hover {
            background-color: rgb(23, 4, 167);
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

        .form-check-label,
        .login-footer,
        .footer a {
            color: #b3b3b3;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .recaptcha-text {
            font-size: 11px;
            color: #b3b3b3;
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

        .animekuy-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 2;
            color: white;
            font-weight: 600;
            font-size: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            background-color: #007bff;
            padding: 6px;
            border-radius: 8px;
        }

        .logo-text {
            font-size: 18px;
        }
    </style>

</head>

<body>
    <div class="overlay"></div>

    <!-- Header -->
    <div class="animekuy-header d-flex align-items-center px-4 py-2">
        <a href="/index.php">
            <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                    viewBox="0 0 16 16" class="bi bi-brilliance">
                    <path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16M1 8a7 7 0 0 0 7 7 3.5 3.5 0 1 0 0-7 3.5 3.5 0 1 1 0-7 7 7 0 0 0-7 7" />
                </svg>
                <span class="px-2"> Animekuy</span>
            </span>
        </a>
    </div>

    <div class="login-box">
        <h3 class="mb-4">Login</h3>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>
        <form action="login_proses.php" method="POST">
            <div class="mb-3">
                <input type="email" name="email" required placeholder="Email" class="form-control mb-3">
            </div>
            <div class="mb-3">
                <input type="password" name="password" required placeholder="Password" class="form-control mb-3">
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-login text-white">Masuk</button>
            </div>
        </form>

        <div class="or-divider">atau</div>
        <form>
            <div class="mb-3 d-grid">
                <button type="button" class="btn btn-google">
                    <a href="<?= $url ?>"><img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo" class="me-2">
                        Masuk dengan Google
                    </a>
                </button>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" />
                    <label class="form-check-label" for="rememberMe">Ingat saya</label>
                </div>
                <a href="forget_password.php">Lupa sandi?</a>
            </div>
            <div class="login-footer mt-3">
                <p>Baru di sini? <a href="register.php">Daftar sekarang.</a></p>
                <p class="recaptcha-text">
                    Halaman ini dilindungi oleh Google reCAPTCHA untuk memastikan Anda bukan bot.
                    <a href="#" id="learnMoreLink">Pelajari selengkapnya.</a>
                </p>
                <div id="learnMoreText" class="recaptcha-text mt-2" style="display: none;">
                    Informasi yang dikumpulkan oleh Google reCAPTCHA tunduk pada
                    <a href="https://policies.google.com/privacy" target="_blank">Kebijakan Privasi</a> dan
                    <a href="https://policies.google.com/terms" target="_blank">Persyaratan Layanan</a> Google.
                </div>
            </div>
        </form>
    </div>

    <?php if ($message): ?>
        <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1080;">
            <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= htmlspecialchars($message) ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        document.getElementById('learnMoreLink').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('learnMoreLink').style.display = 'none';
            document.getElementById('learnMoreText').style.display = 'block';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($message): ?>
        <script>
            var toastEl = document.getElementById('successToast');
            var toast = new bootstrap.Toast(toastEl, {
                delay: 4000
            }); 
            toast.show();
        </script>
    <?php endif; ?>

</body>

</html>