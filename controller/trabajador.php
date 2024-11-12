<?php

require_once('../model/trabajadormodel.php');
// Instanciar la clase ProveedorModel
$objTrabajador = new TrabajadorModel();

$tipo = $_REQUEST['tipo'];

if ($tipo == "listar") {
    // Respuesta inicial
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    
    // Obtener la lista de proveedores
    $arr_Trabajador = $objTrabajador->obtener_trabajadores();
    if (!empty($arr_Trabajador)) {
        // Recorrer el array para agregar las opciones para cada proveedor
        for ($i = 0; $i < count($arr_Trabajador); $i++) {
            $id_trabajador = $arr_Trabajador[$i]->id;
            $razon_social = $arr_Trabajador[$i]->razon_social;
            $opciones = '<a href="" class="btn btn-success"><i class="fa fa-pencil"> Editar</i></a>
                         <a href="" class="btn btn-danger"><i class="fa fa-trash"> Eliminar</i></a>';
            $arr_Trabajador[$i]->options = $opciones;
        }
        
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Trabajador;
    }

    echo json_encode($arr_Respuesta);
}
