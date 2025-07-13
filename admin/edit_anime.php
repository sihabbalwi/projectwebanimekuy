<?php
include '../koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tb_anime WHERE id_anime='$id'");
$anime = mysqli_fetch_assoc($data);

$genreResult = mysqli_query($conn, "SELECT genre FROM tb_genre ORDER BY genre ASC");
$genreList = [];
while ($row = mysqli_fetch_assoc($genreResult)) {
    $genreList[] = $row['genre'];
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $status = $_POST['status'];
    $tipe = $_POST['tipe'];
    $genre = trim($_POST['genre']);

    $update = mysqli_query($conn, "UPDATE tb_anime SET judul='$judul', status='$status', genre='$genre', tipe='$tipe' WHERE id_anime='$id'");
    if ($update) {
        echo "<script>alert('Data berhasil diubah'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Anime</title>
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
            min-height: 100vh;
        }

        .genre-badge {
            cursor: pointer;
            transition: 0.2s ease;
        }

        .genre-badge:hover {
            background-color: #0d6efd !important;
        }
    </style>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>

    <div class="content">
        <h2>Edit Anime</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Judul Anime</label>
                <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($anime['judul']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Ongoing" <?= $anime['status'] == 'Ongoing' ? 'selected' : '' ?>>Ongoing</option>
                    <option value="Completed" <?= $anime['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" id="genreInput" name="genre" class="form-control" value="<?= htmlspecialchars($anime['genre']) ?>" required>
                <div id="genreList" class="mt-2 d-flex flex-wrap gap-2">
                    <?php foreach ($genreList as $g): ?>
                        <span class="badge bg-secondary genre-badge" onclick="addGenre('<?= $g ?>')"><?= ucwords($g) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <select name="tipe" class="form-control">
                    <option value="anime" <?= $anime['tipe'] == 'anime' ? 'selected' : '' ?>>Anime</option>
                    <option value="donghua" <?= $anime['tipe'] == 'donghua' ? 'selected' : '' ?>>Donghua</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        function addGenre(genre) {
            const input = document.getElementById('genreInput');
            let current = input.value.split('|').map(g => g.trim()).filter(g => g !== '');
            if (!current.includes(genre)) {
                current.push(genre);
                input.value = current.join(' | ');
            }
        }
    </script>

</body>

</html>