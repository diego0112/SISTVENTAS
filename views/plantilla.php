<?php

require_once "./controller/vistas_control.php";
require_once "./config/config.php";

$mostrar =  new vistasControlador();

$vista =  $mostrar->obtenerVistaControlador();

if ($vista=="404" || $vista == "login") {
    require_once "./views/".$vista.".php";
}else {
    include "./views/include/header.php";
    include $vista;
    include "./views/include/footer.php";
}



?>