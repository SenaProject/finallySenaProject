<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Views/css/frm_aplicar_eva_evaluacion.css">
    <title></title>

    <?php

    require_once "../Models/leer.php";
    // print_r($UsuarioApp);
    // $IdPersona = USUARIO;
    $UserApp = $_POST['usuario'];
    $vFicha = $_POST['tFicha'];
    $vAnnio = $_POST['tAnnio'];
    $vTrimestre = $_POST['tTrimestre'];
    $vInstructor = $_POST['SelectInstructor'];
    $cEvaluacion= new ConsultaAplicarEvaluacion();
    $vEvaluacion=$cEvaluacion->fTraeInfoEva($UserApp, $vFicha, $vAnnio, $vTrimestre, $vInstructor, 5);
    $cCantPreguntasXRes= new ConsultaAplicarEvaluacion();
    $viCantPreguntasXRes=$cCantPreguntasXRes->fTraePreguntaEva($UserApp, $vFicha , $vAnnio, $vTrimestre, $vInstructor, 0, 2);
    ?>
  </head>
  <body>

      <h1>Aplicar Evaluacion [Evaluacion]</h1>
          <form class="" action="frm_evaluar_pregunta.php" method="post">
           <br>
            Usuario:
            <input type="text" name="usuario" value=<?php echo $UserApp; ?> readonly>
            <br>
            Ficha:
            <input type="text" name="tFicha" value=<?php echo $vFicha; ?> readonly>
            <br>
            Año:
            <input type="text" name="tAnnio" value=<?php echo $vAnnio; ?> readonly>
            <br>
            Trimestre:
            <input type="text" name="tTrimestre" value=<?php echo $vTrimestre; ?> readonly>
            <br>
            Instructor:
            <input type="text" name="tInstructor" value=<?php echo $vInstructor; ?> readonly>
            <br>
            <?php
              if ($viCantPreguntasXRes[0]>0) {
             ?>
            Evaluacion:
            <select id="SelectEvaluacion" name ="SelectEvaluacion">
             <option value='0'></option>
             <?php
               foreach ($vEvaluacion as $vEvaluacionInt) {
                   echo "<option value='".$vEvaluacionInt[0]."'>".$vEvaluacionInt[0]."</option>";
               }
              ?>
            </select>
            <?php
            echo "<input type='submit' name='btnSig' value='Siguiente ...'>";
          } else {
            echo "<h1><b>No hay evaluacion pendiente</b></h1>";
          }
             ?>

    </form>
  </body>
</html>
