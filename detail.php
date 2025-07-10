<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Anime</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(145deg, #0f0f0f, #1b1b1b);
            color: #fff;
            font-family: 'Outfit', sans-serif;
        }

        .anime-card {
            background: #1c1c1c;
            border: none;
            border-radius: 14px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .anime-card:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 30px rgba(255, 255, 255, 0.15);
        }

        .anime-card .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;
        }

        .anime-card .card-body {
            padding: 12px;
        }

        .anime-card .card-title {
            font-size: 1rem;
            font-weight: bold;
        }

        .anime-card .card-text {
            font-size: 0.85rem;
            color: #ccc;
        }

        .hero-banner {
            position: relative;
            height: 550px;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 30px;
            background-size: cover;
            background-position: center;
        }

        .hero-banner::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), #121212 80%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 40px;
            max-width: 800px;
            text-align: center;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .hero-desc {
            font-size: 1rem;
            color: #ccc;
        }

        .episode-list {
            background-color: #1e1e1e;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            max-height: 350px;
            overflow-y: auto;
        }

        .list-group-item {
            background-color: transparent;
            color: #fff;
            border: 1px solid #333;
            margin-bottom: 8px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .list-group-item:hover {
            background-color: #2a2a2a;
            transform: translateX(4px);
        }

        .watched {
            background-color: #0056b3 !important;
            color: #fff !important;
        }

        footer {
            margin-top: 40px;
            border-top: 1px solid #2c2c2c;
        }
    </style>
</head>

<body>
    <?php include 'componen/navbar.php'; ?>

    <div class="container py-4">
        <div id="detail_anime"></div>

        <div class="episode-list mt-4" id="episode_container" style="display: none;">
            <h4 class="mb-3">Daftar Episode</h4>
            <ul class="list-group list-group-flush" id="list_episode"></ul>
        </div>
    </div>

    <footer class="text-center text-muted py-4">
        <p class="mb-0">Jangan Lupa Bernafas</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param) || '';
        }

        const keyword = getQueryParam('search');
        const id_anime = getQueryParam('anime');

        if (keyword !== '') {
            $.get(`/api/search.php?search=${encodeURIComponent(keyword)}`, function(res) {
                if (res.status) {
                    let html = `<div class="container"><div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">`;
                    res.result.forEach(anime => {
                        html += `
                    <div class="col">
                    <div class="card anime-card" onclick="window.location='detail.php?anime=${anime.id_anime}'">
                        <img src="${anime.image}" class="card-img-top" alt="${anime.judul}">
                        <div class="card-body">
                        <h5 class="card-title text-truncate">${anime.judul}</h5>
                        <p class="card-text text-truncate">${anime.genre}</p>
                        <a href="detail.php?anime=${anime.id_anime}" class="btn btn-sm btn-outline-light mt-2">Lihat Detail</a>
                        </div>
                    </div>
                    </div>`;
                    });
                    html += `</div></div>`;
                    $("#detail_anime").html(html);
                    $("#episode_container").hide();
                } else {
                    $("#detail_anime").html("<h3 class='text-center'>Anime tidak ditemukan.</h3>");
                }
            });
        } else if (id_anime !== '') {
            $.get("/api/detail.php", {
                anime: id_anime
            }, function(result) {
                if (result.status) {
                    $("#detail_anime").html(`
                    <div class="hero-banner" style="background-image: url('${result.detail.image}')">
                    <div class="hero-content">
                        <h1 class="hero-title">${result.detail.judul}</h1>
                        <p class="hero-desc">${result.detail.deskripsi}</p>
                    </div>
                    </div>
                `);

                    let watched = JSON.parse(localStorage.getItem('watchedEpisodes') || '{}');
                    let watchedList = watched[id_anime] || [];

                    let list = '';
                    result.list_episode.forEach((listItem) => {
                        let isWatched = watchedList.includes(listItem.episode);
                        let watchedClass = isWatched ? 'watched' : '';
                        list += `<li class="list-group-item episode-item ${watchedClass}" data-episode="${listItem.episode}" data-anime="${listItem.id_anime}">
                       Episode ${listItem.episode}</li>`;
                    });

                    $("#list_episode").html(list);
                    $("#episode_container").show();

                    $(".episode-item").click(function() {
                        const episode = $(this).data('episode');
                        if (!watched[id_anime]) watched[id_anime] = [];
                        if (!watched[id_anime].includes(episode)) {
                            watched[id_anime].push(episode);
                            localStorage.setItem('watchedEpisodes', JSON.stringify(watched));
                        }
                        window.location = `/view.php?anime=${id_anime}&episode=${episode}`;
                    });

                    document.title = result.detail.judul + " | AnimeKuy";
                } else {
                    $("#detail_anime").html("<center><h1>ANIME/VIDEO NOT FOUND</h1></center>");
                }
            });
        } else {
            $("#detail_anime").html("<h3 class='text-center'>Parameter tidak valid.</h3>");
        }
    </script>
</body>

</html>