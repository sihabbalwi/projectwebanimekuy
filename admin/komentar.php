<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include '../koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Komentar - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
        }
        .content {
            margin-left: 230px;
            padding: 30px;
        }
        .komentar-card {
            background-color: #2c2f33;
            border: 1px solid #444;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .komentar-header {
            font-size: 0.95rem;
            color: #ccc;
        }
        .komentar-isi {
            font-size: 1rem;
            margin: 8px 0;
        }
        .komentar-aksi {
            text-align: right;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }
        .page-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 8px;
            background-color: #343a40;
            color: #ddd;
        }
        .page-btn.active {
            background-color: #0d6efd;
            color: white;
            font-weight: bold;
        }
        .page-btn:disabled {
            background-color: #444;
            color: #777;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <?php include 'components/sidebar.php'; ?>
    <div class="content">
        <h4 class="mb-4">🗨️ Manajemen Komentar</h4>

        <div class="row mb-3 g-2">
            <div class="col-md-6">
                <input type="text" id="filterJudul" class="form-control" placeholder="🔍 Cari berdasarkan judul anime...">
            </div>
            <div class="col-md-2">
                <input type="number" id="filterEpisode" class="form-control" placeholder="Episode">
            </div>
            <div class="col-md-2">
                <input type="text" id="filterGenre" class="form-control" placeholder="Genre">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" onclick="applyFilter()">Terapkan Filter</button>
            </div>
        </div>

        <div id="list-komentar-admin"></div>
        <div class="pagination mt-4">
            <button class="page-btn" id="prevPage" disabled>&laquo; Sebelumnya</button>
            <span class="page-btn active" id="pageIndicator">1</span>
            <button class="page-btn" id="nextPage" disabled>Berikutnya &raquo;</button>
        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore-compat.js"></script>
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyAC4JuluOGRPrfC2w5JBS5TfhEOV-Zw_vo",
            authDomain: "animekuy-komentar.firebaseapp.com",
            projectId: "animekuy-komentar",
            storageBucket: "animekuy-komentar.appspot.com",
            messagingSenderId: "217398398636",
            appId: "1:217398398636:web:56cc2c567a5c467d09d909"
        };
        firebase.initializeApp(firebaseConfig);
        const db = firebase.firestore();

        let lastVisible = null;
        let firstVisible = null;
        let page = 1;

        function normalize(text) {
            return (text || '').toString().toLowerCase().trim();
        }

        function getFilterValues() {
            return {
                judul: normalize(document.getElementById("filterJudul").value),
                episode: document.getElementById("filterEpisode").value.trim(),
                genre: normalize(document.getElementById("filterGenre").value)
            };
        }

        function applyFilter(direction = "") {
            const filter = getFilterValues();
            tampilkanKomentar(filter, direction);
        }

        function tampilkanKomentar(filter = {}, direction = "") {
            const listEl = document.getElementById("list-komentar-admin");
            const prevBtn = document.getElementById("prevPage");
            const nextBtn = document.getElementById("nextPage");
            const pageIndicator = document.getElementById("pageIndicator");

            let query = db.collection("komentar").orderBy("waktu", "desc").limit(10);
            if (direction === "next" && lastVisible) query = query.startAfter(lastVisible);
            if (direction === "prev" && firstVisible) query = query.endBefore(firstVisible);

            query.get().then(snapshot => {
                listEl.innerHTML = "";
                if (snapshot.empty) {
                    prevBtn.disabled = page <= 1;
                    nextBtn.disabled = true;
                    return;
                }

                firstVisible = snapshot.docs[0];
                lastVisible = snapshot.docs[snapshot.docs.length - 1];

                snapshot.forEach(doc => {
                    const d = doc.data();
                    const waktu = d.waktu?.toDate?.() || new Date();
                    fetch(`/api/detail.php?anime=${d.id_anime}`)
                        .then(res => res.json())
                        .then(detail => {
                            const judul = normalize(detail.detail.judul);
                            const genre = normalize(detail.detail.genre);

                            const cocok = (!filter.judul || judul.includes(filter.judul)) &&
                                           (!filter.genre || genre.includes(filter.genre)) &&
                                           (!filter.episode || d.episode.toString() === filter.episode);

                            if (!cocok) return;

                            const div = document.createElement("div");
                            div.className = "komentar-card";
                            div.innerHTML = `
                                <div class="komentar-header">
                                    <b>${d.nama}</b> | Anime: <b>${detail.detail.judul}</b> | Episode: ${d.episode} <br>
                                    <small>${waktu.toLocaleString()}</small>
                                </div>
                                <div class="komentar-isi">${d.isi}</div>
                                <div class="komentar-aksi">
                                    <button class="btn btn-sm btn-danger" onclick="hapusKomentar('${doc.id}')">🗑 Hapus</button>
                                </div>
                            `;
                            listEl.appendChild(div);
                        });
                });

                prevBtn.disabled = page <= 1;
                nextBtn.disabled = snapshot.size < 10;
                pageIndicator.textContent = page;
            });
        }

        function hapusKomentar(id) {
            if (confirm("Yakin ingin menghapus komentar ini?")) {
                db.collection("komentar").doc(id).delete().then(() => {
                    applyFilter();
                });
            }
        }

        document.getElementById("prevPage").addEventListener("click", () => {
            if (page > 1) page--;
            applyFilter("prev");
        });

        document.getElementById("nextPage").addEventListener("click", () => {
            page++;
            applyFilter("next");
        });

        applyFilter();
    </script>
</body>
</html>
