<?php
include 'menu.php';

echo "<h3>Cek Angka Genap atau Ganjil</h3>";
?>

<form method="get" action="">
    Masukkan sebuah angka: 
    <input type="number" name="angka" required>
    <button type="submit">Cek</button>
</form>

<?php
if (isset($_GET['angka'])) {
    $angka = $_GET['angka'];
    $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";

    echo "<p>Angka $angka adalah $hasil.</p>";
}
?>
