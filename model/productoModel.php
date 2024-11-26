<?php
require_once "../library/conexion.php";
class ProductoModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    
    public function registrarProducto(
        $codigo,
        $nombre,
        $detalle,
        $precio,
        $stock,
        $categoria,
        $imagen,
        $proveedor, 
        $tipoArchivo
    ) {
        $sql = $this->conexion->query("CALL insertProducto
        ('{$codigo}', '{$nombre}', '{$detalle}', '{$precio}', '{$stock}',
         '{$categoria}', '{$imagen}', '{$proveedor}' , '{$tipoArchivo}' )");
       
         if ($sql == false) {
            print_r(value: $this->conexion->error);
        }


        $sql = $sql->fetch_object();
        return $sql;
    }
    public function actualizar_imagen($id,  $imagen){
        $sql = $this->conexion->query("UPDATE producto SET imagen = '{$imagen}' WHERE id = '{$id}'");
        return 1;
    }
    public function obtener_productos()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query(" SELECT * FROM producto");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
            
        }
        return $arrRespuesta;
    }
}
