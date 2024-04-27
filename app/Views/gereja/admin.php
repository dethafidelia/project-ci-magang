<!DOCTYPE html>
<html lang="en">

<head>
    <title>PAROKI KELUARGA KUDUS BANTENG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            /* Warna teks untuk brand navbar */
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            font-weight: 500;
            color: #fff;
            /* Warna teks untuk link navbar */
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107;
            /* Warna teks pada hover link navbar */
        }

        .navbar-custom {
            background-color: darkslateblue;
            /* Warna latar belakang navigasi bar */
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid bg-dark py-3">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-2 text-center">
                    <img src="<?= base_url('logo_login.png') ?>" alt="Paroki Logo" style="height: 100px" class="img-fluid">
                </div>
                <div class="col-sm-10 text-center">
                    <h1 class="text-white">PAROKI KELUARGA KUDUS BANTENG</h1>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('homeAdmin') ?>">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dpph') ?>">DATA DPPH</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('logout'); ?>">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>