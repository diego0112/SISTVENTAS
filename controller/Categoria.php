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
        // recorremos el array para agregar las ociones de la categoria
        for ($i = 0; $i < count($arr_Categorias); $i++) {
            $id_categoria = $arr_Categorias[$i]->id;
            $nombre = $arr_Categorias[$i]->nombre;
            $opciones = '';
            $arr_Categorias[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Categorias;

    }

    echo json_encode($arr_Respuesta);
}

$tipo = $_REQUEST['tipo'];

if ($tipo == "registrar") {
    if ($_POST) {
       
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
       

        if (
           $nombre == "" || $detalle == ""
        ) {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacios');
        } else {
            $arrCategoria = $objCategoria->registrar_categoria(
                    $nombre,
                    $detalle,
                );

            if ($arrCategoria) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Producto registrado con exito');


            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }
}
