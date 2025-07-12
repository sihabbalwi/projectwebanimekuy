<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
  .sidebar-custom {
    background: linear-gradient(180deg, #212632, #151922);
    width: 220px;
    height: 100vh;
    position: fixed;
  }

  .sidebar-custom a.nav-link {
    color: #ccc;
    border-radius: 6px;
    padding: 8px 12px;
    margin-bottom: 4px;
    transition: all 0.2s;
  }

  .sidebar-custom a.nav-link:hover,
  .sidebar-custom a.nav-link.active {
    background-color: rgba(33, 59, 227, 0.2);
    color: #fff;
  }
</style>

<div class="d-flex flex-column flex-shrink-0 p-3 sidebar-custom">
  <a href="index.php" class="d-flex align-items-center mb-3 text-white text-decoration-none">
    <i class="bi bi-speedometer2 fs-4 me-2"></i><span class="fs-5 fw-semibold">Animekuy Admin</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">

    <li><a href="index.php" class="nav-link"><i class="bi bi-house me-2"></i>Dashboard</a></li>

    <li>
      <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#animeSubmenu" role="button" aria-expanded="false" aria-controls="animeSubmenu">
        <span><i class="bi bi-collection me-2"></i>Anime</span>
        <i class="bi bi-chevron-down"></i>
      </a>
      <div class="collapse <?php if ($currentPage == 'add_anime.php' || $currentPage == 'add_episode.php') echo 'show'; ?>" id="animeSubmenu">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-3">
          <li>
            <a href="add_anime.php" class="nav-link <?php if ($currentPage == 'add_anime.php') echo 'active'; ?>">➕ Tambah Anime</a>
          </li>
          <li>
            <a href="add_episode.php" class="nav-link <?php if ($currentPage == 'add_episode.php') echo 'active'; ?>">🎬 Tambah Episode</a>
          </li>
        </ul>
      </div>
    </li>

    <li><a href="admin_banner.php" class="nav-link"><i class="bi bi-images me-2"></i>Banner</a></li>
  </ul>
  <hr>
  <ul>
    <a href="logout.php" class="nav-link"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
  </ul>
  <div class="text-center small mt-2 text-secondary">© <?= date('Y') ?> Animekuy</div>
</div>