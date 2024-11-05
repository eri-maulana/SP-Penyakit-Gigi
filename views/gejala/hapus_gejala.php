<?php
// mengambil id dari parameter
$idgejala=$_GET['id'];

$sql = "DELETE FROM gejala WHERE idgejala='$idgejala'";
if ($koneksi->query($sql) === TRUE) {
    header("Location:?page=gejala");
}
$koneksi->close();
?>