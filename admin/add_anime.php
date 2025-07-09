<?php include '../koneksi/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Anime</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #1a1a1a;
            color: white;
        }

        .content {
            margin-left: 230px;
            padding: 30px;
        }
    </style>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <div class="content">
        <h3 class="mb-4">➕ Tambah Anime Baru</h3>
        <form method="post" class="bg-dark p-4 rounded shadow-sm">
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control bg-dark text-white" required></textarea>
            </div>
            <div class="mb-3">
                <label>Link Cover</label>
                <input type="text" name="image" class="form-control bg-dark text-white" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select bg-dark text-white">
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Genre </label>
                <input type="text" name="genre" class="form-control bg-dark text-white" required>
            </div>
            <button type="submit" class="btn btn-success">✅ Simpan</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $image = $_POST['image'];
            $status = $_POST['status'];
            $genre = $_POST['genre'];
            $q = "INSERT INTO tb_anime (judul,deskripsi,image,status,genre) VALUES ('$judul','$deskripsi','$image','$status','$genre')";
            if (mysqli_query($conn, $q)) {
                echo "<div class='alert alert-success mt-2'>✔ Berhasil ditambahkan!</div>";
            } else {
                echo "<div class='alert alert-danger mt-2'>❌ Gagal: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
    </div>
</body>

</html>