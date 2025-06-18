<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<nav class="navbar navbar-expand-md sticky-top bg-dark py-3" data-bs-theme="dark">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="/">
      <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
             viewBox="0 0 16 16" class="bi bi-brilliance">
          <path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16M1 8a7 7 0 0 0 7 7 3.5 3.5 0 1 0 0-7 3.5 3.5 0 1 1 0-7 7 7 0 0 0-7 7"/>
        </svg>
      </span>
      <span>Animekuy</span>
    </a>

    <!-- Hamburger -->
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-5">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navcol-5">
      <ul class="navbar-nav ms-auto align-items-center">
        <!-- MENU UTAMA -->
        <li class="nav-item"><a class="nav-link active" href="#">OnGoing</a></li>
        <li class="nav-item"><a class="nav-link text-capitalize" href="#">Genre</a></li>
        <li class="nav-item d-flex align-items-center">
          <input id="search_anime" type="search" class="form-control form-control-sm me-2" placeholder="Search">
          <a onclick="search_anime()" class="btn btn-sm btn-primary" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                 viewBox="0 0 16 16" class="bi bi-search">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
          </a>
        </li>

        <!-- LOGIN / AVATAR + NAMA -->
        <?php if (!empty($_SESSION['user']) && !empty($_SESSION['avatar'])): ?>
          <!-- Setelah login -->
          <li class="nav-item ms-3 d-flex align-items-center">
            <img src="<?= htmlspecialchars($_SESSION['avatar']) ?>"
                 alt="Avatar" class="rounded-circle me-2"
                 width="36" height="36" style="object-fit:cover;"
                 onerror="this.src=''">
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
