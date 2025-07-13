<?php 

include '../koneksi/koneksi.php';

$genreResult = mysqli_query($conn, "SELECT genre FROM tb_genre ORDER BY genre ASC");
$genreList = [];
while ($row = mysqli_fetch_assoc($genreResult)) {
    $genreList[] = $row['genre'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $tipe = $_POST['tipe'];
    $genre = trim($_POST['genre']);

    $q = "INSERT INTO tb_anime (judul,deskripsi,image,status,genre,tipe) 
    VALUES ('$judul','$deskripsi','$image','$status','$genre','$tipe')";

    if (mysqli_query($conn, $q)) {
        echo "<div class='alert alert-success mt-2'>✔ Berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger mt-2'>❌ Gagal: " . mysqli_error($conn) . "</div>";
    }
}
?>
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
                <label>Genre</label>
                <input type="text" id="genreInput" name="genre" class="form-control bg-dark text-white" placeholder="Klik genre di bawah atau ketik manual" required>
                <div id="genreList" class="mt-2 d-flex flex-wrap gap-2">
                    <?php foreach ($genreList as $g): ?>
                        <span class="badge bg-secondary genre-badge" onclick="addGenre('<?= $g ?>')"><?= ucwords($g) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mb-3">
                <label>Tipe</label>
                <select name="tipe" class="form-select bg-dark text-white">
                    <option value="anime">Anime</option>
                    <option value="donghua">Donghua</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">✅ Simpan</button>
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
