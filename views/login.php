<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form id="frm_iniciar_sesion" >
                <label for="email">Dirección de Correo Electrónico</label>
                <input type="text" id="usuario" name="usuario" required>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                <a href="<?php echo BASE_URL; ?>index">¿Olvidaste tu Contraseña?</a>
                
               
                <button type="submit" class="btn btn-success">Inicia sesión</button>
                <a href="<?php echo BASE_URL; ?>principal"><button type="button">No tienes una cuenta? Crea una aquí</button></a>
            </form>
        </div>
    </main>
    
    <script src="<?php echo BASE_URL;?>views/js/functions_login.js"></script>