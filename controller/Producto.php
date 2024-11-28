<?php
require_once('../model/productoModel.php');
require_once('../model/categoriaModel.php');
require_once('../model/Personamodel.php');

$tipo  = $_REQUEST['tipo'];
//instancio la clase  productoModel

$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();
$objPersona = new PersonaModel();

if ($tipo == "listar") {
    //respuesta 
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_Producto = $objProducto->obtener_productos();
    if (!empty($arr_Producto)) {
        // recorremos el array para agregar las ociones de la categoria
        for ($i = 0; $i < count($arr_Producto); $i++) {
            // para cada producto obtenemos la categoria
            $id_categoria = $arr_Producto[$i]->id_categoria;
            $r_categoria = $objCategoria->obtener_categoria($id_categoria);
            $arr_Producto[$i]->categoria = $r_categoria;
            
            // para cada producto obtenemos proveedor
            $id_proveedor = $arr_Producto[$i]->id_proveedor;
            $r_proveedor = $objPersona->obtener_proveedor($id_proveedor);
            $arr_Producto[$i]->proveedor = $r_proveedor;

            
            $id_producto = $arr_Producto[$i]->id;
            $nombre = $arr_Producto[$i]->nombre;
            $opciones = '';
            $arr_Producto[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Producto;

    }

    echo json_encode($arr_Respuesta);
}


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
        $img = 'imagen';
        $proveedor = $_POST['proveedor'];


        if (
            $codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $nombre == "" ||
            $categoria == "" ||  $nombre == "" || $img == "" || $proveedor == ""
        ) {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacios');
        } else {
            //CARGAR ARCHIVOS
            $archivo = $_FILES['imagen']['tmp_name'];
            $destino = '../assets/img_productos/';
            $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));

            $arrProducto = $objProducto->registrarProducto(
                    $codigo,
                    $nombre,
                    $detalle,
                    $precio,
                    $stock,
                    $categoria,
                    $img,
                    $proveedor,
                    $tipoArchivo
                );

            if ($arrProducto->id_n > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Producto registrado con exito');

                $nombre = $arrProducto->id_n.".".$tipoArchivo;

                if (move_uploaded_file($archivo, $destino.''.$nombre)) {
                
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




?>