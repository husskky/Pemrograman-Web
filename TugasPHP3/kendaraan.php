<?php
include 'menu.php';

echo "<h3>Jenis Kendaraan Berdasarkan Jumlah Roda</h3>";
?>

<form method="get" action="">
    Masukkan jumlah roda: 
    <input type="number" name="roda" min="1" required>
    <button type="submit">Cek Jenis</button>
</form>

<?php
if (isset($_GET['roda'])) {
    $jumlah_roda = $_GET['roda'];

    echo "<p>Jumlah roda: $jumlah_roda</p>";
    echo "Jenis kendaraan: ";

    switch ($jumlah_roda) {
        case 2:
            echo "Motor";
            break;
        case 3:
            echo "Becak";
            break;
        case 4:
            echo "Mobil";
            break;
        case 6:
            echo "Truk Kecil";
            break;
        case 8:
            echo "Truk Besar";
            break;
        default:
            echo "Tidak diketahui.";
    }
}
?>
