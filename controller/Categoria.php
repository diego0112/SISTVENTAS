<?php
require_once('../model/categoriaModel.php');

$tipo = $_REQUEST['tipo'];
$objCategoria = new CategoriaModel();

if($tipo== "listar"){
    //respuesta
    $arr_Respuesta = array('status'=>false, 'mensaje'=>'Error al registrar producto');
    $arr_Categorias = $objCategoria->obtener_categorias();

    print_r($arr_Categorias);
}
?>