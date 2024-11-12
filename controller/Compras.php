<?php
require_once('../model/comprasmodel.php');

//instancio la clase  productoModel

$objCompras = new ComprasModel();
$tipo  = $_REQUEST['tipo'];

if ($tipo == "registrar") {

    if ($_POST) {
        $producto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $fecha_compra = $_POST['fecha_compra'];
        $trabajador = $_POST['trabajador'];



        if (
            $producto == "" || $cantidad == "" || $precio == "" || $fecha_compra == ""  || $trabajador == ""
        ) {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacios');
        } else {
            $arrProducto = $objCompras->registrarCompras(
                $producto,
                $cantidad,
                $precio,
                $fecha_compra,

                $trabajador
            );

            if ($arrProducto->id > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Producto registrado con exito');
            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }
}
