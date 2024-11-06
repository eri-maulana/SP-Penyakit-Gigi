<?php
// mengambil id dari parameter
$idpenyakit=$_GET['id'];

$sql = "DELETE FROM penyakit WHERE idpenyakit='$idpenyakit'";
if ($koneksi->query($sql) === TRUE) {
    header("Location:?page=penyakit");
}
$koneksi->close();
?>