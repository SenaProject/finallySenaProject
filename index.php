<?php

require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controllerPage.php";

$mvc = new MvcPageManagement();
$mvc -> pagina();

$con = new Conexion;
$con -> conectar();

?>
