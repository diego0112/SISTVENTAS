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
        $img,
        $proveedor,
        $tipoArchivo
    ) {
        $sql = $this->conexion->query("CALL insertProducto
        ('{$codigo}', '{$nombre}', '{$detalle}', '{$precio}', '{$stock}',
         '{$categoria}', '{$img}', '{$proveedor}' , '{$tipoArchivo}' )");

        if ($sql == false) {
            print_r(value: $this->conexion->error);
        }


        $sql = $sql->fetch_object();
        return $sql;
    }
    public function actualizar_imagen($id,  $imagen)
    {
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


    public function obtener_producto_por_id($id)
    {
        $respuesta = $this->conexion->query("SELECT nombre FROM producto WHERE id = '{$id}'");
        $objeto = $respuesta->fetch_object();
        return $objeto;
    }
    public function verProducto($id)
    {
        $sql = $this->conexion->query("SELECT * FROM producto WHERE id = '$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }


    // ACTUALIZAR PRODUCTO  
    public function actualizar_Producto($id, $codigo, $nombre, $detalle, $precio, $categoria, $proveedor)
    {

        $sql = "UPDATE producto SET codigo = ?, nombre = ?, detalle = ?, precio = ?, id_categoria = ?, id_proveedor = ? WHERE id = ?";

        $sql = $this->conexion->prepare($sql);

        $sql->bind_param('ssssisi', $codigo, $nombre, $detalle, $precio, $categoria, $proveedor, $id);

        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // ELIMINAR PRODUCTO
    public function productoTieneCompras($id)
    {
        $sql = $this->conexion->query("SELECT COUNT(*) as count FROM compras WHERE id_producto = '{$id}'");
        $resultado = $sql->fetch_object();
        return $resultado->count > 0;
    }

    public function eliminarProducto($id)
    {
        $sql = $this->conexion->query("CALL eliminarproducto('{$id}')");

        if (!$sql) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $sql;
    }
}
