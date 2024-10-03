<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importec Solutions - Inicia Sesión</title>
    <link rel="stylesheet" href="./views/plantilla/style.css">
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
                <button class="carrito" type="button">S/. 200,30</button>
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
                    <li class="nav2"><a href="Catalogo.html">KINGSTON </a></li>
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
    <main id="inicioses">
        <div class="login-form">
            <h2>Inicia sesión</h2>
            <form>
                <label for="email">Dirección de Correo Electrónico</label>
                <input type="email" id="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
                <a href="#">¿Olvidaste tu Contraseña?</a>
                <button type="submit">Inicia sesión</button>
                <button type="button">No tienes una cuenta? Crea una aquí</button>
            </form>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-contact">
                <h4>WhatsApp:</h4> 
                <p>921310423 - 923545345</p>
                <p>942385824 - 985752824</p> 
                <p>912535523 - 924857834</p>
                <p>Email: ventas@importecs.com</p>
                <p>Dirección: <br> Av. San Martin N° 427-429</p>
                <p>Soporte: 930794928</p>
                <p>Dirección de Soporte:<br> Av. San Martin N° 427-429</p>
            </div>
            <div class="footer-social">
                <h4>Síguenos</h4>
                <a href="https://www.facebook.com/profile.php?id=100067636255042&locale=es_LA"><img src="img/iconofb.png" alt="Facebook"><p>Facebook</p></a>
                <a href="https://www.instagram.com/andreedc01?igsh=NXFwYnc3ZGJlMjZl"><img src="img/intagram.png" alt="Instagram"><p>Instagram</p></a>
            </div>

            <div class="footer-links">
                <h4>Información</h4>
                <a id="info" href="#">Términos y Condiciones</a>
                <a id="info" href="#">Nuestra Empresa</a>
                <a id="info" href="#">Medios de Pago</a>
            </div>

            <div class="footer-policy">
                <h4>Políticas y Condiciones</h4>
                <a  id="info" href="Contacto.html">Contactanos</a>
                <a id="info" href="#">Política de Privacidad de Datos Personales</a>
                <a id="info" href="#">Política de Envío</a>
                <a id="info" href="#">Términos y Condiciones</a>
            </div>

            <div class="footer-newsletter">
                <h4>Boletín de Anuncios</h4>
                <input type="email" placeholder="Tu correo electrónico">
                <button type="submit">Suscribirse</button>
                <p>Puedes darte de baja en cualquier momento. Para ello, consulte nuestra información de contacto en el aviso legal.</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2024 IMPORTEC Solutions SAC. Todos los derechos reservados</p>
            <div class="footer-payments">
                <img src="img/visa.png" alt="Visa">
                <img src="img/mastercard.png" alt="Mastercard">
                <img src="img/americanexpress.png" alt="AmericanExpress">
                <img src="img/bcp.png" alt="BCP">
            </div>
        </div>
    </footer>
</body>
</html>