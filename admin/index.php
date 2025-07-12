<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include '../koneksi/koneksi.php';

$jmlAnime = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_anime"))[0];
$jmlEpisode = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_episode"))[0];
$jmlGenre = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_genre"))[0];
$jmlBanner = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_banner"))[0];

$statusQ = mysqli_query($conn, "SELECT status, COUNT(*) as total FROM tb_anime GROUP BY status");
$statusData = [];
while ($row = mysqli_fetch_assoc($statusQ)) {
    $statusData[$row['status']] = $row['total'];
}
$genreQ = mysqli_query($conn, "
    SELECT genre, COUNT(*) as total FROM tb_anime 
    GROUP BY genre 
    ORDER BY total DESC LIMIT 5
");
$genreLabels = [];
$genreCounts = [];
while ($row = mysqli_fetch_assoc($genreQ)) {
    $genreLabels[] = $row['genre'];
    $genreCounts[] = $row['total'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .card-summary {
            background: #212529;
            border: none;
            border-radius: 12px;
            padding: 20px;
            color: #fff;
            transition: all 0.3s ease;
        }

        .card-summary:hover {
            background: #2a2f36;
            transform: translateY(-3px);
        }

        .table-dark td,
        .table-dark th {
            vertical-align: middle;
        }

        #statusChart {
            max-height: 277px;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <div class="content">
        <h3 class="mb-4">📊 Dashboard </h3>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card-summary text-center shadow">
                    <i class="bi bi-collection-play" style="font-size: 2rem;"></i>
                    <h5 class="mt-2">Total Anime</h5>
                    <h3><?= $jmlAnime ?></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-summary text-center shadow">
                    <i class="bi bi-film" style="font-size: 2rem;"></i>
                    <h5 class="mt-2">Total Episode</h5>
                    <h3><?= $jmlEpisode ?></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-summary text-center shadow">
                    <i class="bi bi-people" style="font-size: 2rem;"></i>
                    <h5 class="mt-2">Total Genre</h5>
                    <h3><?= $jmlGenre ?></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-summary text-center shadow">
                    <i class="bi bi-images" style="font-size: 2rem;"></i>
                    <h5 class="mt-2">Total Banner</h5>
                    <h3><?= $jmlBanner ?></h3>
                </div>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card-summary shadow">
                        <h5 class="mb-3 text-center">Anime per Status</h5>
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-summary shadow">
                        <h5 class="mb-3 text-center">Top 5 Genre</h5>
                        <canvas id="genreChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

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
    <script>
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'pie',
            data: {
                labels: <?= json_encode(array_keys($statusData)) ?>,
                datasets: [{
                    data: <?= json_encode(array_values($statusData)) ?>,
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#6f42c1'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                }
            }
        });

        const genreCtx = document.getElementById('genreChart').getContext('2d');
        new Chart(genreCtx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($genreLabels) ?>,
                datasets: [{
                    label: 'Jumlah Anime',
                    data: <?= json_encode($genreCounts) ?>,
                    backgroundColor: '#0d6efd'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white',
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>