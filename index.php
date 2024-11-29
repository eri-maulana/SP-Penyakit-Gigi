<?php
session_start();

// koneksi database
include 'config.php';

// Mendapatkan path URL saat ini
$page = $_SERVER['REQUEST_URI'];

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
    <nav class="navbar navbar-expand-lg bg-success fixed-top navbar-dark mb-5">
        <a class="navbar-brand ml-2" href="/">GIGI SEHAT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link <?= $page == '/' ? 'active' : '' ?>" href="/">Beranda</a>
                </li>
                <!-- setting hak akses -->
                <?php
                if ($_SESSION['role'] == "Dokter") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=users' ? 'active' : '' ?>" href="?page=users">Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=gejala' ? 'active' : '' ?>" href="?page=gejala">Gejala</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=penyakit' ? 'active' : '' ?>" href="?page=penyakit">Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=basis_aturan' ? 'active' : '' ?>" href="?page=basis_aturan">Basis Aturan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=konsultasi' ? 'active' : '' ?>" href="?page=konsultasi">Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=riwayat_konsultasi' ? 'active' : '' ?>" href="?page=riwayat_konsultasi">Riwayat Konsultasi</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=konsultasi' ? 'active' : '' ?>" href="?page=konsultasi">Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == '/?page=riwayat_konsultasi' ? 'active' : '' ?>" href="?page=riwayat_konsultasi">Riwayat Konsultasi</a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?page=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- content -->
    <div class="container mt-5 pt-5">
        <?php
        // cek status login
        if ($_SESSION['status'] != "y") {
            header("Location:views/auth/login.php");
        }
        ?>
        <!-- setting menu -->
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page == "") {
            include "beranda.php";
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
        } elseif ($page == "users") {
            if ($action == "") {
                include "views/users/users.php";
            } elseif ($action == "tambah") {
                include "views/users/tambah_users.php";
            } elseif ($action == "update") {
                include "views/users/update_users.php";
            } else {
                include "views/users/hapus_users.php";
            }
        } elseif ($page == "riwayat_konsultasi") {
            if ($action == "") {
                include "views/konsultasi/riwayat_konsultasi.php";
            } elseif($action == "hapus"){
                include "views/konsultasi/hapus_riwayat_konsultasi.php";
            } else {
                include "views/konsultasi/detail_riwayat_konsultasi.php";
            }
        } else {
            include "views/auth/logout.php";
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