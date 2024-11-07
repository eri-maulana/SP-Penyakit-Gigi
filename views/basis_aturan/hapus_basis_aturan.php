<?php
// mengambil id dari parameter
$idaturan=$_GET['id'];

// hapus basis aturan
$sql = "DELETE FROM basis_aturan WHERE idaturan='$idaturan'";
$koneksi->query($sql);

// hapus detail basis aturan
$sql = "DELETE FROM detail_basis_aturan WHERE idaturan='$idaturan'";
$koneksi->query($sql);

$koneksi->close();
header("Location:?page=basis_aturan");
?>