<?php
    define("SITE_NAME", "dzakialdi.my.id");
    define("VERSION", "1.0");


    echo "Selamat datang di " . SITE_NAME . "<br>";
    echo "Versi Sistem: " . VERSION . "<br>";

    echo " ";
    echo " ";

    $nama = "Aldi";
    $umur = 20;
    $NPM = 2310631170094;

    echo "Nama  : " . $nama . "<br>";
    echo "NPM   : " . $NPM . "<br>";
    echo "Umur  : " . $umur . " tahun<br>";

    class Mahasiswa {
        public $nama;
        public function sapa() {
            return "Halo, saya $this->nama";
        }
    }
    $mhs = new Mahasiswa();
    $mhs->nama = "Aldi";
    echo $mhs->sapa();
 
?>
