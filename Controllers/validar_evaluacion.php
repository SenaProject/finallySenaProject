<?php
$Control = $_GET['valor'];

if ($Control == 'nuevaeva') {
  require_once "../Models/crear.php";
  $FIni = $_POST['fini'];
  $FFin = $_POST['ffin'];
  $consultar= new CrearEvaluacionMaestro();
  $ver=$consultar->fCrearEvaluacionMaestro($FIni,$FFin);
  echo "<h2>Fue adicionado con exito la nueva evaluacion, el rango de aplicaion es:</h2>";
  echo "<h1>Fecha inicial: ".$FIni."</h1><br><h1>Fecha final: ".$FFin."</h1>";
  echo "<br>";
}


 ?>
