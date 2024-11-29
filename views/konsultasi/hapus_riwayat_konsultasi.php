<?php
// mengambil id dari parameter
$idkonsultasi=$_GET['id'];

// hapus basis aturan
$sql = "DELETE FROM konsultasi WHERE idkonsultasi='$idkonsultasi'";
$koneksi->query($sql);

// hapus detail basis aturan
$sql = "DELETE FROM detail_konsultasi WHERE idkonsultasi='$idkonsultasi'";
$koneksi->query($sql);

$koneksi->close();
header("Location:?page=riwayat_konsultasi");
?>