<?php
include '../koneksi/koneksi.php';
$animeList = mysqli_query($conn, "SELECT * FROM tb_anime ORDER BY judul ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Episode</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #1a1a1a;
            color: white;
        }

        .content {
            margin-left: 230px;
            padding: 30px;
        }
    </style>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <div class="content">
        <h3 class="mb-4">🎬 Tambah Episode</h3>
        <form method="post" class="bg-dark p-4 rounded shadow-sm">
            <div class="mb-3">
                <label>Pilih Anime</label>
                <select name="id_anime" class="form-select bg-dark text-white">
                    <?php while ($a = mysqli_fetch_assoc($animeList)): ?>
                        <option value="<?= $a['id_anime'] ?>"><?= htmlspecialchars($a['judul']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3"><label>Publisher</label><input name="publisher" class="form-control bg-dark text-white" required></div>
            <div class="mb-3"><label>Waktu (cth: 21.00 WIB)</label><input name="waktu" class="form-control bg-dark text-white" required></div>
            <div class="mb-3"><label>Link Video</label><input name="video" class="form-control bg-dark text-white" required></div>
            <div class="mb-3"><label>Episode</label><input type="number" name="episode" class="form-control bg-dark text-white" required></div>
            <button type="submit" class="btn btn-success">✅ Simpan</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_anime'];
            $pub = $_POST['publisher'];
            $w = $_POST['waktu'];
            $v = $_POST['video'];
            $e = $_POST['episode'];
            $q = "INSERT INTO tb_episode (id_anime,publisher,waktu,video,episode) VALUES ('$id','$pub','$w','$v','$e')";
            if (mysqli_query($conn, $q)) {
                echo "<div class='alert alert-success mt-2'>✔ Berhasil!</div>";
            } else {
                echo "<div class='alert alert-danger mt-2'>❌ Gagal: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
    </div>
</body>

</html>