<?php

// 1. SWITCH CASE
echo "<h3>1. Switch Case</h3>";
$hari = "Senin";

switch ($hari) {
    case "Senin":
        echo "Hari pertama kerja!<br>";
        break;
    case "Jum'at":
        echo "Solat jumat!<br>";
        break;
    case "Minggu":
        echo "Libur akhir pekan!<br>";
        break;
    default:
        echo "Hari biasa.<br>";
}

// 2. FOR LOOP
echo "<h3>2. For Loop</h3>";
for ($i = 1; $i <= 5; $i++) {
    echo "Angka ke-" . $i . "<br>";
}

echo "<h4>For Loop dengan Array</h4>";
$buah = ["Apel", "Jeruk", "Mangga"];
for ($i = 0; $i < count($buah); $i++) {
    echo $buah[$i] . "<br>";
}

// 3. WHILE LOOP
echo "<h3>3. While Loop</h3>";
$nilai = 1;
while ($nilai <= 5) {
    echo "Nilai: " . $nilai . "<br>";
    $nilai++;
}

// 4. FOREACH LOOP
echo "<h3>4. Foreach Loop</h3>";
$mahasiswa = [
    "10001" => "Andi",
    "10002" => "Budi",
    "10003" => "Citra"
];

foreach ($mahasiswa as $nim => $nama) {
    echo "NIM: " . $nim . ", Nama: " . $nama . "<br>";
}

// 5. TERNARY OPERATOR
echo "<h3>5. Ternary Operator</h3>";
$umur = 18;
$status = ($umur >= 17) ? "Dewasa" : "Anak-anak";
echo "Status: $status<br>";

// 6. INCLUDE DAN REQUIRE
echo "<h3>6. Include dan Require</h3>";

echo "<b>Simulasi menu.php:</b><br>";
echo '<a href="index.php">Beranda</a> | <a href="about.php">Tentang</a> | <a href="contact.php">Kontak</a><br>';

echo "<b>Simulasi header.php:</b><br>";
echo '<html>
   <body>
       <div class="menu">';
           echo '<a href="index.php">Beranda</a> | <a href="about.php">Tentang</a> | <a href="contact.php">Kontak</a>';
echo '   </div>
   </body>
</html>';
?>
