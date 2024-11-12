<?php
require_once('../model/productoModel.php');

//instancio la clase  productoModel

$objProducto = new ProductoModel();
$tipo  = $_REQUEST['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    //echo $_FILES['imagen']['name'];

    

    if ($_POST) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria = $_POST['categoria'];
        $imagen = 'imagen';
        $proveedor = $_POST['proveedor'];


        if (
            $codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $nombre == "" ||
            $categoria == "" ||  $nombre == "" || $imagen == "" || $proveedor == ""
        ) {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacios');
        } else {
            $arrProducto = $objProducto->registrarProducto(
                    $codigo,
                    $nombre,
                    $detalle,
                    $precio,
                    $stock,
                    $categoria,
                    $imagen,
                    $proveedor
                );

            if ($arrProducto->id > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Producto registrado con exito');

                //CARGAR ARCHIVOS
                $archivo = $_FILES['imagen']['tmp_name'];
                $destino = './assets/img_productos/';
                $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));

                $nombre = $arrProducto->id.".".$tipoArchivo;

                if (move_uploaded_file($archivo, $destino.$nombre)) {
                    $arr_imagen = $objProducto->actualizar_imagen($id, $nombre);
                
                }else{
                    $arr_Respuesta = array("status"=> true, 'mensaje'=> 'Registro Exitoso, error al subir imagen');
                }

            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }
}


$tipo = $_REQUEST['tipo'];

if ($tipo == "listar") {
    //respuesta 
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Producto = $objProducto->obtener_productos();
    if (!empty($arr_Producto)) {
        // recorremos el array para agregar las ociones de la categoria
        for ($i = 0; $i < count($arr_Producto); $i++) {
            $id_producto = $arr_Producto[$i]->id;
            $nombre = $arr_Producto[$i]->nombre;
            $opciones = '<a href="" class="btn btn-success" ><i class="fa fa-pencil"> wwss</i></a>
             <a href="" class="btn btn-danger"><i class="fa fa-trash">wswsws</i></a>';
             $arr_Producto[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Producto;

    }

    echo json_encode($arr_Respuesta);
}

?>