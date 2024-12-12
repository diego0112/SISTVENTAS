<?php
require_once "../library/conexion.php";
class ComprasModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrarCompras(
        $producto,
        $cantidad,
        $precio,
        $fecha_compra,
    
        $trabajador

    ) {
        $sql = $this->conexion->query("CALL insertar_compra
        ('{$producto}', '{$cantidad}', '{$precio}', '{$fecha_compra}', '{$trabajador}')");
       
         if ($sql == false) {
            print_r(value: $this->conexion->error);
        }


        $sql = $sql->fetch_object();
        return $sql;
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
    public function obtener_compras()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query(" SELECT * FROM compras");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
            
        }
        return $arrRespuesta;
    }

    // ACTUALIZAR PRODUCTO
    public function verCompras($id)
    {
        $sql = $this->conexion->query("SELECT * FROM compras WHERE id = '{$id}'");
        return $sql->fetch_object();
    }

    public function actualizar_compra($id, $producto, $cantidad, $precio, $trabajador)
    {
        $sql = $this->conexion->query("UPDATE compras SET id_producto = '{$producto}', cantidad = '{$cantidad}', precio = '{$precio}', id_trabajador = '{$trabajador}'WHERE id = '{$id}'");

        if (!$sql) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $sql;
    }

  

    public function eliminarcompra($id)
{
    $sql = $this->conexion->query("CALL eliminar_compra('{$id}')");

        if (!$sql) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $sql;
}
}


