<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penghitungan Diskon UKT</title>
</head>
<body>
    <h2>Hasil Penghitungan Diskon UKT</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $npm = htmlspecialchars($_POST["npm"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $prodi = htmlspecialchars($_POST["prodi"]);
        $semester = intval($_POST["semester"]);
        $biaya_ukt = floatval($_POST["biaya_ukt"]);
        $diskon = 0;
        $total_bayar = $biaya_ukt;

        if ($biaya_ukt >= 5000000) {
            $diskon = 10;
            if ($semester > 8) {
                $diskon += 5;
            }
        }

        $potongan = ($diskon / 100) * $biaya_ukt;
        $total_bayar -= $potongan;

        echo "NPM: $npm<br>";
        echo "Nama: $nama<br>";
        echo "Prodi: $prodi<br>";
        echo "Semester: $semester<br>";
        echo "Biaya UKT: Rp. " . number_format($biaya_ukt, 0, ',', '.') . "<br>";
        echo "Diskon: $diskon%<br>";
        echo "Yang Harus Dibayar: Rp. " . number_format($total_bayar, 0, ',', '.') . "<br>";
    } else {
        echo "Akses tidak valid!";
    }
    ?>
    <a href="index.php">
    <button type="button">Latihan Praktikum Pertama</button>
</body>
</html>