<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeKuy - Genre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <style>
        body {
            background-color: #0d0d0d;
            color: #f1f1f1;
            font-family: 'Outfit', sans-serif;
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
<?php include 'componen/navbar.php'; ?>

<div class="container py-4">
    <div class="row gy-4">
        <div class="col-lg-9">
            <h3 class="mb-3">Anime Genre: <span id="genre_title"></span></h3>
            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-3" id="list_anime"></div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Genre List</h5>
                    <div id="list_genre"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center mt-5">
    <div class="container text-muted py-4">
        <p class="mb-0">AnimeKuy &copy; 2025 - Jangan Lupa Bernafas</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
AOS.init();

$(document).ready(function(){
    const urlParams = new URLSearchParams(window.location.search);
    const genre = urlParams.get('genre') || '';
    $('#genre_title').text(genre);

    // Fetch anime by genre
    $.get("/api/search_genre.php", { genre: genre }, function(result){
        if(result.status && result.result.length > 0){
            let html = '';
            result.result.forEach(anime => {
                html += `
                <div class="col" data-aos="zoom-in">
                    <div onclick="window.location='/detail.php?anime=${anime.id_anime}'" class="card h-100">
                        <img class="card-img-top w-100" style="height: 150px; object-fit: cover" src="${anime.image}">
                        <div class="card-body">
                            <p class="text-primary mb-1">${anime.status}</p>
                            <h5 class="card-title">${anime.judul}</h5>
                            <div class="d-flex align-items-center mt-3">
                                <img class="rounded-circle me-3" width="40" height="40" src="https://png.pngtree.com/png-clipart/20230409/original/pngtree-admin-and-customer-service-job-vacancies-png-image_9041264.png">
                                <div>
                                    <p class="mb-0 fw-bold">Admin</p>
                                    <small class="text-muted">AnimeKuy</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            });
            $('#list_anime').html(html);
            AOS.refresh();
        } else {
            $('#list_anime').html('<div class="col"><p class="text-center">Anime tidak ditemukan untuk genre ini.</p></div>');
        }
    });

    // Fetch genre list
    $.get("/api/list_genre.php", function(result){
        if(result.status && result.result.length > 0){
            let html = '';
            result.result.forEach(item => {
                html += `<a href="/genre.php?genre=${item.genre}" class="card-link">${item.genre}</a>`;
            });
            $('#list_genre').html(html);
        } else {
            $('#list_genre').html('<p class="text-muted">Genre tidak ditemukan.</p>');
        }
    });
});
</script>

</body>
</html>
