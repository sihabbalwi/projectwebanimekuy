<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include '../koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #1a1a1a;
            color: white;
        }

        .content {
            margin-left: 230px;
            /* Sidebar width */
            padding: 30px;
            min-height: 100vh;
        }

        .table-dark td,
        .table-dark th {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <div class="content">
        <h3 class="mb-4">📊 Dashboard Anime</h3>
        <?php
        $animeList = mysqli_query($conn, "SELECT * FROM tb_anime ORDER BY id_anime DESC");
        ?>
        <table class="table table-dark table-striped table-bordered rounded shadow-sm">
            <thead class="table-secondary text-dark">
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($anime = mysqli_fetch_assoc($animeList)): ?>
                    <tr>

                        <td><?= htmlspecialchars($anime['judul']) ?></td>
                        <td><?= htmlspecialchars($anime['status']) ?></td>
                        <td><?= htmlspecialchars($anime['genre']) ?></td>
                        <td>
                            <a href="edit_anime.php?id=<?= $anime['id_anime'] ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                            <a href="delete_anime.php?id=<?= $anime['id_anime'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">🗑 Hapus</a>
                            <a href="add_episode.php?id_anime=<?= $anime['id_anime'] ?>" class="btn btn-info btn-sm">+ Episode</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>