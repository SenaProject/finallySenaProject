<?php
$valor = $_GET['valor'];
if ($valor=="CrearPregunta") {
  require_once "../Models/crear.php";
  $IdGrupo = $_POST["grupopregunta"];
  $IdRespuesta = $_POST["tiporespuesta"];
  $Descripcion = $_POST["descripcionpregunta"];


$consultar= new CrearPregunta();
$ver=$consultar->fCrearPregunta($IdGrupo,$IdRespuesta,$Descripcion);
echo "<!DOCTYPE html>";
echo "<html lang='en' dir='ltr'>";
echo "  <head>";
echo "    <meta charset='utf-8'>";
echo "    <title></title>";
echo "  </head>";
echo "  <body>";
echo "    <h1>REGISTRO GUARDADO</h1>";
echo "  </body>";
echo "</html>";
}
if ($valor=='BorrarPregunta') {
$IdPersona = $_GET["IdPregunta"];
  require_once "../Models/borrar.php";
}
 ?>
