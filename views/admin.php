<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        .bodyadmin, a{
            text-decoration: none;
            color: white;
        }

        .bodyadmin {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .admin-panel {
            width: 90%;
            max-width: 1200px;
            background: linear-gradient(to bottom right, #4e54c8, #8f94fb);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            background: #4e54c8;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1.5rem;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .category-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .category-card:hover {
            transform: scale(1.05);
        }

        .category-header {
            background: #8f94fb;
            color: white;
            padding: 15px;
            font-size: 1.25rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .category-actions {
            padding: 20px;
        }

        .action-button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background: #4e54c8;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .action-button:hover {
            background: #3c43a4;
        }
    </style>
</head>

<body>
    <div class="bodyadmin">
        <div class="admin-panel">
            <div class="header">Panel de Administración</div>
            <div class="categories">

                <div class="category-card">
                    <div class="category-header">Compras</div>
                    <div class="category-actions">
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>compras">Ver Compras</a></button>
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>nueva-compra">Registrar Compras</a></button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-header">Productos</div>
                    <div class="category-actions">
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>productos">Ver Productos</a></button>
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>nuevo-producto">Registrar Producto</a></button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-header">Personas</div>
                    <div class="category-actions">
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>personas">Ver Personas</a></button>
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>nuevo-persona">Registrar Persona</a></button>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-header">Categorías</div>
                    <div class="category-actions">
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>categorias">Ver Categorias</a></button>
                        <button class="action-button"><a href="<?php echo BASE_URL; ?>nueva-categoria">Registrar Categorias</a></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>