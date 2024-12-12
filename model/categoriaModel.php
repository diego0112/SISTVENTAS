<?php

require_once "../library/conexion.php";

class CategoriaModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function obtener_categorias()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query(" SELECT * FROM categoria");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
            
        }
        return $arrRespuesta;
    }

    public function verCategorias($id)
    {
        $sql = $this->conexion->query("SELECT * FROM categoria WHERE id = '{$id}'");
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function registrar_categoria($nombre,$detalle){
        $sql = $this->conexion->query("CALL insertar_categoria
        ('{$nombre}', '{$detalle}')");
       
        if ($sql == false) {
            print_r(value: $this->conexion->error);
        }


        $sql = $sql->fetch_object();
        return $sql;
    }
    public function obtener_categoria($id){
        $respuesta = $this->conexion->query("SELECT * FROM categoria WHERE id= '{$id}'");
        $objeto= $respuesta->fetch_object();
        return $objeto;
    }

    // ACTUALIZAR CATEGORIA 
    public function actualizar_categoria($id, $nombre, $detalle) {

        $sql = $this->conexion->query("CALL actualizar_categoria('{$id}', '{$nombre}', '{$detalle}')");

        if (!$sql) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $sql;
    }
    // ELIMINAR CATEGORIA
    public function categoriaTieneProductos($id)
    {
        $sql = $this->conexion->query("SELECT COUNT(*) as count FROM producto WHERE id_categoria = '{$id}'");
        $resultado = $sql->fetch_object();
        return $resultado->count > 0;
    }
    
    public function eliminarCategoria($id)
    {
        $sql = $this->conexion->query("CALL eliminar_categoria('{$id}')");

        if (!$sql) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $sql;
    }

}
