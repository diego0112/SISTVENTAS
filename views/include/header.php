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
    <header>

        <div class="logo">
            <a href="index.html">
            <img src="./views/plantilla/img/logo.png" alt="Importec Solutions Logo">
            </a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Nombre del Producto">
            <button type="submit">Buscar</button>
        </div>

        <div class="cart">
                <a href="DetalledeCarrito.html"><button class="carrito" type="button">S/. 200,30</button></a>
                <button  type="button"><a id="iniciar" href="IniciarSesion.html">Iniciar sesión</a></button>
        </div>
    </header>
    <nav>
        <ul class="nav">
            <li class="nav1"><a href="#">Laptops</a>
                <ul class="subnav">
                    <li class="nav2"><a href="Catalogo.html">INTEL CELERON </a></li>
                    <li class="nav2"><a href="Catalogo.html">INTEL CORE I3 </a></li>
                    <li class="nav2"><a href="Catalogo.html">INTEL CORE I5 </a></li>
                    <li class="nav2"><a href="Catalogo.html">INTEL CORE I7 </a></li>
                    <li class="nav2"><a href="Catalogo.html">INTEL CORE I9 </a></li>
                </ul>
            </li>
            <li class="nav1"><a href="#">Marcas más vendidas</a>
                <ul class="subnav">
                    <li class="nav2"><a href="<?php echo BASE_URL ?> catalogo">KINGSTON </a></li>
                    <li class="nav2"><a href="Catalogo.html">HP </a></li>
                    <li class="nav2"><a href="Catalogo.html">LENOVO </a></li>
                    <li class="nav2"><a href="Catalogo.html">ASUS </a></li>
                    <li class="nav2"><a href="Catalogo.html">GIGABYTE </a></li>
                    <li class="nav2"><a href="Catalogo.html">LOGITECH </a></li>
                    <li class="nav2"><a href="Catalogo.html">MSI </a></li>
                </ul>
            </li>
            <li><a href="Catalogo.html">Productos</a>
            
            </li>
            <li><a href="#">Promos</a>
            
            </li>
            <li><a href="Mediosdepago.html">Medios de pago</a>
            
            </li>
            <li><a href="TyC.html">Términos y condiciones</a>
            
            </li>
        </ul>
    </nav>