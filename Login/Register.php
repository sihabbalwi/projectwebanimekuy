<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <style>
        body {
            background: url('https://w.wallhaven.cc/full/0w/wallhaven-0w2de6.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            height: 100vh;
            margin: 0;
        }

        .overlay {
            background-color: rgba(19, 19, 19, 0.7);
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
            margin: auto;
            margin-top: 80px;
            border-radius: 8px;
        }

        .form-control {
            background-color: #333;
            border: none;
            color: #fff;
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

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus {
            background-color: #444;
            color: #fff;
            border-color: #e50914;
            box-shadow: none;
        }

        .btn-submit {
            background-color: #e50914;
            border: none;
        }

        .btn-submit:hover {
            background-color: #f40612;
        }

        a {
            color: #b3b3b3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="form-box">
        <h3 class="mb-4">Daftar Sekarang</h3>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nama Lengkap" required />
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Kata Sandi" required />
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-submit text-white">Daftar</button>
            </div>
            <div class="or-divider">atau</div>

            
            <div class="mb-3 d-grid">
               <button type="button" class="btn" style="background-color: white; color: #444; border: 1px solid #ccc;">
                  <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo" class="me-2">
                  Masuk dengan Google
               </button>
            </div>

            <div class="mt-3">
                <p>Sudah punya akun? <a href="Login.php">Masuk di sini</a></p>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
</body>

</html>