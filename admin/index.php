<?php
session_start();
require_once "koneksi.php";
if (!isset($_SESSION["akun-admin"])) {
    header("Location: login.php");
    exit;
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
  <a class="btn btn-danger fw-bold" href="logout.php" onclick="return confirm('Ingin Logout?')" style="margin-right:5rem;">Logout</a>
</nav>
    <!-- content -->
    <div class="container-lg " >
    <div class="row">

        <!-- sidebar -->
        <?php include "../halaman/sidebar.php"; ?>
        <!-- sidebar -->



        <div class="col-lg-9 mt-2" >
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <div class="card-body">
                <h5 class="card-title">Selamat Datang di Raja Pedas Restaurant</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam error voluptatibus autem, ducimus porro ullam ad quibusdam. Odio dicta consequatur pariatur cum enim consectetur dignissimos doloribus illo excepturi, distinctio quisquam error molestias veniam neque? Dolorum atque esse est laudantium ad.</p>
            </div>
        </div>
    </div>
    </div>
    <div class="fixed-bottom text-center mb-2">
        Copyright 2024 RajaPedas
    </div>
</div>
    <script src="./src/css/bootstrap-5.2.0/js/bootstrap.min.js"></script>
    <script src="src/js/beranda.js"></script>
</body>
</html>