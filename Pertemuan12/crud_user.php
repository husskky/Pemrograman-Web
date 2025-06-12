<?php
    session_start();
   if (!isset($_SESSION['user_id'])) {
        header("Location: login.php?message=" . urlencode("Silahkan Login terlebih dahulu"));
        exit;
    }
include 'koneksi_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi Password

    $stmt = $conn->prepare("INSERT INTO pelanggan (Nama, Alamat, Email, Telepon, Password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $alamat, $email, $telepon, $password);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT ID, Nama, Alamat, Email, Telepon FROM pelanggan");

if (isset($_GET['delete'])) {
    $pelanggan_id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM pelanggan WHERE ID = ?");
    $stmt->bind_param("i", $pelanggan_id);
    $stmt->execute();
    $stmt->close();
    header("Location: crud_user.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-4">
        <h2>Manajemen Pelanggan</h2>

        <!-- Form Tambah Pelanggan -->
        <h3 class="mt-4">Tambah Pelanggan</h3>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon:</label>
                <input type="text" class="form-control" name="telepon">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Tambah Pelanggan</button>
        </form>

        <!-- Tabel Daftar Pelanggan -->
        <h3>Daftar Pelanggan</h3>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= htmlspecialchars($row['Nama']) ?></td>
                    <td><?= htmlspecialchars($row['Alamat']) ?></td>
                    <td><?= htmlspecialchars($row['Email']) ?></td>
                    <td><?= htmlspecialchars($row['Telepon']) ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $row['ID'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="crud_user.php?delete=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pelanggan ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>