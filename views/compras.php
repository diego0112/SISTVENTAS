<div class="col-12">
    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha_compra</th>
                <th>Trabajador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbl_compras">

        </tbody>
    </table>
</div>


<script src="<?php echo BASE_URL; ?>views/js/functions_compras.js"></script>
<script>listar_trabajadores();</script>
<script>listar_productos();</script>