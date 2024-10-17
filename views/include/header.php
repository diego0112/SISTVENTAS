<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importec Solutions</title>
    <link rel="stylesheet" href="./views/plantilla/style.css">
<link rel="stylesheet" href="./views/login.php">
<link rel="stylesheet" href="./views/index.php">
</head>
<body>
<header class="bg-light py-3">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-md-4 text-center text-md-left mb-3 mb-md-0">
                <div class="logo">
                    <a href="<?php echo BASE_URL; ?>index">
                        <img src="./views/plantilla/img/logo.png" alt="Importec Solutions Logo" class="img-fluid">
                    </a>
                </div>
            </div>

            <!-- Barra de búsqueda -->
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="search-bar input-group">
                    <input type="text" class="form-control" placeholder="Nombre del Producto">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>

            <!-- Carrito y sesión -->
            <div class="col-md-4 text-center text-md-right">
                <div class="cart">
                    <a href="<?php echo BASE_URL; ?>detalledecarrito">
                        <button class="btn btn-secondary">S/. 200,30</button>
                    </a>
                    <a href="<?php echo BASE_URL; ?>login" class="btn btn-outline-primary">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Importec Solutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- Laptops -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="laptopsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Laptops
                    </a>
                    <div class="dropdown-menu" aria-labelledby="laptopsDropdown">
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">INTEL CELERON</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I3</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I5</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I7</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I9</a>
                    </div>
                </li>

                <!-- Marcas más vendidas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="brandsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Marcas más vendidas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="brandsDropdown">
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">KINGSTON</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">HP</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">LENOVO</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">ASUS</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">GIGABYTE</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">LOGITECH</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>catalogo">MSI</a>
                    </div>
                </li>

                <!-- Productos -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>catalogo">Productos</a>
                </li>

                <!-- Promos -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Promos</a>
                </li>

                <!-- Medios de pago -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>Mediosdepago">Medios de pago</a>
                </li>

                <!-- Términos y condiciones -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>TerminosyCondiciones">Términos y condiciones</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
