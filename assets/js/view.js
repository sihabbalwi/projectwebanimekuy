//fitur Komentar
// Fungsi waktu relatif
function timeAgo(waktuString) {
  const waktu = new Date(waktuString);
  const sekarang = new Date();
  const selisih = Math.floor((sekarang - waktu) / 1000); // dalam detik

  const satuan = [
    { label: "tahun", detik: 31536000 },
    { label: "bulan", detik: 2592000 },
    { label: "hari", detik: 86400 },
    { label: "jam", detik: 3600 },
    { label: "menit", detik: 60 },
    { label: "detik", detik: 1 },
  ];

  for (const s of satuan) {
    const jumlah = Math.floor(selisih / s.detik);
    if (jumlah > 0) {
      return `${jumlah} ${s.label}${jumlah > 1 ? "" : ""} yang lalu`;
    }
  }
  return "Baru saja";
}

// Variabel session untuk avatar
const userAvatar = "<?= $_SESSION['avatar'] ?? '' ?>";
const userEmail = "<?= $_SESSION['email'] ?? '' ?>";

function loadKomentar() {
  $.get(
    "/api/komentar.php",
    {
      id_episode: episode,
    },
    function (data) {
      let html = renderKomentar(data);
      $("#list_komentar").html(html);
    }
  );
}

$("#form-komentar").on("submit", function (e) {
  e.preventDefault();
  const isi_komentar = $(this).find("textarea[name='komentar']").val().trim();
  if (isi_komentar !== "") {
    $.post(
      "/api/simpan_komentar.php",
      {
        id_episode: episode,
        komentar: isi_komentar,
      },
      function (res) {
        if (res.status === "success") {
          $("#form-komentar textarea").val(""); // bersihkan textarea
          loadKomentar(); // reload daftar komentar
        } else {
          alert("Gagal mengirim komentar.");
        }
      },
      "json"
    );
  }
});

function renderKomentar(list) {
  let html = "";
  list.forEach((item) => {
    html += `
                <div class="d-flex mb-3" data-id="${item.id_komentar}">
                    <img src="${
                      item.user_avatar
                    }" alt="avatar" class="rounded-circle me-2" width="40" height="40">
                    <div>
                        <strong>@${
                          item.user_nama
                        }</strong> <small class="text-muted">${timeAgo(
      item.waktu
    )}</small>
                        <p>${item.isi_komentar}</p>
                        <div>
                            <a href="#" class="me-3 text-muted like-btn" data-id="${
                              item.id_komentar
                            }">👍 ${item.jumlah_like}</a>
                            <a href="#" class="me-3 text-muted dislike-btn" data-id="${
                              item.id_komentar
                            }">👎 ${item.jumlah_dislike}</a>
                            <a href="#" class="balas-link text-muted" data-id="${
                              item.id_komentar
                            }">Balas</a>
                        </div>
                        <!-- Tempat untuk form balas -->
                        <div class="form-balas mt-2" id="form-balas-${
                          item.id_komentar
                        }" style="display:none;">
                            <textarea class="form-control mb-2" rows="2" placeholder="Tulis balasan..."></textarea>
                            <button class="btn btn-primary btn-sm kirim-balas" data-parent="${
                              item.id_komentar
                            }">Balas</button>
                            <button class="btn btn-secondary btn-sm batal-balas" data-id="${
                              item.id_komentar
                            }">Batal</button>
                        </div>

                        <!-- Tempat balasan rekursif -->
                        <div class="ms-4 mt-3">
                            ${
                              item.replies && item.replies.length > 0
                                ? renderKomentar(item.replies)
                                : ""
                            }
                        </div>
                    </div>
                </div>
                `;
  });
  return html;
}
// Tampilkan form balas
$(document).on("click", ".balas-link", function (e) {
  e.preventDefault();
  const id = $(this).data("id");
  $(`#form-balas-${id}`).slideDown();
});

// Batal balas
$(document).on("click", ".batal-balas", function () {
  const id = $(this).data("id");
  $(`#form-balas-${id}`).slideUp().find("textarea").val("");
});

// Kirim balasan
$(document).on("click", ".kirim-balas", function () {
  const parent_id = $(this).data("parent");
  const textarea = $(`#form-balas-${parent_id} textarea`);
  const isi_komentar = textarea.val().trim();

  if (isi_komentar !== "") {
    $.post(
      "/api/simpan_komentar.php",
      {
        isi_komentar: isi_komentar,
        id_episode: episode,
        parent_id: parent_id,
      },
      function () {
        loadKomentar(); // reload komentar
      }
    );
  }

  textarea.val("");
  $(`#form-balas-${parent_id}`).slideUp();
});
//like dislike
$(document).on("click", ".btn-like, .btn-dislike", function (e) {
  e.preventDefault();
  const id = $(this).data("id");
  const aksi = $(this).hasClass("btn-like") ? "like" : "dislike";

  $.post(
    "/api/like_dislike.php",
    {
      id_komentar: id,
      aksi: aksi,
    },
    function (res) {
      if (res.status === "success") {
        loadKomentar(); // Reload komentar agar jumlahnya diperbarui
      }
    },
    "json"
  );
});

$(document).on("click", ".like-btn", function (e) {
  e.preventDefault();
  const id = $(this).data("id");
  $.post(
    "/api/reaksi_komentar.php",
    {
      id_komentar: id,
      aksi: "like",
    },
    function () {
      loadKomentar();
    }
  );
});

$(document).on("click", ".dislike-btn", function (e) {
  e.preventDefault();
  const id = $(this).data("id");
  $.post(
    "/api/reaksi_komentar.php",
    {
      id_komentar: id,
      aksi: "dislike",
    },
    function () {
      loadKomentar();
    }
  );
});
loadKomentar();
