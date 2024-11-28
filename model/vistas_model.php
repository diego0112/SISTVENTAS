<?php
session_start();

class vistaModelo
{

    protected static function obtener_vista($vista)
    {
        $palabras_permitidas = [
            'login',
            'usuario',
            'producto',
            'productos',
            'index',
            'catalogo',
            'contacto',
            'detalledecarrito',
            'DetalleProducto',
            'nuevo-producto',
            'Mediosdepago',
            'NuestraEmpresa',
            'reclamaciones',
            'TerminosyCondiciones',
            'nueva-categoria',
            'nueva-compra',
            'principal',
            'nuevo-persona',
            'principal',
            'productos',
            'categorias',
            'personas',
            'EditarProducto',
            'EliminarProducto',
            'compras'
        ];
       /* if (!isset($_SESSION['sesion_venta_id'])) {
            return "login";
        }*/
        if (in_array($vista, $palabras_permitidas)) {
            if (is_file("./views/" . $vista . ".php")) {
                $contenido = "./views/" . $vista . ".php";
            } else {
                $contenido = "404";
            }
        } elseif ($vista == "index" || $vista == "login") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
