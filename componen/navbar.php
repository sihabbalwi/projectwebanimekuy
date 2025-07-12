<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function generateAvatarColor($name)
{
  $colors = [
    '#dc3545', // merah
    '#0d6efd', // biru
    '#6f42c1', // ungu
    '#20c997', // teal
    '#fd7e14', // oranye
    '#198754', // hijau
    '#6610f2', // indigo
  ];

  $index = ord(strtoupper($name[0])) % count($colors);
  return $colors[$index];
}
?>

<nav class="navbar navbar-expand-md sticky-top py-3" style="background-color: #121212;" data-bs-theme="dark">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="/">
      <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
          viewBox="0 0 16 16" class="bi bi-brilliance">
          <path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16M1 8a7 7 0 0 0 7 7 3.5 3.5 0 1 0 0-7 3.5 3.5 0 1 1 0-7 7 7 0 0 0-7 7" />
        </svg>
      </span>
      <span>Animekuy</span>
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-5">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navcol-5">
      <ul class="navbar-nav ms-auto align-items-center">
        <!-- MENU UTAMA -->
        <li class="nav-item ms-2 px-2">
          <a class="nav-link d-flex align-items-center text-light px-3 py-2 rounded hover-shadow" href="/anime_list.php" style="gap: 6px;">
            <span>Anime List</span>
          </a>
        </li>
        <li class="nav-item ms-2 px-2">
          <a class="nav-link d-flex align-items-center text-light px-3 py-2 rounded hover-shadow" href="/history.php" style="gap: 6px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
              <path d="M8.515 3.465a.5.5 0 0 1 1 0V8a.5.5 0 0 1-.5.5H7a.5.5 0 0 1 0-1h1.515V3.465z" />
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM1 8a7 7 0 1 1 7 7A7 7 0 0 1 1 8z" />
            </svg>
          </a>
        </li>
        <li class="nav-item d-flex align-items-center">
          <input id="search_anime" type="search" class="form-control form-control-sm me-2" placeholder="Search">
          <a onclick="search_anime()" class="btn btn-sm btn-primary" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
              viewBox="0 0 16 16" class="bi bi-search">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
          </a>
        </li>

        <!-- LOGIN / AVATAR + NAMA -->
        <?php if (!empty($_SESSION['user'])): ?>
          <li class="nav-item ms-3 d-flex align-items-center">
            <?php if (!empty($_SESSION['avatar'])): ?>
              <img src="<?= htmlspecialchars($_SESSION['avatar']) ?>"
                alt="Avatar" class="rounded-circle me-2"
                width="36" height="36" style="object-fit:cover;"
                onerror="this.src='/assets/img/seele.jpeg'">
            <?php else: ?>
              <?php
              $initial = strtoupper(substr($_SESSION['user'], 0, 1));
              $avatarColor = generateAvatarColor($_SESSION['user']);
              ?>
              <div class="avatar-circle me-2" style="background-color: <?= $avatarColor ?>;">
                <span class="initial"><?= $initial ?></span>
              </div>
            <?php endif; ?>

            <span class="text-white me-2 d-none d-md-inline"><?= htmlspecialchars($_SESSION['user']) ?></span>
          </li>
          <li class="nav-item">
            <a href="/Login/logout.php" class="btn btn-sm btn-outline-light">Logout</a>
          </li>
        <?php else: ?>
          <!-- Sebelum login -->
          <li class="nav-item ms-3">
            <a href="/Login/Login.php" class="btn btn-outline-light d-flex align-items-center px-3 py-1">
              <img src="/assets/img/seele.jpeg" alt="Login" class="rounded-circle me-2" width="32" height="32">
              <span class="d-none d-md-inline">Login</span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!--  CSS -->
<style>
  .avatar-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: white;
    font-size: 16px;
    text-transform: uppercase;
  }

  .avatar-circle .initial {
    line-height: 1;
  }

  .hover-shadow:hover {
    background-color: #0d6efd;
    /* Bootstrap btn-primary */
    color: white !important;
    transition: all 0.3s ease;
  }
</style>

<!-- Search Enter Handler -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const input = document.getElementById("search_anime");

    input.addEventListener("keypress", function(e) {
      if (e.key === "Enter") {
        e.preventDefault();
        search_anime();
      }
    });
  });

  function search_anime() {
    const keyword = document.getElementById("search_anime").value.trim();
    if (keyword !== "") {
      window.location.href = `/search.php?search=${encodeURIComponent(keyword)}`;
    }
  }
</script>