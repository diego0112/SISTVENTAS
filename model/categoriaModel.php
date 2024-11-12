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

    public function registrar_categoria($nombre,$detalle){
        $sql = $this->conexion->query("CALL insertar_categoria
        ('{$nombre}', '{$detalle}')");
       
        if ($sql == false) {
            print_r(value: $this->conexion->error);
        }


        $sql = $sql->fetch_object();
        return $sql;
    }
}
