<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include '../koneksi/koneksi.php';

// Statistik jumlah
$jmlAnime = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_anime"))[0];
$jmlEpisode = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_episode"))[0];
$jmlGenre = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_genre"))[0];
$jmlBanner = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tb_banner"))[0];

// Statistik berdasarkan status
$statusQ = mysqli_query($conn, "SELECT status, COUNT(*) as total FROM tb_anime GROUP BY status");
$statusData = [];
while ($row = mysqli_fetch_assoc($statusQ)) {
    $statusData[$row['status']] = $row['total'];
}

// Statistik berdasarkan tipe
$tipeQ = mysqli_query($conn, "SELECT tipe, COUNT(*) as total FROM tb_anime GROUP BY tipe");
$tipeData = [];
while ($row = mysqli_fetch_assoc($tipeQ)) {
    $tipeData[$row['tipe']] = $row['total'];
}

// Top 5 Genre tunggal
$genreMap = [];
$animeGenres = mysqli_query($conn, "SELECT genre FROM tb_anime");
while ($row = mysqli_fetch_assoc($animeGenres)) {
    $genres = preg_split('/\s*\|\s*/', strtolower($row['genre']));
    foreach ($genres as $g) {
        if (!empty($g)) {
            $genreMap[$g] = ($genreMap[$g] ?? 0) + 1;
        }
    }
}
arsort($genreMap);
$genreLabels = array_slice(array_keys($genreMap), 0, 5);
$genreCounts = array_slice(array_values($genreMap), 0, 5);

$animeList = mysqli_query($conn, "SELECT * FROM tb_anime ORDER BY id_anime DESC");
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

        #statusChart,
        #genreChart {
            max-height: 277px;
            margin: auto;
        }

        .table-responsive {
            max-height: 440px;
            overflow-y: auto;
        }

        .table-responsive::-webkit-scrollbar {
            width: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #666;
            border-radius: 10px;
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
                    <h5 class="mt-2">Anime</h5>
                    <h3><?= $tipeData['anime'] ?? 0 ?></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-summary text-center shadow">
                    <i class="bi bi-film" style="font-size: 2rem;"></i>
                    <h5 class="mt-2">Donghua</h5>
                    <h3><?= $tipeData['donghua'] ?? 0 ?></h3>
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
        </div>

        <!-- Grafik -->
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

        <!-- Tabel Anime -->
        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered mb-0">
                <thead class="table-secondary text-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Tipe</th>
                        <th>Genre</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($anime = mysqli_fetch_assoc($animeList)): ?>
                        <tr>
                            <td><?= htmlspecialchars($anime['judul']) ?></td>
                            <td><?= htmlspecialchars($anime['status']) ?></td>
                            <td><?= htmlspecialchars($anime['tipe'] ?? '-') ?></td>
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
    </div>

    <!-- Grafik JS -->
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
                    label: 'Jumlah',
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
                            color: 'white'
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