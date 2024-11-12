<?php

require_once "../library/conexion.php";

class TrabajadorModel
{
    private $conexion;
    
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    
    public function obtener_trabajadores()
    {
        $arrRespuesta = array();
        // Consulta a la tabla persona para obtener los proveedores
        $respuesta = $this->conexion->query("SELECT * FROM persona WHERE rol = 'trabajador'");
        
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        
        return $arrRespuesta;
    }
}

