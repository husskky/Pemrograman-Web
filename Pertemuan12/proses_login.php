<?php
session_start();
include 'koneksi_db.php'; // Pastikan koneksi ke database tersedia

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        header("Location: login.php?message=" . urlencode("Harap isi username dan password."));
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Persiapkan query untuk mengambil data pengguna
    $stmt = $conn->prepare("SELECT ID, katasandi FROM pengguna WHERE nama = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Validasi password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['nama_pengguna'] = $username;
            header("Location: index.php?message=" . urlencode("Selamat datang, $username!"));
            exit;
        } else {
            header("Location: login.php?message=" . urlencode("Password salah!"));
            exit;
        }
    } else {
        header("Location: login.php?message=" . urlencode("Nama pengguna tidak ditemukan."));
        exit;
    }
    $stmt->close();
}
?>