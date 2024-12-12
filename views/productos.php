<style>
    a  {
          text-decoration: none;
          color: white;
        }
     .action-button {
            
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
<div class="col-12">
<button class="action-button"><a href="<?php echo BASE_URL; ?>admin">Atras</a></button>
<button class="action-button"><a href="<?php echo BASE_URL; ?>nuevo-producto">Registrar Productos</a></button>
    <table border="1" style="width: 100%;" >
        <thead>
            <tr>
                <th>Nro</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbl_producto">
            
        </tbody>
    </table>
</div>

<script src="<?php echo BASE_URL;?>views/js/functions_productos.js"></script>