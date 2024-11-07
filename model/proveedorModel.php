<?php

require_once "../library/conexion.php";

class ProveedorModel
{
    private $conexion;
    
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    
    public function obtener_proveedores()
    {
        $arrRespuesta = array();
        // Consulta a la tabla persona para obtener los proveedores
        $respuesta = $this->conexion->query("SELECT * FROM persona WHERE rol = 'proveedor'");
        
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        
        return $arrRespuesta;
    }
}

