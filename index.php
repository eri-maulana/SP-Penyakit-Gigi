<?php
// koneksi database
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar - Penyakit Gigi</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- datatable css -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- chosen css -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="assets/css/all.css">
</head>

<body>

    <!-- navbar -->
    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-success navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=gejala">Gejala</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=penyakit">Penyakit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=basis_aturan">Basis Aturan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=konsultasi">Konsultasi</a>
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
        } elseif ($page == "gejala") {
            if ($action == "") {
                include "views/gejala/gejala.php";
            } elseif ($action == "tambah") {
                include "views/gejala/tambah_gejala.php";
            } elseif ($action == "update") {
                include "views/gejala/update_gejala.php";
            } else {
                include "views/gejala/hapus_gejala.php";
            }
        } elseif ($page == "penyakit") {
            if ($action == "") {
                include "views/penyakit/penyakit.php";
            } elseif ($action == "tambah") {
                include "views/penyakit/tambah_penyakit.php";
            } elseif ($action == "update") {
                include "views/penyakit/update_penyakit.php";
            } else {
                include "views/penyakit/hapus_penyakit.php";
            }
        } elseif ($page == "basis_aturan") {
            if ($action == "") {
                include "views/basis_aturan/basis_aturan.php";
            } elseif ($action == "tambah") {
                include "views/basis_aturan/tambah_basis_aturan.php";
            } elseif ($action == "detail") {
                include "views/basis_aturan/detail_basis_aturan.php";
            } elseif ($action == "update") {
                include "views/basis_aturan/update_basis_aturan.php";
            } elseif ($action == "hapus_gejala") {
                include "views/basis_aturan/hapus_detail_basis_aturan.php";
            } else {
                include "views/basis_aturan/hapus_basis_aturan.php";
            }
        } elseif ($page == "konsultasi") {
            if ($action == "") {
                include "views/konsultasi/konsultasi.php";
            } else {
                include "views/konsultasi/hasil_konsultasi.php";
            }
        } else {
            include "NAMA_HALAMAN";
        }
        ?>

    </div>
    <!-- content end -->

    <!-- jquery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <!-- fontawesome js-->
    <script src="assets/js/all.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- datatable js-->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- chosen js-->
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
        $(function() {
            $('.chosen').chosen();
        });
    </script>
</body>

</html>