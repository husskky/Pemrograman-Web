<?php
include 'menu.php';

echo "<h3>Daftar Nama Hewan</h3>";

$hewan = ["Kucing", "Anjing", "Kelinci", "Burung", "Ikan"];

foreach ($hewan as $nama) {
    echo $nama . "<br>";
}
?>
