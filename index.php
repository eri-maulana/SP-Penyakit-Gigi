<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar - Penyakit Gigi</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>

    <!-- navbar -->
    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Gejala</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Penyakit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Basis Aturan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Konsultasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </nav>
    <!-- navbar end -->

    <!-- content -->
    <div class="container mt-5">

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page == "") {
            include "welcome.php";
        } elseif ($page == "NAMA_PAGE") {
            if ($action == "") {
                include "NAMA_HALAMAN";
            } elseif ($action == "NAMA_ACTION") {
                include "NAMA_HALAMAN";
            } elseif ($action == "NAMA_ACTION") {
                include "NAMA_HALAMAN";
            } else {
                include "NAMA_HALAMAN";
            }
        } else {
            include "NAMA_HALAMAN";
        }
        ?>

    </div>
    <!-- content end -->

    <!-- jquery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>