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

        footer {
            margin-top: 40px;
            border-top: 1px solid #2c2c2c;
        }

        .watched {
            background-color: #0056b3 !important;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <?php include 'componen/navbar.php'; ?>

    <div class="container py-4">
        <div id="detail_anime">
            <!-- Default fallback -->
            <div class="hero-banner" style="background-image: url('https://cdn.bootstrapstudio.io/placeholders/1400x800.png')">
                <div class="hero-content">
                    <h1 class="hero-title">ISEKAI MAOU TO SHOUNKAN</h1>
                    <p class="hero-desc">Sit est suspendisse dolor, luctus netus. Leo euismod vel, etiam nisl non eu lacus magna consectetur hac. Semper per aenean.</p>
                </div>
            </div>
        </div>

        <div class="episode-list mt-4">
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
        var id_anime = <?= $_GET['anime'] ?>;
        $.get("/api/detail.php", {
            "anime": id_anime
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

                let list = "";
                result.list_episode.forEach(listItem => {
                    list += `<li class="list-group-item episode-item" data-episode="${listItem.episode}" data-anime="${listItem.id_anime}">
                    Episode ${listItem.episode}</li>`;
                });
                $("#list_episode").html(list);
                // Tandai yang sudah ditonton
                let watched = JSON.parse(localStorage.getItem('watchedEpisodes') || '{}');
                let watchedList = watched[id_anime] || [];

                $(".episode-item").each(function() {
                    const episode = $(this).data('episode');
                    if (watchedList.includes(episode)) {
                        $(this).addClass('watched');
                    }

                    $(this).click(function() {
                        if (!watched[id_anime]) watched[id_anime] = [];
                        if (!watched[id_anime].includes(episode)) {
                            watched[id_anime].push(episode);
                            localStorage.setItem('watchedEpisodes', JSON.stringify(watched));
                        }
                        window.location = `/view.php?anime=${id_anime}&episode=${episode}`;
                    });
                });
                document.title = result.detail.judul + " | AnimeKuy";
            } else {
                $("#detail_anime").html("<center><h1>ANIME/VIDEO NOT FOUND</h1></center>");
                $("#list_episode").hide();
            }
        });
    </script>
</body>

</html>