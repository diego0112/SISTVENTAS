<form id="formRegistrarProd" action="" class="form-control"    >
    <div class="form-group">
        <label for="codigo">Codigo:</label>
        <input id="codigo" type="text" placeholder="codigo" required>

        
        <label for="Nombre">Nombre:</label><br>
        <input id="nombre" type="text" placeholder="Nombre" required>

        <label for="detalle">Detalle:</label><br>
        <textarea id="detalle" placeholder="Detalle" required></textarea>

        <label for="precio">precio:</label><br>
        <input id="precio" type="number" placeholder="Precio" required>

        <label for="stock">Stock Inicial:</label><br>
        <input id="stock" type="number" placeholder="Stock inicial" required>

        <label for="Categoria">Categoria:</label><br>
        <input id="categoria" type="text" placeholder="Categoria" required>

        <label for="Fecha de Vencimiento">Fecha de Vencimiento:</label><br>
        <input id="fecha" type="date" placeholder="Fecha de Vencimiento" required>

        <label for="img">Imagen:</label><br>
        <input id="img" type="text" placeholder="Precio" required>

        <label for="proveedor">proveedor:</label><br>
        <input id="proveedor" type="text" placeholder="Proveedor" required>

        <button type="button" class="btn btn-success" onclick="registrar_producto();">Registrar</button>
    </div>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_productos.js"></script>