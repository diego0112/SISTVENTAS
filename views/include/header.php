

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importec Solutions</title>
    <link rel="stylesheet" href="./views/plantilla/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script>
    const base_url = '<?php echo BASE_URL; ?>';
  </script>
</head>
<body>
    <header>

        <div class="logo">
            <a href="<?php echo BASE_URL; ?>index">
          <img src="./views/plantilla/img/logo.png" alt="Importec Solutions Logo">
            </a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Nombre del Producto">
            <button type="submit">Buscar</button>
        </div>
       <div class="cart">
        <button class="carrito" type="button">S/. 200,30</button></a>
                <button  type="button"><a id="iniciar" href="<?php echo BASE_URL; ?>login">Iniciar sesión</a></button>
               
        </div>
        <div class="cart">
        <?php echo isset($_SESSION['sesion_venta_nombres']) ? $_SESSION['sesion_venta_nombres'] : 'Usuario'; ?>
        </div>
        <div class="cart">
        <button class="carrito" type="button">  <li class="dropdown-item" href="#" onclick="cerrar_sesion();">Cerrar Sesión</li></button>
        </div>
    </header>
    <nav>
        <ul class="nav">
            <li class="nav1"><a href="#">Laptops</a>
                <ul class="subnav">
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">INTEL CELERON </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I3 </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I5 </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I7 </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">INTEL CORE I9 </a></li>
                </ul>
            </li>
            <li class="nav1"><a href="#">Marcas más vendidas</a>
                <ul class="subnav">
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">KINGSTON </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">HP </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">LENOVO </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">ASUS </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">GIGABYTE </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">LOGITECH </a></li>
                    <li class="nav2"><a href="<?php echo BASE_URL; ?>catalogo">MSI </a></li>
                </ul>
            </li>
            <li><a href="<?php echo BASE_URL; ?>catalogo">Productos</a>
            
            </li>
            <li><a href="#">Promos</a>
            
            </li>
            <li><a href="<?php echo BASE_URL; ?>Mediosdepago">Medios de pago</a>
            
            </li>
            <li><a href="<?php echo BASE_URL; ?>TerminosyCondiciones">Términos y condiciones</a>
            
            </li>
        </ul>
    </nav>