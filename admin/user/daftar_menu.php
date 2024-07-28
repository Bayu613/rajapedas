<?php
session_start();
require_once "../koneksi.php";
    if (!isset($_GET["search"])) {
        $menu = ambil_data("SELECT * FROM menu ORDER BY kode_menu DESC");
    } else {
        $key_search = $_GET["key-search"];
        $menu = ambil_data("SELECT * FROM menu WHERE nama LIKE '%$key_search%' OR
                                                    harga LIKE '%$key_search%' OR
                                                    kategori LIKE '%$key_search%' OR
                                                    `status` LIKE '%$key_search%'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/css/bootstrap-icons-1.8.3/bootstrap-icons.css">
    <title>Beranda</title>
</head>
<body class="bg-light">
    <!-- header -->
    <nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
  <div class="container-lg ">
    <a class="navbar-brand" href="#">SambalPedas</a>
  </div>
  <a class="btn btn-danger fw-bold" href="../login.php" style="margin-right:5rem;">Admin</a>
</nav>
    <!-- content -->
    <div class="container-lg " >
    <div class="row">

        <!-- sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- sidebar -->



        <div class="col-lg-9 mt-2" >
            <div class="card">
                <div class="card-header">
                    Menu
                    <?php include "beranda.php"; ?>
                </div>
        </div>
    </div>
    </div>
    <div class="fixed-bottom text-center mb-2">
        Copyright 2022 RajaPedas
    </div>
</div>
    <script src="./src/css/bootstrap-5.2.0/js/bootstrap.min.js"></script>
    <script src="src/js/beranda.js"></script>
</body>
</html>