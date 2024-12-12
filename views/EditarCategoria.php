<form id="frmEditarCat" action="" class="form-control">
    <div class="form-group">
    <input type="hidden" name="id_categoria" id="id_categoria">
    
        <label for="nombre">Nombre:</label><br>
        <input id="nombre" name="nombre" type="text" placeholder="Nombre" required>

        <label for="detalle">Detalle:</label><br>
        <textarea id="detalle" name="detalle" placeholder="Detalle" required></textarea>
        <button type="button" class="btn btn-success" onclick="actualizar_categoria();">Editar</button>
    </div>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_categoria.js"></script>
<script>listar_categorias();</script>
<script>
    const id_p = <?php $pagina = explode("/", $_GET['views']); echo $pagina['1']; ?>;
    ver_categoria(id_p);
</script>
