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
    <li><a href="add_anime.php" class="nav-link"><i class="bi bi-plus-circle me-2"></i>Tambah Anime</a></li>
    <li><a href="add_episode.php" class="nav-link"><i class="bi bi-film me-2"></i>Tambah Episode</a></li>
    <li><a href="admin_banner.php" class="nav-link"><i class="bi bi-film me-2"></i>banner</a></li>
  </ul>
  <hr>
  <ul>
    <a href="logout.php" class="nav-link"><i class="bi bi-house me-2"></i>Logout</a>
  </ul>
  <div class="text-center small mt-2 text-secondary">© <?= date('Y') ?> Animekuy</div>
</div>