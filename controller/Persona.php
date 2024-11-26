<?php
require_once('../model/Personamodel.php');


$objPersona = new PersonaModel();

$tipo  = $_REQUEST['tipo'];


if ($tipo == "listar") {
    //respuesta 
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arrPersona = $objPersona->obtener_personas();
    if (!empty($arrPersona)) {
        
        for ($i = 0; $i < count($arrPersona); $i++) {
            $id_categoria = $arrPersona[$i]->id;
            $nombre = $arrPersona[$i]->razon_social;
            $opciones = '<a href="#" class="btn btn-success"><i class="fa fa-pencil"></i> </a>
            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> </a>';
            $arrPersona[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arrPersona;

    }

    echo json_encode($arr_Respuesta);
}

if ($tipo == "registrar") {
    if ($_POST) {
        $nro_identidad = $_POST['nro_identidad'];
        $razon_social = $_POST['razon_social'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $departamento = $_POST['departamento'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $codigo_postal = $_POST['codigo_postal'];
        $direccion = $_POST['direccion'];
        $rol = $_POST['rol'];

        $password_secure = password_hash($nro_identidad, PASSWORD_DEFAULT);

        if (
            $nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == ""
        || $provincia == "" || $distrito == "" || $codigo_postal == "" || $direccion == "" || $rol == "" || $password_secure == ""
        ) {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacios');
        } else {
            $arrPersona = $objPersona->registrarPersona(
                $nro_identidad,
                $razon_social, 
                 $telefono,
                $correo,
                 $departamento,
                 $provincia,
                 $distrito,
                $codigo_postal,
                 $direccion,
                $rol,
                $password_secure
                );

            if ($arrPersona->id > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Producto registrado con exito');

        

            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }

}

$tipo = $_REQUEST['tipo'];

if ($tipo == "listarproveedor") {
    // Respuesta inicial
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    
    // Obtener la lista de proveedores
    $arr_Proveedores = $objPersona->obtener_proveedores();
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

$tipo = $_REQUEST['tipo'];

if ($tipo == "listartrabajador") {
    // Respuesta inicial
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    
    // Obtener la lista de proveedores
    $arr_Trabajador = $objPersona->obtener_trabajadores();
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

