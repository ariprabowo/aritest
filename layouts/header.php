<?php
include 'config/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    	
    <!-- Csrf Token -->
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
    <link href="assets/css/bootstrap-datepicker.min.css" rel="stylesheet" >
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>    
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
        <span class="p-2"><h4 class="text-white">#</h4></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>
    
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="../index.php">
                        <span data-feather="home"></span>
                        Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <span data-feather="bar-chart-2"></span> Transaksi
    </a>
                    </li>
                    <ul class="collapse" id="collapseExample">
                        <li class="nav-item"><a class="text-white nav-link" href="../input.php"><span data-feather="edit"></span> Input</a></li>
                        <li class="nav-item"><a class="text-white nav-link" href="../view.php"><span data-feather="menu"></span> View</a></li>
                    </ul>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="../logout.php">
                        <span data-feather="log-out"></span>
                        Logout
                        </a>
                    </li>
                </ul>
            </div>
            </nav>