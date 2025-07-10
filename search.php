<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian | AnimeKuy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .anime-card {
            transition: transform 0.2s;
            cursor: pointer;
        }

        .anime-card:hover {
            transform: scale(1.03);
        }

        .pagination .page-link {
            background-color: transparent;
            border: none;
            color: #0d6efd;
        }

        .pagination .active .page-link {
            background-color: #0d6efd;
            color: #fff;
            border-radius: .25rem;
        }
    </style>
</head>

<body>
    <?php include 'componen/navbar.php'; ?>

    <div class="container py-4">
        <h3 class="mb-3">Hasil Pencarian</h3>
        <div id="result_info" class="mb-3 text-muted"></div>
        <div id="loading_spinner" class="text-center my-4" style="display:none;">
            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
        </div>
        <div class="row gy-3" id="list_anime"></div>
        <nav class="d-flex justify-content-center mt-4" id="pagination" style="display:none;">
            <ul class="pagination mb-0"></ul>
        </nav>
    </div>

    <footer class="text-center mt-5">
        <div class="container text-muted py-4">
            <p class="mb-0">AnimeKuy &copy; 2025 - Cari dan nikmati anime favoritmu!</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        AOS.init();

        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const keyword = urlParams.get('search')?.trim() || '';
            let page = 1;

            if (keyword === '') {
                $('#result_info').text('Silakan masukkan kata kunci pencarian.');
                $('#list_anime').html('<div class="col text-center">Tidak ada kata kunci pencarian.</div>');
                return;
            }

            $('#result_info').html(`Menampilkan hasil untuk: <strong>${keyword}</strong>`);

            function loadSearch(pageNum) {
                $('#loading_spinner').show();
                $('#list_anime').empty();
                $('#pagination').hide();

                $.get('/api/search.php', {
                    search: keyword,
                    page: pageNum
                }, function(response) {
                    $('#loading_spinner').hide();
                    if (response.status && response.result.length > 0) {
                        let html = '';
                        response.result.forEach(anime => {
                            html += `
                            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up">
                            <div class="card h-100 anime-card" onclick="window.location='/detail.php?anime=${anime.id_anime}'">
                                <img src="${anime.image}" class="card-img-top" alt="${anime.judul}" style="height:180px; object-fit:cover;">
                                <div class="card-body">
                                <h6 class="card-title text-truncate">${anime.judul}</h6>
                                <p class="card-text"><small class="text-secondary">${anime.status}</small></p>
                                </div>
                            </div>
                            </div>`;
                        });
                        $('#list_anime').html(html);
                        const totalPages = response.total_pages || 1;
                        updatePagination(pageNum, totalPages);
                        $('#pagination').show();
                        AOS.refresh();
                    } else {
                        $('#list_anime').html('<div class="col text-center">Anime tidak ditemukan untuk kata kunci tersebut.</div>');
                    }
                }).fail(function() {
                    $('#loading_spinner').hide();
                    $('#list_anime').html('<div class="col text-center text-danger">Gagal memuat data. Silakan coba lagi.</div>');
                });
            }

            function updatePagination(currentPage, totalPages) {
                let paginationHtml = '';

                if (totalPages <= 1) {
                    paginationHtml += `
                    <li class="page-item active">
                        <a class="page-link" href="#">${currentPage}</a>
                    </li>`;
                } else {
                    paginationHtml += `
                    <li class="page-item ${currentPage == 1 ? 'disabled' : ''}" id="prev_page_item">
                        <a class="page-link" href="#">Sebelumnya</a>
                    </li>`;

                    for (let i = 1; i <= totalPages; i++) {
                        paginationHtml += `
                    <li class="page-item ${currentPage == i ? 'active' : ''}">
                    <a class="page-link" href="#">${i}</a>
                    </li>`;
                    }

                    paginationHtml += `
                    <li class="page-item ${currentPage >= totalPages ? 'disabled' : ''}" id="next_page_item">
                        <a class="page-link" href="#">Berikutnya</a>
                    </li>`;
                }

                $('#pagination ul').html(paginationHtml);
            }

            loadSearch(page);

            $('#pagination').on('click', '.page-link', function(e) {
                e.preventDefault();
                let text = $(this).text().trim();

                if (text === "Sebelumnya" && page > 1) {
                    page--;
                    loadSearch(page);
                } else if (text === "Berikutnya") {
                    page++;
                    loadSearch(page);
                } else {
                    let selected = parseInt(text);
                    if (!isNaN(selected) && selected !== page) {
                        page = selected;
                        loadSearch(page);
                    }
                }
            });
        });
    </script>
</body>

</html>