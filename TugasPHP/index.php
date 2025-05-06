<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Perhitungan Pembelian</title>
  <h2>Perhitungan Total Pembelian Dengan Array</h2>
  <hr>
</head>

    <?php
        $item0 = array("keyboard", 150000, 2);
        $totalhrg = $item0[1] * $item0[2];
        $pajak = 0.1;
        $bayar = $totalhrg + ($totalhrg * $pajak);

        echo "Nama Barang : " . $item0[0] . "<br>";
        echo "Harga 1 pcs : " . $item0[1] . "<br>";
        echo "Jumlah Beli : " . $item0[2] . "<br>";
        echo "Total Harga : " . $totalhrg . "<br>";
        echo "Pajak (10%) : " . $totalhrg * $pajak . "<br>";
        echo "<strong>Total Bayar : " . $bayar . "</strong><br>";
    ?>

    <div >
        <h4><a href="Kasir.php" class="button">Kalkulator Kasir Keren</a></h4>
    </div>
</html>