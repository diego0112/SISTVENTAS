<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importec Solutions - Inicia Sesión</title>
    <link rel="stylesheet" href="./views/plantilla/style.css">
</head>
<body>
    
    
    <main id="inicioses">
        <div class="login-form">
            <h2>Inicia sesión</h2>
            <form>
                <label for="email">Dirección de Correo Electrónico</label>
                <input type="email" id="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
                <a href="<?php echo BASE_URL; ?>index">¿Olvidaste tu Contraseña?</a>
                <a href="<?php echo BASE_URL; ?>index"><button type="button">Inicia sesión</button></a>
                <a href="<?php echo BASE_URL; ?>index"><button type="button">No tienes una cuenta? Crea una aquí</button></a>
            </form>
        </div>
    </main>
    
    <script src="<?php echo BASE_URL;?>views/js/functions_login.js"></script>