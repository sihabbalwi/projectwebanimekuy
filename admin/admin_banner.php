<?php
session_start();
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    if (!empty($_FILES['image']['name'])) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $newName = 'banner_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $newName);

        mysqli_query($conn, "INSERT INTO tb_banner (image) VALUES ('$newName')");
        $success = "✅ Banner berhasil ditambahkan!";
    } else {
        $error = "❗ Pilih gambar terlebih dahulu!";
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_banner WHERE id=$id"));
    if ($get) {
        @unlink('uploads/' . $get['image']); // hapus file
        mysqli_query($conn, "DELETE FROM tb_banner WHERE id=$id");
        $success = "🗑 Banner berhasil dihapus!";
    }
}

$banners = mysqli_query($conn, "SELECT * FROM tb_banner ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelola Banner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #181a1f;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .content {
            margin-left: 220px;
            padding: 25px;
        }

        .card-custom {
            background-color: #212529;
            border: none;
            border-radius: 12px;
        }

        .img-thumb {
            max-height: 120px;
            object-fit: cover;
            border-radius: 6px;
        }

        .btn-delete {
            position: absolute;
            top: 4px;
            right: 4px;
        }
    </style>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>

    <div class="content">
        <h3 class="mb-4">🖼 Kelola Banner Homepage</h3>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php elseif (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <div class="card card-custom shadow">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar Banner Baru</label>
                        <input type="file" name="image" class="form-control bg-dark text-white" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-upload"></i> Upload</button>
                </form>

                <hr>
                <h6>Banner Saat Ini:</h6>
                <div class="d-flex flex-wrap gap-3">
                    <?php while ($b = mysqli_fetch_assoc($banners)): ?>
                        <div class="position-relative">
                            <img src="uploads/<?= htmlspecialchars($b['image']) ?>" class="img-thumb shadow">
                            <a href="?delete=<?= $b['id'] ?>" onclick="return confirm('Hapus banner ini?')"
                                class="btn btn-sm btn-danger btn-delete"><i class="bi bi-trash"></i></a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>