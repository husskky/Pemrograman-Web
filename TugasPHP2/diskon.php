<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Diskon UKT</title>
</head>
<body>
    <h2>Form Penghitungan Diskon UKT</h2>
    <form method="post" action="resultdiskon.php">
        NPM: <input type="text" name="npm" required><br>
        Nama: <input type="text" name="nama" required><br>
        Prodi: <input type="text" name="prodi" required><br>
        Semester: <input type="number" name="semester" required><br>
        Biaya UKT: <input type="number" name="biaya_ukt" required><br>
        <input type="submit" value="Hitung Diskon">
    </form>
    <a href="index.php">
    <button type="button">Latihan Praktikum Pertama</button>
</body>
</html>