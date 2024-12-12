<form id="frmEditarPers" action="" class="form-control">
    <div class="form-group">
        <input type="hidden" name="id_persona" id="id_persona">
        <label for="nro_identidad">nro_identidad:</label>
        <input id="nro_identidad" name="nro_identidad" type="text" placeholder="nro_identidad" disabled>


        <label for="razon_social">razon_social:</label><br>
        <input id="razon_social" name="razon_social" type="text" placeholder="razon_social" required>

        <label for="telefono">telefono:</label><br>
        <input id="telefono" name="telefono" type="number" placeholder="telefono" required>

        <label for="correo">correo:</label><br>
        <input id="correo" name="correo" type="text" placeholder="correo" required>

        <label for="departamento">departamento:</label><br>
        <input id="departamento" name="departamento" type="text" placeholder="departamento" required>

        <label for="provincia">provincia:</label>
        <input id="provincia" name="provincia" type="text" placeholder="provincia" required>
        <label for="distrito">distrito:</label>
        <input id="distrito" name="distrito" type="text" placeholder="distrito" required>

        <label for="codigo_postal">codigo_postal:</label><br>
        <input id="codigo_postal" name="codigo_postal" type="text" placeholder="codigo_postal" required>

        <label for="direccion">direccion:</label><br>
        <input id="direccion" name="direccion" type="direccion" placeholder="direccion" required>

        <label for="rol">rol:</label><br>
        <select name="rol" id="rol" class="entrada-destacada">
            <option value="Proveedor">Proveedor</option>
            <option value="Trabajador">Trabajador</option>
            <option value="Administrador">Administrador</option>
        </select>

        <!-- <label for="password">password:</label><br>
        <input id="password" name="password" type="password" placeholder="password" required> -->


        <button type="button" class="btn btn-success" onclick="actualizar_persona();">Registrar</button>
    </div>
</form>
<script src="<?php echo BASE_URL; ?>views/js/functions_personas.js"></script>
<script>
    const id_p = <?php $pagina = explode("/", $_GET['views']);
                    echo $pagina['1']; ?>;
    ver_persona(id_p);
</script>