<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="sp_penyakit_gigi";

// Buat Koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>