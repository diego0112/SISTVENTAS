<?php

require_once('../model/proveedorModel.php');
// Instanciar la clase ProveedorModel
$objProveedor = new ProveedorModel();

$tipo = $_REQUEST['tipo'];

if ($tipo == "listar") {
    // Respuesta inicial
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    
    // Obtener la lista de proveedores
    $arr_Proveedores = $objProveedor->obtener_proveedores();
    if (!empty($arr_Proveedores)) {
        // Recorrer el array para agregar las opciones para cada proveedor
        for ($i = 0; $i < count($arr_Proveedores); $i++) {
            $id_proveedor = $arr_Proveedores[$i]->id;
            $razon_social = $arr_Proveedores[$i]->razon_social;
            $opciones = '<a href="" class="btn btn-success"><i class="fa fa-pencil"> Editar</i></a>
                         <a href="" class="btn btn-danger"><i class="fa fa-trash"> Eliminar</i></a>';
            $arr_Proveedores[$i]->options = $opciones;
        }
        
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Proveedores;
    }

    echo json_encode($arr_Respuesta);
}
