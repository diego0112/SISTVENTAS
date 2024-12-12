<?php

require_once('../model/categoriaModel.php');
//instanciar la clase categoria model
$objCategoria = new CategoriaModel();

$tipo = $_REQUEST['tipo'];

if ($tipo == "ver_categorias") {
    $id_categoria = $_POST['id_categoria'];
    $arr_Respuesta = $objCategoria->verCategorias($id_categoria);
    if (empty($arr_Respuesta)) {
        $response = array('status' => false, 'mensaje' => 'Error, no hay información');
    } else {
        $response = array('status' => true, 'mensaje' => 'Datos encontrados', 'contenido' => $arr_Respuesta);
    }
    echo json_encode($response);
}

if ($tipo == "listar") {
    //respuesta 
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Categorias = $objCategoria->obtener_categorias();
    if (!empty($arr_Categorias)) {
        // recorremos el array para agregar las ociones de la categoria
        for ($i = 0; $i < count($arr_Categorias); $i++) {
            $id_categoria = $arr_Categorias[$i]->id;
            $nombre = $arr_Categorias[$i]->nombre;
            $opciones = '<a href="'.BASE_URL.'EditarCategoria/'.$id_categoria.'" class="btn btn-success"><i class="fa fa-pencil"></i>Editar </a>
            <a onclick="EliminarCategoria('.$id_categoria.');" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar </a>';
            $arr_Categorias[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Categorias;

    }

    echo json_encode($arr_Respuesta);
}


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

//ACTUALIZAR CATEGORIA
if ($tipo == "actualizar") {
    if ($_POST) {
        $id_categoria = $_POST['id_categoria'];
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];

        if ($nombre == "" || $detalle == "") {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacíos');
        } else {
            $arrCategoria = $objCategoria->actualizar_categoria($id_categoria, $nombre, $detalle);
            if ($arrCategoria) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Categoria actualizada con éxito');

            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al actualizar la Categoria');
            }
        }
        echo json_encode($arr_Respuesta);
    }
}


if ($tipo == "eliminar") {
    $id = $_POST['id_categoria'];
    $arr_Respuesta = $objCategoria->eliminar_categoria($id);

    if (empty($arr_Respuesta)) {
        echo json_encode(['status' => true, 'mensaje' => 'Categoria eliminada con éxito']);
    } else {
        echo json_encode(['status' => false, 'mensaje' => 'Error al eliminar la Categoria']);
}
echo json_encode($response);
}
