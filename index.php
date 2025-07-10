<?php
session_start();
include 'koneksi/koneksi.php';
include 'componen/navbar.php';

$bannerQ = mysqli_query($conn, "SELECT * FROM tb_banner ORDER BY id DESC");
?>
<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeKuy</title>
    <link rel="icon" href="assets/img/vavicon.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <style>
        body {
            background-color: #0d0d0d;
            color: #f1f1f1;
            font-family: 'Outfit', sans-serif;
            scroll-behavior: smooth;
        }

        .banner-img {
            height: 600px;
            object-fit: cover;
            border-radius: 12px;
        }

        .carousel-inner {
            border-radius: 12px;
            overflow: hidden;
            position: relative;
        }

        .fade-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background: linear-gradient(to right, rgba(13, 13, 13, 1) 0%, rgba(13, 13, 13, 0) 20%, rgba(13, 13, 13, 0) 80%, rgba(13, 13, 13, 1) 100%);
            pointer-events: none;
        }

        .card {
            background: #1c1c1c;
            border: none;
            border-radius: 14px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 28px rgba(255, 255, 255, 0.15);
        }

        .card-title {
            font-size: 0.95rem;
        }

        #list_genre a.card-link {
            display: inline-block;
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border-radius: 20px;
            padding: 6px 14px;
            margin: 5px;
            font-size: 0.85rem;
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }

        #list_genre a.card-link:hover {
            background: #0b5ed7;
            color: #fff;
        }

        footer {
            margin-top: 40px;
            background: #1a1a1a;
            padding-top: 40px;
            border-top: 1px solid #2c2c2c;
        }

        footer p,
        footer a {
            color: #999;
        }

        footer a:hover {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container my-4 position-relative">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded shadow">
                <?php
                $first = true;
                while ($b = mysqli_fetch_assoc($bannerQ)) :
                ?>
                    <div class="carousel-item <?= $first ? 'active' : '' ?>">
                        <img src="admin/uploads/<?= htmlspecialchars($b['image']) ?>" class="d-block w-100 banner-img" alt="banner">
                    </div>
                <?php
                    $first = false;
                endwhile;
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg>
                </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span>
            </button>
        </div>
        <div class="fade-overlay"></div>
    </div>
    <div class="container">
        <div class="row gy-3">
            <h2>Newly Released</h2>
            <div class="col-md-8">
                <div id="list_anime" class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3">
                    <div class="col" data-aos="zoom-in">
                        <div class="card">
                            <img class="card-img-top w-100" style="height: 150px; object-fit: cover" src="https://i1.sndcdn.com/artworks-K05A0K7BJJmkbRhU-Gicqvg-t500x500.jpg">
                            <div class="card-body">
                                <p class="text-primary mb-1">Episode 50</p>
                                <h5 class="card-title">Isekai Maou to Shoukan</h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img class="rounded-circle me-3" width="40" height="40" src="https://png.pngtree.com/png-clipart/20230409/original/pngtree-admin-and-customer-service-job-vacancies-png-image_9041264.png">
                                    <div>
                                        <p class="mb-0 fw-bold">Admin</p>
                                        <small class="text-muted">18:20</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="mt-4">
                    <ul class="pagination justify-content-center" id="pagination"></ul>
                </nav>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Genre</h5>
                        <div id="list_genre"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-inline mb-3">
                <li class="list-inline-item me-4"><a href="#">Just</a></li>
                <li class="list-inline-item me-4"><a href="#">for</a></li>
                <li class="list-inline-item"><a href="#">Fun</a></li>
            </ul>
            <p class="mb-0">Jangan Lupa Bernafas</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
        // Fetch anime list from API
        function loadAnime(page = 1) {
            $.get(`/api/list.php?page=${page}`, function(data) {
                let html_data = "";
                data.result.forEach((anime) => {
                    html_data += `
                    <div class="col" data-aos="zoom-in">
                        <div onclick="window.location = '/detail.php?anime=${anime.detail_anime.id_anime}'" class="card">
                            <img class="card-img-top w-100" style="height: 150px; object-fit: cover" src="${anime.detail_anime.image}">
                            <div class="card-body">
                                <p class="text-primary mb-1">Episode ${anime.episode}</p>
                                <h5 class="card-title">${anime.detail_anime.judul}</h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img class="rounded-circle me-3" width="40" height="40" src="https://png.pngtree.com/png-clipart/20230409/original/pngtree-admin-and-customer-service-job-vacancies-png-image_9041264.png">
                                    <div>
                                        <p class="mb-0 fw-bold">${anime.publisher}</p>
                                        <small class="text-muted">${anime.waktu}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                });
                $("#list_anime").html(html_data);

                currentPage = data.currentPage;
                totalPages = data.totalPages;
                renderPagination();
            });
        }

        function renderPagination() {
            let paginationHTML = '';
            if (currentPage > 1) {
                paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="loadAnime(${currentPage - 1}); return false;">Sebelumnya</a></li>`;
            }
            for (let i = 1; i <= totalPages; i++) {
                paginationHTML += `<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" onclick="loadAnime(${i}); return false;">${i}</a></li>`;
            }
            if (currentPage < totalPages) {
                paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="loadAnime(${currentPage + 1}); return false;">Berikutnya</a></li>`;
            }
            $("#pagination").html(paginationHTML);
        }
        let currentPage = 1;
        let totalPages = 1;
        $(document).ready(function() {
            loadAnime();
        });
        // Genre Fetch
        $.get("/api/list_genre.php", function(result) {
            var html_data = "";
            result.result.forEach((anime) => {
                html_data += `<a class="card-link" href="/genre.php?genre=${anime.genre}">${anime.genre}</a>`;
            });
            $("#list_genre").html(html_data);
        });
    </script>
</body>

</html>