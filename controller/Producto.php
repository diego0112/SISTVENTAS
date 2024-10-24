<?php
require_once('../model/productoModel.php');
$tipo  = $_REQUEST['tipo'];

//instancio la clase  productoModel

$objProducto = new ProductoModel();

if ($tipo =="registrar") {
    //print_r($_POST);
    if ($_POST) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria = $_POST['categoria'];
        $img = $_POST['imagen'];
        $proveedor = $_POST['proveedor'];
    

        if ($codigo == "" || $nombre =="" || $detalle =="" || $precio =="" || $stock =="" || $nombre =="" ||
            $categoria =="" ||  $nombre =="" || $img =="" || $proveedor =="") {
                $arr_Respuesta = array('status'=>false, 'mensaje'=>'Error, campos vacios');
        } else {
            $arrProducto = $objProducto->registrarProducto($codigo, $nombre, $detalle, $precio,
                                                        $stock, $categoria, $img, $proveedor);

            if($arrProducto->id>0) {
                $arr_Respuesta = array('status'=>true, 'mensaje'=>'Producto registrado con exito');
            }else {
                $arr_Respuesta = array('status'=>false, 'mensaje'=>'Error al registrar producto');
            }
        }
    }
}

?>