
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

<button class="action-button"><a href="<?php echo BASE_URL; ?>compras">Atras</a></button>
<form id="frmRegistrarCompra" action="" class="form-control"    >
    <div class="form-group">   
        
    <div class="campo-contenedor">
            <label for="producto" class="etiqueta-flotante">producto:</label>
            <select name="producto" id="producto"  class="entrada-destacada">
                <option  class="entrada-destacada" >Seleccione</option>
            </select>
        </div>


        <label for="cantidad">cantidad:</label><br>
        <input id="cantidad" name="cantidad" type="number" placeholder="cantidad" required>

        <label for="precio">precio:</label><br>
        <input id="precio" name="precio" type="number" placeholder="Precio" required>

        <label for="fecha_compra">fecha_compra:</label><br>
        <input id="fecha_compra" name="fecha_compra" type="date" placeholder="fecha_compra" required>

        <div class="campo-contenedor">
            <label for="trabajador" class="etiqueta-flotante">Trabajador:</label>
            <select name="trabajador" id="trabajador"  class="entrada-destacada">
                <option  class="entrada-destacada" >Seleccione</option>
            </select>
        </div>

        <button type="button" class="btn btn-success" onclick="registrar_compra();">Registrar</button>
    </div>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_compras.js"></script>
<script>listar_productos();</script>
<script>listar_trabajadores();</script>