<?php
require_once('../model/categoriaModel.php');

//instanciar la clase categoria model
$objCategoria = new CategoriaModel();
$tipo = $_REQUEST['tipo'];

if ($tipo == "listar") {
    //respuesta
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Categorias = $objCategoria->obtener_categorias();

    if (!empty($arr_Categorias)) {
        //array para agregar las opciones de las categorias
        for ($i = 0; $i < count($arr_Categorias); $i++) {
            $id_categoria =  $arr_Categorias[$i]->id;
            $nombre = $arr_Categorias[$i]->nombre;
            $opciones = '<a href = "" class ="btn btn-succes"><i class ="fa fa-pencil" aria-hidden = "true"></i>Agregar</a>';
            $arr_Categorias[$i]->options =  $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Categorias;
    }
    echo json_encode($arr_Respuesta);
}
