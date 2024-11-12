<form id="frmRegistrarCaregoria" action="" class="form-control"    >
    <div class="form-group">

        <label for="nombre">Nombre:</label><br>
        <input id="nombre" name="nombre" type="text" placeholder="Nombre" required>

        <label for="detalle">Detalle:</label><br>
        <textarea id="detalle" name="detalle" placeholder="Detalle" required></textarea>
        <button type="button" class="btn btn-success" onclick="registrar_categoria();">Registrar</button>
    </div>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_categoria.js"></script>
