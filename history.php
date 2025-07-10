<?php
session_start();
include 'koneksi/koneksi.php';
include 'componen/navbar.php';
?>
<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">

<head>
    <meta charset="utf-8">
    <title>Riwayat Tontonan | AnimeKuy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/vavicon.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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

        .trash-btn {
            position: absolute;
            top: 6px;
            right: 8px;
            background: transparent;
            border: none;
            display: none;
            cursor: pointer;
        }

        .history-card:hover .trash-btn {
            display: block;
        }

        .trash-icon {
            width: 18px;
            height: 20px;
            opacity: 0.6;
            background-color: red;
        }

        .trash-icon:hover {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Riwayat Tontonan</h3>
            <button class="btn btn-sm btn-outline-light" onclick="clearAllHistory()">Hapus Semua</button>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3" id="history_full"></div>
    </div>

    <footer class="text-center mt-5">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-inline mb-3">
                <li class="list-inline-item me-4"><a href="#">Just</a></li>
                <li class="list-inline-item me-4"><a href="#">for</a></li>
                <li class="list-inline-item"><a href="#">Fun</a></li>
            </ul>
            <p class="mb-0">Jangan Lupa Bernafas</p>
        </div>
    </footer>

    <script>
        function renderFullHistory() {
            const raw = localStorage.getItem("watchHistory");
            const container = document.getElementById("history_full");
            if (!raw || !container) return;

            const history = JSON.parse(raw);
            container.innerHTML = "";

            if (history.length === 0) {
                container.innerHTML = "<p class='text-center'>Belum ada riwayat tontonan.</p>";
                return;
            }

            history.sort((a, b) => b.updated - a.updated);

            history.forEach((item, index) => {
                container.innerHTML += `
                <div class="col">
                    <div class="card history-card position-relative h-100" onclick="window.location='/view.php?anime=${item.id_anime}&episode=${item.episode}'">
                        <img src="${item.image}" class="card-img-top w-100" style="height: 180px; object-fit: cover;" alt="${item.judul}">
                        <div class="card-body">
                            <h6 class="card-title text-truncate mb-1">${item.judul}</h6>
                            <small class="text-muted">Episode ${item.episode}</small>
                        </div>
                        <button class="trash-btn" onclick="event.stopPropagation(); removeOneHistory(${index});" title="Hapus">
                            <svg class="trash-icon" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M3 6h18M9 6v12m6-12v12M10 10h4M5 6l1 14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-14"></path>
                            </svg>
                        </button>
                    </div>
                </div>`;
            });
        }

        function removeOneHistory(index) {
            let history = JSON.parse(localStorage.getItem("watchHistory") || "[]");
            history.splice(index, 1);
            localStorage.setItem("watchHistory", JSON.stringify(history));
            renderFullHistory();
        }

        function clearAllHistory() {
            if (confirm("Yakin ingin menghapus semua riwayat?")) {
                localStorage.removeItem("watchHistory");
                renderFullHistory();
            }
        }

        document.addEventListener("DOMContentLoaded", renderFullHistory);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>