<?php
include 'koneksi_db.php';
session_start();

// Ambil ID user dari URL
$user_id = $_GET['id'];

$stmt = $conn->prepare("SELECT Nama, Email, Telepon FROM pelanggan WHERE ID = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($nama, $email, $telepon);
$stmt->fetch();
$stmt->close();

// Jika form dikirim, update data user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $stmt = $conn->prepare("UPDATE pelanggan SET Nama = ?, Email = ?, Telepon = ? WHERE ID = ?");
    $stmt->bind_param("sssi", $nama, $email, $telepon, $user_id);

    if ($stmt->execute()) {
        header("Location: crud_user.php?message=" . urlencode("Data user berhasil diperbarui."));
        exit;
    } else {
        $error = "Gagal memperbarui data user.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-4">
        <h2>Edit User</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon:</label>
                <input type="text" class="form-control" name="telepon" value="<?= htmlspecialchars($telepon) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="crud_user.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>