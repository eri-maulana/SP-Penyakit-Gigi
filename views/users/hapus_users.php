<?php
// mengambil id dari parameter
$idusers=$_GET['id'];

$sql = "DELETE FROM users WHERE idusers='$idusers'";
if ($koneksi->query($sql) === TRUE) {
    header("Location:?page=users");
}
$koneksi->close();
?>