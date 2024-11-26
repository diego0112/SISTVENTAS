<?php
require_once('../model/productoModel.php');
require_once('../model/comprasmodel.php');
require_once('../model/Personamodel.php');

$tipo  = $_REQUEST['tipo'];
//instancio la clase  productoModel

$objProducto = new ProductoModel();
$objCompras = new ComprasModel();
$objPersona = new PersonaModel();

if ($tipo == "listar_compras") {
    //respuesta 
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Compras = $objCompras->obtener_compras();
    if (!empty($arr_Compras)) {
 
       for ($i = 0; $i < count($arr_Compras); $i++) {
 
          // Obtener producto
          $id_producto = $arr_Compras[$i]->id_producto;
          $r_producto = $objProducto->obtener_producto_por_id($id_producto);
          $arr_Compras[$i]->producto = $r_producto;
 
          // Obtener trabajador
          $id_trabajador = $arr_Compras[$i]->id_trabajador;
          $r_trabajador = $objPersona->obtener_trabajador_por_id($id_trabajador);
          $arr_Compras[$i]->trabajador = $r_trabajador;
 
          $id_Compras = $arr_Compras[$i]->id;
         
          $opciones = '<a href="#" class="btn btn-success"><i class="fa fa-pencil"></i> </a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> </a>';
          $arr_Compras[$i]->options = $opciones;
       }
       $arr_Respuesta['status'] = true;
       $arr_Respuesta['contenido'] = $arr_Compras;
    }
 
    echo json_encode($arr_Respuesta);
 }
 

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
