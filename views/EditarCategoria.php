
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

<button class="action-button"><a href="<?php echo BASE_URL; ?>categorias">Atras</a></button>
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