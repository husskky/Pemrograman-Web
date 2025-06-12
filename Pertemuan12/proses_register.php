<?php
session_start();
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $password = password_hash($_POST['katasandi'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT ID FROM pengguna WHERE nama = ?");
    $stmt->bind_param("s", $nama);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php?message=" . urlencode("Nama pengguna sudah terdaftar. Silakan gunakan nama lain."));
        exit;
    } else {
        $stmt = $conn->prepare("INSERT INTO pengguna (nama, katasandi) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $password);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['nama_pengguna'] = $nama;
            header("Location: index.php?message=" . urlencode("Registrasi berhasil! Selamat datang, $nama."));
            exit;
        } else {
            header("Location: register.php?message=" . urlencode("Gagal mendaftar. Silakan coba lagi."));
            exit;
        }
    }

    $stmt->close();
}
?>