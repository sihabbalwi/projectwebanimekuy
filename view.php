<?php
session_start();
$episode = isset($_GET['episode']) ? intval($_GET['episode']) : 0;
function generateAvatarSVG($name)
{
    $initial = strtoupper(substr($name, 0, 1));
    $colors = ['#dc3545', '#0d6efd', '#6f42c1', '#20c997', '#fd7e14', '#198754', '#6610f2'];
    $color = $colors[ord($initial) % count($colors)];
    $svg = '<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="50" fill="' . $color . '" />
        <text x="50%" y="54%" text-anchor="middle" font-size="50" fill="#ffffff" font-family="Arial" dy=".3em">' . $initial . '</text>
    </svg>';
    return 'data:image/svg+xml;base64,' . base64_encode($svg);
}
?>
<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streaming Episode</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #0d0d0d;
            color: #fff;
            font-family: 'Outfit', sans-serif;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            padding-top: 40%;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            margin-bottom: 30px;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .episode-list {
            max-height: 300px;
            overflow-y: auto;
            background-color: #1c1c1c;
            border-radius: 10px;
            padding: 10px;
        }

        .episode-item {
            padding: 10px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            background-color: #2a2a2a;
            transition: 0.3s;
            cursor: pointer;
        }

        .episode-item:hover {
            background-color: #3c3c3c;
        }

        .episode-item.watched {
            background-color: #0056b3 !important;
            color: #fff !important;
        }

        .btn-group-center {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .video-wrapper:hover #episode_label {
            display: block !important;
        }
    </style>
</head>

<body>
    <?php include 'componen/navbar.php'; ?>
    <div class="container py-4">
        <div class="video-wrapper position-relative">
            <div id="episode_label" class="position-absolute top-0 start-0 bg-primary px-3 py-1 rounded-bottom-end" style="z-index: 1;">
                <strong>Episode <?= $episode ?></strong>
            </div>
            <iframe id="video_player" allowfullscreen></iframe>
        </div>
        <div class="btn-group-center mb-4">
            <button id="button_prev" class="btn btn-outline-light">&laquo; Sebelumnya</button>
            <button id="button_deskripsi" class="btn btn-primary">Lihat Deskripsi</button>
            <button id="button_next" class="btn btn-outline-light">Berikutnya &raquo;</button>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Komentar</h3>
                <div class="card bg-transparent text-light">
                    <div class="card-body">
                        <?php if (isset($_SESSION['user'])): ?>
                            <div class="mb-3 d-flex align-items-center gap-2">
                                <img src="<?= !empty($_SESSION['avatar']) ? $_SESSION['avatar'] : generateAvatarSVG($_SESSION['user']) ?>" alt="Avatar" class="rounded-circle" width="40" height="40">
                                <b><?= $_SESSION['user'] ?></b>
                            </div>
                            <form onsubmit="kirimKomentar(event)">
                                <textarea id="isiKomentar" class="form-control mb-2" placeholder="Tulis komentar..." required></textarea>
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-warning">Silakan <a href="/Login/Login.php">login dengan Google</a> untuk berkomentar.</div>
                        <?php endif; ?>
                        <hr>
                        <div id="list-komentar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Episode</h5>
                        <div class="episode-list" id="list_episode"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var idAnime = <?= json_encode($_GET['anime'] ?? 0) ?>;
        var episodeID = <?= json_encode($_GET['episode'] ?? 0) ?>;
        var userEmail = <?= json_encode($_SESSION['email'] ?? null) ?>;
        var namaUser = <?= json_encode($_SESSION['user'] ?? null) ?>;
        var avatarUser = <?= json_encode($_SESSION['avatar'] ?? null) ?>;
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore-compat.js"></script>
    <script src="assets/js/Komentar.js"></script>

    <script>
        const numericEpisode = parseInt(episodeID);
        if (isNaN(numericEpisode)) numericEpisode = 0;

        function watchEpisode(epNum) {
            let watched = JSON.parse(localStorage.getItem('watchedEpisodes') || '{}');
            if (!watched[idAnime]) watched[idAnime] = [];
            if (!watched[idAnime].includes(epNum)) {
                watched[idAnime].push(epNum);
                localStorage.setItem('watchedEpisodes', JSON.stringify(watched));
            }
            window.location = `/view.php?anime=${idAnime}&episode=${epNum}`;
        }

        $.get("/api/detail.php", {
            anime: idAnime
        }, function(result) {
            const totalEpisode = result.list_episode.length;

            if (numericEpisode + 1 <= totalEpisode) {
                $("#button_next")
                    .prop("disabled", false)
                    .off("click")
                    .on("click", function() {
                        watchEpisode(numericEpisode + 1);
                    });
            } else {
                $("#button_next").prop("disabled", true);
            }

            if (numericEpisode > 1) {
                $("#button_prev")
                    .prop("disabled", false)
                    .off("click")
                    .on("click", function() {
                        watchEpisode(numericEpisode - 1);
                    });
            } else {
                $("#button_prev").prop("disabled", true);
            }

            $("#episode_label").text("Episode " + episodeID);

            let watched = JSON.parse(localStorage.getItem("watchedEpisodes") || "{}");
            let watchedList = watched[idAnime] || [];
            let data_html = "";
            result.list_episode.forEach((ep) => {
                let watchedClass = watchedList.includes(ep.episode) ? "watched" : "";
                data_html += `<div class="episode-item ${watchedClass}" data-episode="${ep.episode}" onclick="watchEpisode(${ep.episode})">Episode ${ep.episode}</div>`;
            });
            $("#list_episode").html(data_html);

            document.title = result.detail.judul + " | AnimeKuy";
        });

        $.get("/api/view.php", {
            anime: idAnime,
            episode: numericEpisode
        }, function(result) {
            $("#video_player").attr("src", result.result.video);

            const history = JSON.parse(localStorage.getItem("watchHistory") || "[]");

            const exists = history.find(item => item.id_anime == result.result.id_anime);

            if (exists) {
                exists.episode = result.result.episode;
                exists.image = result.result.image;
                exists.judul = result.result.judul;
                exists.updated = Date.now();
            } else {
                history.push({
                    id_anime: result.result.id_anime,
                    episode: result.result.episode,
                    judul: result.result.judul,
                    image: result.result.image,
                    updated: Date.now()
                });
            }

            history.sort((a, b) => b.updated - a.updated);

            localStorage.setItem("watchHistory", JSON.stringify(history));
        });

        $("#button_deskripsi").attr("onclick", `window.location = './detail.php?anime=${idAnime}'`);

        setTimeout(() => {
            document.getElementById('episode_label')?.classList.add('d-none');
        }, 5000);
    </script>
</body>

</html>