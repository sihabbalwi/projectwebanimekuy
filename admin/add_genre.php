<?php
include '../koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Tambah Genre
if (isset($_POST['submit'])) {
    $genre = strtolower(trim($_POST['genre']));
    if ($genre !== "") {
        $check = mysqli_query($conn, "SELECT * FROM tb_genre WHERE genre = '$genre'");
        if (mysqli_num_rows($check) === 0) {
            $insert = mysqli_query($conn, "INSERT INTO tb_genre (genre) VALUES ('$genre')");
            $msg = $insert ? "✔ Genre berhasil ditambahkan!" : "❌ Gagal menambahkan genre.";
        } else {
            $msg = "⚠ Genre sudah ada.";
        }
    } else {
        $msg = "⚠ Genre tidak boleh kosong.";
    }
}

// Edit Genre
if (isset($_POST['update'])) {
    $old = $_POST['old_genre'];
    $new = strtolower(trim($_POST['new_genre']));
    if ($new !== "") {
        $updateGenre = mysqli_query($conn, "UPDATE tb_genre SET genre='$new' WHERE genre='$old'");
        $updateAnime = mysqli_query($conn, "UPDATE tb_anime SET genre=REPLACE(genre, '$old', '$new') WHERE genre LIKE '%$old%'");
        $msg = ($updateGenre && $updateAnime) ? "✔ Genre berhasil diubah!" : "❌ Gagal mengubah genre.";
    } else {
        $msg = "⚠ Genre baru tidak boleh kosong.";
    }
}

// Hapus Genre
if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $hapus = mysqli_query($conn, "DELETE FROM tb_genre WHERE genre='$del'");
    $msg = $hapus ? "🗑 Genre berhasil dihapus." : "❌ Gagal menghapus genre.";
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelola Genre</title>
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
        <h3 class="mb-4">📚 Kelola Genre</h3>

        <?php if (!empty($msg)): ?>
            <div class="alert alert-info"><?= $msg ?></div>
        <?php endif; ?>

        <!-- Tambah Genre -->
        <form method="POST" class="bg-dark p-4 rounded shadow-sm mb-4">
            <div class="mb-3">
                <label class="form-label">Tambah Genre Baru</label>
                <input type="text" name="genre" class="form-control bg-dark text-white" placeholder="Contoh: action" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">+ Tambah Genre</button>
        </form>
        <!-- Form Edit  -->
        <div id="editForm" class="bg-dark p-4 mt-4 rounded shadow-sm d-none">
            <h5>Edit Genre</h5>
            <form method="POST">
                <input type="hidden" name="old_genre" id="oldGenreInput">
                <div class="mb-3">
                    <input type="text" name="new_genre" id="newGenreInput" class="form-control bg-dark text-white" required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">💾 Simpan Perubahan</button>
                <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Batal</button>
            </form>
        </div>
        <!-- List Genre -->
        <h5 class="mb-3 mt-4">Daftar Genre</h5>
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table class="table table-dark table-bordered table-sm mb-0">
                <thead class="table-secondary text-dark">
                    <tr>
                        <th>Nama Genre</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $genreList = mysqli_query($conn, "SELECT * FROM tb_genre ORDER BY genre ASC");
                    while ($g = mysqli_fetch_assoc($genreList)):
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($g['genre']) ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editGenre('<?= $g['genre'] ?>')">✏ Edit</button>
                                <a href="?delete=<?= urlencode($g['genre']) ?>" onclick="return confirm('Yakin ingin menghapus genre ini?')" class="btn btn-danger btn-sm">🗑 Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function editGenre(oldGenre) {
            document.getElementById('editForm').classList.remove('d-none');
            document.getElementById('oldGenreInput').value = oldGenre;
            document.getElementById('newGenreInput').value = oldGenre;
        }

        function cancelEdit() {
            document.getElementById('editForm').classList.add('d-none');
        }
    </script>
</body>

</html>