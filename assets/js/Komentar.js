       // Firebase config dan inisialisasi
        const firebaseConfig = {
        apiKey: "AIzaSyAC4JuluOGRPrfC2w5JBS5TfhEOV-Zw_vo",
        authDomain: "animekuy-komentar.firebaseapp.com",
        projectId: "animekuy-komentar",
        storageBucket: "animekuy-komentar.appspot.com",
        messagingSenderId: "217398398636",
        appId: "1:217398398636:web:56cc2c567a5c467d09d909",
        measurementId: "G-42KDL2V0EJ"
        };
        firebase.initializeApp(firebaseConfig);
        const db = firebase.firestore();

        function timeAgo(date) {
        const seconds = Math.floor((new Date() - date) / 1000);
        const intervals = [
            { label: 'tahun', seconds: 31536000 },
            { label: 'bulan', seconds: 2592000 },
            { label: 'hari', seconds: 86400 },
            { label: 'jam', seconds: 3600 },
            { label: 'menit', seconds: 60 },
            { label: 'detik', seconds: 1 }
        ];
        for (const i of intervals) {
            const count = Math.floor(seconds / i.seconds);
            if (count > 0) {
            return `${count} ${i.label} yang lalu`;
            }
        }
        return 'baru saja';
        }

        function kirimKomentar(e) {
        e.preventDefault();
        if (!namaUser || !idAnime || !userEmail) return alert("Login atau data anime tidak valid");
        const isi = document.getElementById("isiKomentar").value;
        db.collection("komentar").add({
            id_anime: idAnime,
            episode: episodeID,
            isi: isi,
            nama: namaUser,
            avatar: avatarUser,
            email: userEmail,
            waktu: firebase.firestore.FieldValue.serverTimestamp(),
            likes: [],
            dislikes: []
        }).then(() => {
            document.getElementById("isiKomentar").value = "";
        });
        }

        function tampilkanKomentar() {
        db.collection("komentar")
            .where("id_anime", "==", idAnime)
            .where("episode", "==", episodeID)
            .onSnapshot(snapshot => {
            const list = document.getElementById("list-komentar");
            list.innerHTML = "";

            const komentarUtama = [];
            const balasanKomentar = {};

            snapshot.forEach(doc => {
                const data = doc.data();
                data.id = doc.id;
                if (data.parent_id) {
                if (!balasanKomentar[data.parent_id]) balasanKomentar[data.parent_id] = [];
                balasanKomentar[data.parent_id].push(data);
                } else {
                komentarUtama.push(data);
                }
            });

            komentarUtama.forEach(data => {
                renderKomentar(list, data, balasanKomentar[data.id] || []);
            });
            });
        }

        function renderKomentar(container, data, balasanList) {
        const waktu = data.waktu?.toDate?.() || new Date();
        const relativeTime = timeAgo(waktu);
        const avatar = data.avatar || "https://www.gravatar.com/avatar?d=mp";
        const isOwner = data.email === userEmail;

        let menuDropdown = "";
        if (isOwner) {
            menuDropdown = `
            <div class="dropdown">
                <button class="btn btn-sm text-light dropdown-toggle position-absolute top-0 end-0" data-bs-toggle="dropdown">
                ⋮
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="editKomentar('${data.id}', \`${data.isi.replace(/`/g, '\\`')}\`)">Edit</a></li>
                <li><a class="dropdown-item text-danger" href="#" onclick="hapusKomentar('${data.id}')">Hapus</a></li>
                </ul>
            </div>
            `;
        }

        const div = document.createElement("div");
        div.className = "d-flex mb-4 position-relative";
        div.innerHTML = `
            <img src="${avatar}" class="rounded-circle me-3" width="40" height="40">
            <div class="flex-grow-1">
            <div class="fw-bold">${data.nama} <small class="text-muted ms-2">${relativeTime}</small></div>
            <p>${data.isi}</p>
            <div class="d-flex align-items-center gap-3 mb-1">
                <button class="btn btn-sm btn-outline-success" onclick="likeKomentar('${data.id}')">👍 ${(data.likes || []).length}</button>
                <button class="btn btn-sm btn-outline-danger" onclick="dislikeKomentar('${data.id}')">👎 ${(data.dislikes || []).length}</button>
                ${userEmail ? `<button class="btn btn-sm btn-outline-secondary" onclick="toggleBalasan('${data.id}')">Balas</button>` : ""}
            </div>
            <div id="balasan-area-${data.id}" style="display:none; margin-left:50px;">
                <textarea id="input-balasan-${data.id}" class="form-control mb-2" placeholder="Tulis balasan..."></textarea>
                <button class="btn btn-primary btn-sm" onclick="kirimBalasan('${data.id}')">Kirim</button>
            </div>
            </div>
            ${menuDropdown}
        `;
        container.appendChild(div);

        balasanList.forEach(b => {
            const waktu = b.waktu?.toDate?.() || new Date();
            const relativeTime = timeAgo(waktu);
            const isBalasanOwner = b.email === userEmail;
            let menuBalasan = "";
            if (isBalasanOwner) {
            menuBalasan = `
                <div class="dropdown float-end">
                <button class="btn btn-sm text-light dropdown-toggle" data-bs-toggle="dropdown">⋮</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-primary" href="#" onclick="editKomentar('${b.id}', \`${b.isi.replace(/`/g, '\\`')}\`)">Edit</a></li>
                    <li><a class="dropdown-item text-danger" href="#" onclick="hapusKomentar('${b.id}')">Hapus</a></li>
                </ul>
                </div>`;
            }
            const reply = document.createElement("div");
            reply.className = "d-flex ms-5 mb-3";
            reply.innerHTML = `
            <img src="${b.avatar}" class="rounded-circle me-3" width="32" height="32">
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                <div class="fw-bold">${b.nama} <small class="text-muted ms-2">${relativeTime}</small></div>
                ${menuBalasan}
                </div>
                <p>${b.isi}</p>
                <div class="d-flex align-items-center gap-2 mb-2">
                <button class="btn btn-sm btn-outline-success" onclick="likeKomentar('${b.id}')">👍 ${(b.likes || []).length}</button>
                <button class="btn btn-sm btn-outline-danger" onclick="dislikeKomentar('${b.id}')">👎 ${(b.dislikes || []).length}</button>
                </div>
            </div>`;
            container.appendChild(reply);
        });
        }

        tampilkanKomentar();

        function likeKomentar(id) {
            if (!userEmail) return alert("Harus login untuk menyukai");
            db.collection("komentar").doc(id).get().then(doc => {
                const d = doc.data();
                const likes = d.likes || [];
                const dislikes = d.dislikes || [];

                if (likes.includes(userEmail)) {
                    // Sudah like → batal like
                    db.collection("komentar").doc(id).update({
                        likes: firebase.firestore.FieldValue.arrayRemove(userEmail)
                    });
                } else {
                    // Tambah like, dan jika ada dislike hapus dislike
                    db.collection("komentar").doc(id).update({
                        likes: firebase.firestore.FieldValue.arrayUnion(userEmail),
                        dislikes: firebase.firestore.FieldValue.arrayRemove(userEmail)
                    });
                }
            });
        }

        function dislikeKomentar(id) {
            if (!userEmail) return alert("Harus login untuk tidak menyukai");
            db.collection("komentar").doc(id).get().then(doc => {
                const d = doc.data();
                const dislikes = d.dislikes || [];
                const likes = d.likes || [];

                if (dislikes.includes(userEmail)) {
                    // Sudah dislike → batal dislike
                    db.collection("komentar").doc(id).update({
                        dislikes: firebase.firestore.FieldValue.arrayRemove(userEmail)
                    });
                } else {
                    // Tambah dislike, dan jika ada like hapus like
                    db.collection("komentar").doc(id).update({
                        dislikes: firebase.firestore.FieldValue.arrayUnion(userEmail),
                        likes: firebase.firestore.FieldValue.arrayRemove(userEmail)
                    });
                }
            });
        }

        function toggleBalasan(id) {
        const el = document.getElementById(`balasan-area-${id}`);
        el.style.display = el.style.display === 'none' ? 'block' : 'none';
        }

        function kirimBalasan(parentId) {
        if (!namaUser || !userEmail) return alert("Harus login untuk membalas komentar");
        const isi = document.getElementById(`input-balasan-${parentId}`).value.trim();
        if (!isi) return alert("Balasan kosong!");
        db.collection("komentar").add({
            id_anime: idAnime,
            episode: episodeID,
            isi: isi,
            nama: namaUser,
            avatar: avatarUser,
            email: userEmail,
            waktu: firebase.firestore.FieldValue.serverTimestamp(),
            parent_id: parentId,
            likes: [],
            dislikes: []
        }).then(() => {
            document.getElementById(`input-balasan-${parentId}`).value = "";
            toggleBalasan(parentId);
        });
        }

        function editKomentar(id, isiLama) {
        const isiBaru = prompt("Edit komentar:", isiLama);
        if (isiBaru && isiBaru.trim()) {
            db.collection("komentar").doc(id).update({
            isi: isiBaru.trim(),
            waktu: firebase.firestore.FieldValue.serverTimestamp()
            });
        }
        }

        function hapusKomentar(id) {
        if (confirm("Yakin ingin menghapus komentar ini?")) {
            db.collection("komentar").doc(id).delete();
        }
        }