<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>
</head>
<body>
    <h2>Hasil Penilaian</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nama"]) && isset($_POST["nilai"])) {
        $nama = htmlspecialchars($_POST["nama"]);
        $nilai = intval($_POST["nilai"]);
        $predikat = "";
        $status = "";

        if ($nilai >= 85 && $nilai <= 100) {
            $predikat = "A";
        } elseif ($nilai >= 75) {
            $predikat = "B";
        } elseif ($nilai >= 65) {
            $predikat = "C";
        } elseif ($nilai >= 50) {
            $predikat = "D";
        } elseif ($nilai >= 0) {
            $predikat = "E";
        } else {
            $predikat = "Tidak valid";
        }

        if ($predikat == "A" || $predikat == "B" || $predikat == "C") {
            $status = "Lulus";
        } elseif ($predikat == "D" || $predikat == "E") {
            $status = "Tidak Lulus";
        }

        echo "Nama: " . $nama . "<br>";
        echo "Nilai: " . $nilai . "<br>";
        echo "Predikat: " . $predikat . "<br>";
        echo "Status: " . $status . "<br>";
    } else {
        echo "Akses tidak valid! Pastikan Anda mengisi form dengan benar.";
    }
    ?>
    <a href="diskon.php">
    <button type="button">Latihan Praktikum Kedua</button>
</body>
</html>