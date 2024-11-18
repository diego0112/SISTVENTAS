<?php
require_once "../library/conexion.php";
class PersonaModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrarPersona(
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
        $password
    ) {
        $sql = $this->conexion->query("CALL insertar_persona
        ('{$nro_identidad}','{$razon_social}','{$telefono}','{$correo}','{$departamento}',
        '{$provincia}','{$distrito}','{$codigo_postal}','{$direccion}','{$rol}','{$password}')");
         if ($sql == false) {
            print_r(value: $this->conexion->error);
        }
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function buscarPersonaporDNI($nro_identidad){
     $sql = $this->conexion->query("SELECT * FROM persona WHERE nro_identidad = '{$nro_identidad}'");
     $sql = $sql->fetch_object();
     return $sql;
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
