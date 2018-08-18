<?php

require_once "Controllers/controller.php";
//$prueba = PatronSingleton::singleton();


//$ficha = new MvcController;
//$ficha  -> ConsultarFichaControllerSigleton();

$prueba = new MvcController;
$prueba -> ConsultarFichaControllerSigleton();
//$conect = new Conexion;
//$conect -> conection();
echo "string";
