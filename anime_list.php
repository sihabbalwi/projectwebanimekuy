<?php include 'Api/anime_list.php'; ?>
<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">

<head>
  <meta charset="UTF-8">
  <title>Anime List - AnimeKuy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #fff;
      font-family: 'Outfit', sans-serif;
    }

    .card {
      background: #1c1c1c;
      border: none;
      border-radius: 14px;
      transition: all 0.3s ease-in-out;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
      cursor: pointer;
    }

    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 12px 30px rgba(255, 255, 255, 0.1);
    }

    .card-title {
      font-size: 1rem;
    }

    .pagination .page-link {
      background-color: #1c1c1c;
      border: 1px solid #333;
      color: #fff;
    }

    .pagination .page-link:hover {
      background-color: #333;
    }

    .pagination .active .page-link {
      background-color: #007bff;
      border-color: #007bff;
    }
  </style>
</head>

<body>
  <?php include 'componen/navbar.php'; ?>

  <div class="container mt-4">
    <h3 class="mb-4">Anime List</h3>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
      <?php while ($anime = mysqli_fetch_assoc($result)): ?>
        <div class="col">
          <div class="card h-100 text-white" onclick="window.location='detail.php?anime=<?= $anime['id_anime'] ?>'">
            <img src="<?= $anime['image'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title text-truncate"><?= htmlspecialchars($anime['judul']) ?></h5>
              <p class="card-text text-truncate small"><?= htmlspecialchars($anime['genre']) ?></p>
              <a href="detail.php?anime=<?= $anime['id_anime'] ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <!-- Navigasi Halaman -->
  <nav class="mt-4">
    <ul class="pagination justify-content-center">
      <?php if ($page > 1): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $page - 1 ?>">Sebelumnya</a>
        </li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($page < $totalPages): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $page + 1 ?>">Berikutnya</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
