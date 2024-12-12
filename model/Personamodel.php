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
    public function verPersonas($id)
    {
        $sql = $this->conexion->query("SELECT * FROM persona WHERE id = '{$id}'");
        $sql = $sql->fetch_object();
        return $sql;
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

    public function obtener_proveedor($id){
        $id = $this->conexion->real_escape_string($id);
        $sql = $this->conexion->query("SELECT * FROM persona WHERE id = '{$id}'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function obtener_trabajador_por_id($id)
    {
        $respuesta = $this->conexion->query("SELECT razon_social FROM persona WHERE id = '{$id}'");
        return $respuesta->fetch_object();
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

    public function obtener_personas()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query(" SELECT * FROM persona");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
            
        }
        return $arrRespuesta;
    }


    public function actualizarPersona(
        $id,
       
        $razon_social,
        $telefono,
        $correo,
        $departamento,
        $provincia,
        $distrito,
        $codigo_postal,
        $direccion,
        $rol
    ) {
        $sql = $this->conexion->query("CALL actualizar_persona(
            '{$id}', '{$razon_social}', '{$telefono}', '{$correo}',
            '{$departamento}', '{$provincia}', '{$distrito}', '{$codigo_postal}', '{$direccion}', '{$rol}')");

        if (!$sql) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $sql;
    }
    public function personaTieneAsociaciones($id)
{
    $sql = $this->conexion->query("SELECT COUNT(*) as count FROM compras WHERE id_trabajador = '{$id}'");
    $resultado = $sql->fetch_object();
    if ($resultado->count > 0) {
        return true;
    }

    $sql = $this->conexion->query("SELECT COUNT(*) as count FROM producto WHERE id_proveedor = '{$id}'");
    $resultado = $sql->fetch_object();
    return $resultado->count > 0;
}

    public function eliminarPersona($id)
    {
        $sql = $this->conexion->query("CALL eliminar_persona('{$id}')");
    
        if (!$sql) {
            die("Error en la consulta: " . $this->conexion->error);
        }
    
        return $sql;
    }
    
}




