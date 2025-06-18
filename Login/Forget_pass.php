<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
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
            margin-top: 100px;
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
        <h3 class="mb-4">Lupa Kata Sandi</h3>
        <p class="mb-3">Masukkan email Anda untuk mereset kata sandi.</p>
        <form>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-submit text-white">Kirim Tautan Reset</button>
            </div>
            <div class="mt-3">
                <a href="login.php">Kembali ke halaman login</a>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
</body>

</html>