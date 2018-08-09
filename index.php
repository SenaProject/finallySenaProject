<?php

require_once "Controllers/controller.php";
require_once "Models/conection.php";

$inicio = new MvcController;
$inicio  -> InicioAppController();

//echo "string";

$conectar= new Conexion;
$conectar -> conection();

?>
