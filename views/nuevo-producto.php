<form id="frmRegistrarProd" action="" class="form-control"    >
    <div class="form-group">
        <label for="codigo">Codigo:</label>
        <input id="codigo" name="codigo" type="text" placeholder="codigo" required>

        
        <label for="Nombre">Nombre:</label><br>
        <input id="nombre" name="nombre" type="text" placeholder="Nombre" required>

        <label for="detalle">Detalle:</label><br>
        <textarea id="detalle" name="detalle" placeholder="Detalle" required></textarea>

        <label for="precio">precio:</label><br>
        <input id="precio" name="precio" type="number" placeholder="Precio" required>

        <label for="stock">Stock Inicial:</label><br>
        <input id="stock" name="stock" type="number" placeholder="Stock inicial" required>

        <label for="categoria">Categoria:</label><br>
        <select name="categoria" id="categoria" required >
            <option value="">Seleccione una categoria</option>
        </select>

        <label for="imagen">Imagen:</label><br>
        <input id="imagen" name="imagen" type="text" placeholder="URL de Imagen" required>

        <label for="proveedor">proveedor:</label><br>
        <input id="proveedor" name="proveedor" type="text" placeholder="Proveedor" required>

        <button type="button" class="btn btn-success" onclick="registrar_producto();">Registrar</button>
    </div>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_productos.js"></script>
<script>listar_categorias();</script>