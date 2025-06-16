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
</head>

<body>
    <?= file_get_contents("./componen/navbar.html")?>
    <div class="container pulse animated" style="height: 50vh;"><iframe id="video_player" allowfullscreen="" frameborder="0" src="" width="100%" height="100%" style="padding-bottom: 20px;"></iframe></div>
    <div class="container pulse animated">
        <div class="row gy-3">
            <div class="col-lg-12 text-center align-self-center">
                <div class="card border rounded-pill">
                    <div class="card-body"><button id="button_prev" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-5">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M177.5 414c-8.8 3.8-19 2-26-4.6l-144-136C2.7 268.9 0 262.6 0 256s2.7-12.9 7.5-17.4l144-136c7-6.6 17.2-8.4 26-4.6s14.5 12.5 14.5 22l0 72 288 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32l-288 0 0 72c0 9.6-5.7 18.2-14.5 22z"></path>
                            </svg></button><button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-5">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M256 0c53 0 96 43 96 96v3.6c0 15.7-12.7 28.4-28.4 28.4H188.4c-15.7 0-28.4-12.7-28.4-28.4V96c0-53 43-96 96-96zM41.4 105.4c12.5-12.5 32.8-12.5 45.3 0l64 64c.7 .7 1.3 1.4 1.9 2.1c14.2-7.3 30.4-11.4 47.5-11.4H312c17.1 0 33.2 4.1 47.5 11.4c.6-.7 1.2-1.4 1.9-2.1l64-64c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-64 64c-.7 .7-1.4 1.3-2.1 1.9c6.2 12 10.1 25.3 11.1 39.5H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H416c0 24.6-5.5 47.8-15.4 68.6c2.2 1.3 4.2 2.9 6 4.8l64 64c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0l-63.1-63.1c-24.5 21.8-55.8 36.2-90.3 39.6V240c0-8.8-7.2-16-16-16s-16 7.2-16 16V479.2c-34.5-3.4-65.8-17.8-90.3-39.6L86.6 502.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l64-64c1.9-1.9 3.9-3.4 6-4.8C101.5 367.8 96 344.6 96 320H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96.3c1.1-14.1 5-27.5 11.1-39.5c-.7-.6-1.4-1.2-2.1-1.9l-64-64c-12.5-12.5-12.5-32.8 0-45.3z"></path>
                            </svg></button><button id="button_deskripsi" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-5">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M64 32C28.7 32 0 60.7 0 96v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm48 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM64 288c-35.3 0-64 28.7-64 64v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V352c0-35.3-28.7-64-64-64H64zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm56 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"></path>
                            </svg></button><button id="button_next" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-5">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z"></path>
                            </svg></button></div>
                </div>
            </div>
            <div id="detail_anime" class="col-lg-8">
                <section class="text-white" style="padding: 0px;padding-top: 0px;">
         
                </section>
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
            $("#detail_anime").html(`<section class="text-white" style="padding: 0px;padding-top: 0px;">
                    <div class="border rounded border-0 d-flex flex-column justify-content-center align-items-center p-4 py-5" style="background: linear-gradient(rgba(0,123,255,0.2), rgba(0,123,255,0.2)), url(${result.detail.image}) center / cover;height: 500px;">
                        <div class="row">
                            <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                                <div>
                                    <h1 class="text-uppercase fw-bold mb-3" style="text-shadow: 2px 1px var(--bs-body-bg);">${result.detail.judul}</h1>
                                    <p class="mb-4" style="text-shadow: 2px 1px 1px var(--bs-body-bg);">${result.detail.deskripsi}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>`);

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
</body>

</html>