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

        <div class="campo-contenedor">
            <label for="categoria" class="etiqueta-flotante">Categoría:</label>
            <select name="categoria" id="categoria"  class="entrada-destacada">
                <option  class="entrada-destacada" >Seleccione</option>
            </select>
        </div>

        <label for="">Imagen:</label><br>
        <input id="imagen" name="imagen" type="file" placeholder="URL de Imagen" required>

        <div class="campo-contenedor">
            <label for="rpoveedor" class="etiqueta-flotante">Proveedor:</label>
            <select name="proveedor" id="proveedor"  class="entrada-destacada">
                <option  class="entrada-destacada" >Seleccione</option>
            </select>
        </div>

        <button type="button" class="btn btn-success" onclick="registrar_producto();">Registrar</button>
    </div>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_productos.js"></script>
<script>listar_categorias();</script>
<script>listar_proveedores();</script>