<link rel="stylesheet" href="../css/style.css">
<form id="frmActualizarProd" action="" class="form-control">
<!-- Inputs ocultos-->
    <input type="hidden" id="id_producto" name="id_producto" >
    <input type="hidden" id="imagen" name="imagen" >

    
    <div class="form-group">
        <label for="codigo">Codigo:</label>
        <input id="codigo" name="codigo" type="text" placeholder="codigo" readonly>

        
        <label for="Nombre">Nombre:</label><br>
        <input id="nombre" name="nombre" type="text" placeholder="Nombre" required>

        <label for="detalle">Detalle:</label><br>
        <textarea id="detalle" name="detalle" placeholder="Detalle" required></textarea>

        <label for="precio">precio:</label><br>
        <input id="precio" name="precio" type="number" placeholder="Precio" required>

        <div class="campo-contenedor">
            <label for="categoria" class="etiqueta-flotante">Categoría:</label>
            <select name="categoria" id="categoria"  class="entrada-destacada">
                <option  class="entrada-destacada" >Seleccione</option>
            </select>
        </div>

        <label for="">Imagen:</label><br>
        <input id="img" name="img" type="file" placeholder="URL de Imagen" required>

        <div class="campo-contenedor">
            <label for="rpoveedor" class="etiqueta-flotante">Proveedor:</label>
            <select name="proveedor" id="proveedor"  class="entrada-destacada">
                <option  class="entrada-destacada" >Seleccione</option>
            </select>
            </div>

    <button type="button" class="btn btn-success" onclick="actualizar_producto();">Actualizar</button>
</div>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_productos.js"></script>
<script>listar_categorias();</script>
<script>listar_proveedores();</script>
<script>
    //http://localhost/SISTVENTAS/EditarProducto/3
    const id_p = <?php $pagina=explode( "/", string: $_GET['views']); echo $pagina['1']; ?>;
    ver_producto(id_p);
</script>