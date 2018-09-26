<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Views/css/validar_detalle_eva.css">
    <title></title>
  </head>
  <body>
    <h1>Procesando!!</h1>
    <?php
    require_once "../Models/crear.php";
    require_once "../Models/leer.php";
    $cConIyACur= new ConsultaPersonaCurso();
    $cPreXFor = new ConsultarFormularioD();
    $IdFormulario = $_POST['ListaForm'];
    $Annio = $_POST['lannio'];
    $Trimestre = $_POST['ltrimestre'];
    $ListaHumano = $_POST['ListaHumano'];
    $IdEvaluacion = $_GET['valor'];
    $cant = 0;


  if ($ListaHumano == 21) {
    // Todos por un rango de tiempo
    // ejecutar funcion para insertar datos a evaluacion detalle
    // para las preguntas
  $vPreXFor=$cPreXFor->TraeFormularioDall($IdFormulario);
  foreach ($vPreXFor as $vPreXForInt) {
    // para las Instructores, Aprendices y Fichas
      $vConIyACur=$cConIyACur->fTraeCursoInsXAprXFichaAll($Annio, $Trimestre,0,'');
      foreach ($vConIyACur as $vConIyACurInt) {
        $cant = $cant + 1;
        // $IdEvaluacion, $IdFormulario, $IdPregunta, $IdInstructor, $IdAprendiz, $Annio, $Trimestre, $Estado
        // este es el inser pero luego de pintar
        $cCreaEvaDet= new CrearEvaluacionDetalle();
        echo "No.".$cant." | Evaluacion No. ".$IdEvaluacion."| Formulario No.".$IdFormulario."| Pregunta".$vPreXForInt[4]."| Instructor: ".$vConIyACurInt[1]."| Aprendiz ".$vConIyACurInt[0]."| Año ".$Annio."| Trimestre ".$Trimestre."| Ficha ".$vConIyACurInt[2]."<br>";
        $CrEvDe=$cCreaEvaDet->fCrearEvaDetAll($IdEvaluacion, $IdFormulario, $vPreXForInt[4], $vConIyACurInt[1], $vConIyACurInt[0], $Annio, $Trimestre, $vConIyACurInt[2], 'True');
        echo "Registro insertado";
      }
    }
    echo "<b>Son ".$cant." Registros procesados ... </b><h1><b>FIN DEL PROCESO</b></h1>";
  }

if ($ListaHumano == 22 ) {
if ($_GET['control']=='ok') {
  // Ejecucion de insercion por programa
  // Programa por un rango de tiempo
  // ejecutar funcion para insertar datos a evaluacion detalle
  // para las preguntas
require_once "../Models/crear.php";
require_once "../Models/leer.php";
$cPreXFor1 = new ConsultarFormularioD();
$IdFormulario = $_POST['ListaForm'];
$Annio = $_POST['lannio'];
$Trimestre = $_POST['ltrimestre'];
$programa = $_POST['lprograma'];
$vPreXFor1=$cPreXFor1->TraeFormularioDall($IdFormulario);
foreach ($vPreXFor1 as $vPreXFor1Int) {
  // para las Instructores, Aprendices y Fichas por programa

    $vConIyACur=$cConIyACur->fTraeCursoInsXAprAll($Annio, $Trimestre,1,$programa);
    foreach ($vConIyACur as $vConIyACurInt) {
      $cant = $cant + 1;
      // $IdEvaluacion, $IdFormulario, $IdPregunta, $IdInstructor, $IdAprendiz, $Annio, $Trimestre, $Estado
      // este es el inser pero luego de pintar
      $cCreaEvaDet= new CrearEvaluacionDetalle();
      echo "No.".$cant." | Evaluacion No. ".$IdEvaluacion."| Formulario No.".$IdFormulario."| Pregunta".$vPreXFor1Int[4]."| Instructor: ".$vConIyACurInt[1]."| Aprendiz ".$vConIyACurInt[0]."| Año ".$Annio."| Trimestre ".$Trimestre."| Ficha ".$vConIyACurInt[2]."<br>";
      $CrEvDe=$cCreaEvaDet->fCrearEvaDetAll($IdEvaluacion, $IdFormulario, $vPreXFor1Int[4], $vConIyACurInt[1], $vConIyACurInt[0], $Annio, $Trimestre, $vConIyACurInt[2], 'True');
      echo "Registro insertado";
    }
  }
  echo "<br><b>Son ".$cant." Registros procesados ... </b><h1><b>FIN DEL PROCESO</b></h1>";


} else {

echo "<form class='' action='validar_detalle_eva.php?valor=".$IdEvaluacion."&control=ok' method='post'>";
?>
  <div style="color: rgb(255,255,255)">


  <?php

  echo "<input class='ocultarinput' type='text' name='ListaForm' value='".$IdFormulario."' readonly >";
  echo "<input class='ocultarinput' type='text' name='lannio' value='".$Annio."' readonly '>";
  echo "<input class='ocultarinput' type='text' name='ltrimestre' value='".$Trimestre."' readonly'>";
  echo "<input class='ocultarinput' type='text' name='ListaHumano' value='".$ListaHumano."' readonly'>";


   ?>
  </div>
<h1>Programa</h1>
<p>Seleccione el programa al cual se le cagara la evaluacion en el rango de tiempo previamente seleccionado.</p>

  <select required class='' name='lprograma'>
  <option value='' >Seleccione ...</option>
<?php
$cConCurXPro= new ConsultaPersonaCurso();
$vConCurXPro=$cConCurXPro->fTraeCursoXProgramaAll($Annio, $Trimestre);
  foreach ($vConCurXPro as $vConCurXProInt) {
    echo "<option value='".$vConCurXProInt[0]."' >".$vConCurXProInt[1]."</option>";
          }
?>
  </select>
  <input type="submit" name="btnProcesar" value="Procesar ...">
</form>
<?php
}
}

if ($ListaHumano == 23 ) {
  if ($_GET['control']=='ok') {
    // Ejecucion de insercion por programa
    // Programa por un rango de tiempo
    // ejecutar funcion para insertar datos a evaluacion detalle
    // para las preguntas
  require_once "../Models/crear.php";
  require_once "../Models/leer.php";
  $cPreXFor1 = new ConsultarFormularioD();
  $IdFormulario = $_POST['ListaForm'];
  $Annio = $_POST['lannio'];
  $Trimestre = $_POST['ltrimestre'];
  $ficha = $_POST['lficha'];
  $vPreXFor1=$cPreXFor1->TraeFormularioDall($IdFormulario);
  foreach ($vPreXFor1 as $vPreXFor1Int) {
    // para las Instructores, Aprendices y Fichas por programa

      $vConIyACur=$cConIyACur->fTraeCursoInsXAprAll($Annio, $Trimestre,2,$ficha);
      foreach ($vConIyACur as $vConIyACurInt) {
        $cant = $cant + 1;
        // $IdEvaluacion, $IdFormulario, $IdPregunta, $IdInstructor, $IdAprendiz, $Annio, $Trimestre, $Estado
        // este es el inser pero luego de pintar
        $cCreaEvaDet= new CrearEvaluacionDetalle();
        echo "No.".$cant." | Evaluacion No. ".$IdEvaluacion."| Formulario No.".$IdFormulario."| Pregunta".$vPreXFor1Int[4]."| Instructor: ".$vConIyACurInt[1]."| Aprendiz ".$vConIyACurInt[0]."| Año ".$Annio."| Trimestre ".$Trimestre."| Ficha ".$vConIyACurInt[2]."<br>";
        $CrEvDe=$cCreaEvaDet->fCrearEvaDetAll($IdEvaluacion, $IdFormulario, $vPreXFor1Int[4], $vConIyACurInt[1], $vConIyACurInt[0], $Annio, $Trimestre, $vConIyACurInt[2], 'True');
        echo "Registro insertado";
      }
    }
    echo "<br><b>Son ".$cant." Registros procesados ... </b><h1><b>FIN DEL PROCESO</b></h1>";


  } else {

  echo "<form class='' action='validar_detalle_eva.php?valor=".$IdEvaluacion."&control=ok' method='post'>";
  ?>
    <div style="color: rgb(255,255,255)">


    <?php

    echo "<input class='ocultarinput' type='text' name='ListaForm' value='".$IdFormulario."' readonly >";
    echo "<input class='ocultarinput' type='text' name='lannio' value='".$Annio."' readonly '>";
    echo "<input class='ocultarinput' type='text' name='ltrimestre' value='".$Trimestre."' readonly'>";
    echo "<input class='ocultarinput' type='text' name='ListaHumano' value='".$ListaHumano."' readonly'>";


     ?>
    </div>
  <h1>Ficha</h1>
  <p>Seleccione la ficha al cual se le cagara la evaluacion en el rango de tiempo previamente seleccionado.</p>

    <select required class='' name='lficha'>
    <option value='' >Seleccione ...</option>
  <?php
  $cConCurXFic= new ConsultaPersonaCurso();
  $vConCurXFic=$cConCurXFic->fTraeCursoXFichaAll($Annio, $Trimestre);
    foreach ($vConCurXFic as $vConCurXFicInt) {
      echo "<option value='".$vConCurXFicInt[0]."' >".$vConCurXFicInt[0]."</option>";
            }
  ?>
    </select>
    <input type="submit" name="btnProcesar" value="Procesar ...">
  </form>
  <?php
  }

echo "ficha";

 }

if ($ListaHumano == 24 ) {
echo "instructor";
}

     ?>


  </body>
</html>
