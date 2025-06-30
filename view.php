<?php
session_start();
$episode = isset($_GET['episode']) ? intval($_GET['episode']) : 0;
function generateAvatarSVG($name) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="apple-touch-icon" type="image/jpg" sizes="180x180" href="assets/img/vavicon.jpg">
    <link rel="icon" type="image/jpg" sizes="512x512" href="assets/img/vavicon.jpg">
    <link rel="icon" type="image/jpg" sizes="512x512" href="assets/img/vavicon.jpg" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/jpg" sizes="512x512" href="assets/img/vavicon.jpg">
    <link rel="icon" type="image/jpg" sizes="512x512" href="assets/img/vavicon.jpg" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/jpg" sizes="180x180" href="assets/img/vavicon.jpg">
    <link rel="icon" type="image/jpg" sizes="192x192" href="assets/img/vavicon.jpg">
    <link rel="icon" type="image/jpg" sizes="512x512" href="assets/img/vavicon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json" crossorigin="use-credentials">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.c/ajaomx/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
<style>
        #list-komentar button {
    font-size: 12px;
    padding: 2px 8px;
    }
    #list-komentar .fw-bold {
    font-size: 14px;
    }
    #list-komentar p {
    margin-bottom: 4px;
    }
    #list-komentar .ms-5 {
    border-left: 2px solid #555;
    padding-left: 10px;
    }

</style>
</head>

<body>
    <?php include 'componen/navbar.php'; ?>
    <div class="container pulse animated" style="height: 50vh;"><iframe id="video_player" allowfullscreen="" frameborder="0" src="" width="100%" height="100%" style="padding-bottom: 20px;"></iframe></div>
    <div class="container pulse animated">
        <div class="row gy-3">
            <div class="col-lg-12 text-center align-self-center">
                <div class="card border">
                    <div class="card-body position-relative">
                        <div class="d-flex justify-content-between align-items-center position-relative" style="min-height: 60px;">
                            <div>
                                <button id="likeButton" class="btn btn-outline-primary d-flex align-items-center" style="gap: 5px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="#0d6efd">
                                        <path d="M2 21h4V9H2v12zM23 10c0-1.1-.9-2-2-2h-5.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L15.17 2 8.59 8.59C8.22 8.95 8 9.45 8 10v10c0 1.1.9 2 2 2h7c.82 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-1.0z"/>
                                    </svg>
                                    <span id="likeCount">0</span>
                                </button>
                            </div>

                            <div class="position-absolute start-50 translate-middle-x">
                                <div class="d-flex gap-2">
                                    <button id="button_prev" class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-5">
                                            <path d="M177.5 414c-8.8 3.8-19 2-26-4.6l-144-136C2.7 268.9 0 262.6 0 256s2.7-12.9 7.5-17.4l144-136c7-6.6 17.2-8.4 26-4.6s14.5 12.5 14.5 22l0 72 288 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32l-288 0 0 72c0 9.6-5.7 18.2-14.5 22z"></path>
                                        </svg>
                                    </button>

                                    <button id="button_deskripsi" class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-5">
                                            <path d="M64 32C28.7 32 0 60.7 0 96v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm48 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM64 288c-35.3 0-64 28.7-64 64v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V352c0-35.3-28.7-64-64-64H64zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm56 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"></path>
                                        </svg>
                                    </button>

                                    <button id="button_next" class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-5">
                                            <path d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div style="width: 44px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="detail_anime" class="col-lg-8">
                <section class="text-white" style="padding: 0px;padding-top: 0px;">
                </section>
            </div>
            <div class="row">
            <!-- Komentar -->
            <!-- Firebase SDK -->
            <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js"></script>
            <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore-compat.js"></script>

            <div class="col-lg-8 mb-4">
            <h3 class="text-light">Komentar</h3>

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
                    <div class="alert alert-warning">
                    Silakan <a href="/Login/Login.php">login dengan Google</a> terlebih dahulu untuk memberikan komentar.
                    </div>
                <?php endif; ?>
                <hr>
                <div id="list-komentar"></div>
                </div>
            </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Episode</h4>
                        <ul class="list-group" id="list_episode" style="overflow-y: scroll; height:250px;">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        var id_anime = <?=$_GET['anime']?>;
        var episode = <?=$_GET['episode']?>;
        //video_player

        $.get("/api/detail.php",{
            "anime":id_anime
        },function(result){
            if (result.list_episode.length > episode){
                $("#button_next").attr("disabled",false);
                $("#button_next").attr("onclick", `window.location="/view.php?anime=${id_anime} &episode=${episode + 1}"`);
            }else{
                $("#button_next").attr("disabled",true);
            }

            if (episode >= 2){
                $("#button_prev").attr("disabled",false);
                $("#button_prev").attr("onclick",`window.location="/view.php?anime=${id_anime}&episode=${episode - 1}"`);
            }else{
                $("#button_prev").attr("disabled",true);
            }
            

            var data_html = "";
            result.list_episode.forEach((list)=>{
                data_html += `<li class="list-group-item" onclick="window.location='/view.php?anime=${list.id_anime}&episode=${list.episode}'"><span>Episode ${list.episode}</span></li>`;
            })

            $("#list_episode").html(data_html);

                document.title = result.detail.judul + " | AnimeKuy";

        })

        $.get("/api/view.php",{
            "anime":id_anime,
            "episode":episode
        },function(result){
            console.log(result);
            $("#video_player").attr("src",result.result.video);
        })

        $("#button_deskripsi").attr("onclick",`window.location = "./detail.php?anime=${id_anime}"`);
    </script>
    <script>
        const idAnime = parseInt(<?= json_encode($_GET['anime'] ?? 0) ?>);
        const episodeID = parseInt(<?= json_encode($_GET['episode'] ?? 0) ?>);
        const namaUser = <?= json_encode($_SESSION['user'] ?? null) ?>;
        const avatarUser = <?= json_encode(
            !empty($_SESSION['avatar']) 
                ? $_SESSION['avatar'] 
                : (isset($_SESSION['user']) ? generateAvatarSVG($_SESSION['user']) : null)
        ) ?>;
        const userEmail = <?= json_encode($_SESSION['email'] ?? null) ?>;
    </script>
    <script src="assets/js/Komentar.js"></script>

    <!-- Like dibawah video -->
    <script>
        const likeBtn = document.getElementById("likeButton");
        const likeCountEl = document.getElementById("likeCount");

        const firestore = firebase.firestore();
        const likeDocId = `anime${idAnime}_ep${episodeID}_` + (userEmail || "guest");
        const likeRef = firestore.collection("likes").doc(likeDocId);

        // Hitung total like realtime
        firestore.collection("likes")
        .where("id_anime", "==", idAnime)
        .where("episode", "==", episodeID)
        .onSnapshot(snapshot => {
            likeCountEl.textContent = snapshot.size;
        });

        // Status awal
        function updateLikeStatus() {
        if (!userEmail) {
            likeBtn.disabled = true;
            return;
        }

        likeRef.get().then(doc => {
            if (doc.exists) {
            likeBtn.classList.add("liked");
            } else {
            likeBtn.classList.remove("liked");
            }
        });
        }

        likeBtn.addEventListener("click", () => {
        if (!userEmail) return alert("Login untuk menyukai video.");

        likeRef.get().then(doc => {
            if (doc.exists) {
            likeRef.delete().then(updateLikeStatus);
            } else {
            likeRef.set({
                id_anime: idAnime,
                episode: episodeID,
                email: userEmail,
                waktu: new Date()
            }).then(updateLikeStatus);
            }
        });
        });

        updateLikeStatus();
        </script>  
</body>

</html>