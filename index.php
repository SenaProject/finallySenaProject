<?php

require_once "Controllers/controller.php";
require_once "Models/conection.php";

$ficha = new MvcController;
$ficha  -> ConsultarFichaController();


$conect = new Conexion;
$conect -> conection();
//echo "string";
