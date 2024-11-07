<?php
// mengambil id dari parameter
$idaturan=$_GET['idaturan'];
$idgejala=$_GET['idgejala'];

$sql = "DELETE FROM detail_basis_aturan WHERE idaturan='$idaturan' AND idgejala='$idgejala'";
if ($koneksi->query($sql) === TRUE) {
    header("Location:?page=basis_aturan");
} 
$koneksi->close();
?>