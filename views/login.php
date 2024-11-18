<!DOCTYPE html>
<html lang="es">

<head>
    <title>Importec Solutions - Inicia Sesión</title>
    <link rel="stylesheet" href="./views/plantilla/style.css">
    <script>
    const base_url = '<?php echo BASE_URL; ?>';
  </script>
</head>

<body>
    <main id="inicioses">
        <div class="login-form">
            <h2>Inicia sesión</h2>
            <form id="frm_iniciar_sesion">
                <label for="usuario">Dirección de Correo Electrónico</label>
                <input type="text" id="usuario" name="usuario" >
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" >
                <a href="<?php echo BASE_URL; ?>principal">¿Olvidaste tu Contraseña?</a>


                <button value="" type="submit" class="login-button">Entrar</button>

                <a href="<?php echo BASE_URL; ?>principal"><button type="button">No tienes una cuenta? Crea una aquí</button></a>
            </form>
        </div>
    </main>
</body>
<script src="<?php echo BASE_URL; ?>views/js/functions_login.js"></script>