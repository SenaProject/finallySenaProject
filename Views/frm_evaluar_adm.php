<?php
require_once "../Models/leer.php";

$consultar= new ConsultaEvaluacion();
$ver=$consultar->TraeMaestroEvaluacionAll();
$consultar1= new ConsultaAplicarEvaluacion();

// var_dump ($ver);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/frm_persona_individual_pl.css">
    <title>Listado de Personas</title>
<body>
        <h1>Administracion de evaluacion</h1>
        <br>
        <br>
        <br>
        <h3><a href="frm_evaluar_adm_add.php?valor=nuevomaestro">Adicionar nueva evaluación</a></h3>
        <br>
        <br>
        <br>
    <table >
      <tr>
        <th><a>Id Evaluacion</a></th>
        <th><a>Fecha Inicial</a></th>
        <th><a>Fecha Final</a></th>
        <th><a>Detalle</a></th>
        <th><a>Eliminacion</a></th>
      </tr>
      <tr>
        <?php
          foreach ($ver as $value) {
            // code...
            // var_dump ($value);
          echo        "<td><a>".$value[0]."</a></td>";
          echo        "<td><a>".$value[2]."</a></td>";
          echo        "<td><a>".$value[3]."</a></td>";
          $ver1=$consultar1->fTraeCantPreguntaResuEva($value[0]);
          // echo $ver1;
          if ($ver1[0]==0) {
            echo        "<td><a href='frm_evaluacion_detalle_ver.php?valor=".$value[0]."'>[Ver] - </a><a href='frm_evaluacion_detalle.php?valor=".$value[0]."'>Asignar:</a></td>";
          }else{
            echo        "<td><a href='frm_evaluacion_detalle_ver.php?valor=".$value[0]."'>[Ver] - </a><a>En ejecucion</a></td>";
          }
          if ($ver1[0]==0) {
          echo        "<td><a href='../Controllers/valida_eva_det_quitar.php?IdFormulario=".$value[0]."'>Quitar detalle</a></td>";  // AQUI VOY
            }else{
              echo        "<td><a>En ejecucion</a></td>";
            }
          echo "</tr>";
}
         ?>
    </table>
  </head>
  </body>
</html>
