<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Views/css/validar_evaluacion.css">
    <title></title>
  </head>
  <body>
<?php
// require_once "../Views/frm_evaluar_pregunta.php";
// $Control = '0';
 $Control = $_GET['valor'];
// $Control = $HTTP_GET_VARS['valor'];
// print_r($control);
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
// proviene de frm_evaluar_adm.php
if ($Control =='evaluarficha') {
  $userapp= $_POST['usuario'];
  $ficha= $_POST['SelectFicha'];
  if (($userapp<=0 || $userapp=='')) {
      // print_r('por aqui paso uno');
       header("location:../Views/frm_aplicar_eva_ficha.php?valor=".$userapp) ;
  }else{
    if (($ficha<=0 || $ficha=='')) {
    print_r('por aqui paso dos');
    header("location:../Views/frm_aplicar_eva_ficha.php?valor=".$userapp) ;
  } else {
    // print_r('por aqui paso uno ver 2');

    header("location:../Views/frm_aplicar_eva_annio.php?vusuario=".$userapp."&vficha=".$ficha) ;
  }
  }

}
// Proviene de frm_aplicar_eva_annio.php
if ($Control=='evaluacionannio') {
  $userapp= $_POST['usuario'];
  $ficha= $_POST['tFicha'];
  $annio= $_POST['Selectannio'];
  if ($annio<=0 || $annio=='') {
    header("location:../Views/frm_aplicar_eva_annio.php?valor=evaluacionannio&vusuario=".$userapp."&vficha=".$ficha);
  } else {
    header("location:../Views/frm_aplicar_eva_trimestre.php?valor=evaluacionannio&usuario=".$userapp."&tFicha=".$ficha."&Selectannio=".$annio);
  }

}

if ($Control == 'sigpregunta') {
  require_once "../Models/actualizar.php";
// print_r("aquillego");
  $UserApp = $_POST['usuario'];
  $vFicha = $_POST['tFicha'];
  $vAnnio = $_POST['tAnnio'];
  $vTrimestre = $_POST['tTrimestre'];
  $vInstructor = $_POST['tInstructor'];
  $vEvaluacion= $_POST['SelectEvaluacion'];
  $vPregunta= $_POST['nPregunta'];
  $vRespuesta= $_POST['respuesta'];
  // echo $UserApp;
  // debo guardar la respuesta en la base de datos y volver a cagar la misma pagina
if ($vRespuesta==0 or $vRespuesta=='' ) {

} else {
// ejecute la actualizacion con la respuesta


  $cActEva= new ActualizarEvaluacion();
  $vActEva=$cActEva->fGuardarRespuesta($UserApp,$vFicha,$vAnnio,$vTrimestre,$vInstructor,$vEvaluacion,$vPregunta,$vRespuesta);
  // header("location:../Views/frm_evaluar_pregunta.php?usuario=".$UserApp."&tFicha=".$vFicha."&tAnnio=".$vAnnio."&tTrimestre=".$vTrimestre."&tInstructor=".$vInstructor."&SelectEvaluacion=".$vEvaluacion);

  ?>
  <form  class="form_validar_eva" action= "../Views/frm_evaluar_pregunta.php" method="post">

        <?php
          echo "<input class='ocultarinput' type='text' name ='usuario' value='".$UserApp."' readonly>";
          echo "<input class='ocultarinput' type='text' name ='tFicha' value='".$vFicha."' readonly>";
          echo "<input class='ocultarinput' type='text' name ='tAnnio' value='".$vAnnio."' readonly>";
          echo "<input class='ocultarinput' type='text' name ='tTrimestre' value='".$vTrimestre."' readonly>";
          echo "<input class='ocultarinput' type='text' name ='tInstructor' value='".$vInstructor."' readonly>";
          echo "<input class='ocultarinput' type='text' name ='SelectEvaluacion' value='".$vEvaluacion."' readonly>";
          echo "<input class='ocultarinput' type='text' name ='nPregunta' value='0'>";
             ?>
        <b>
          <div class="content_confirm">
            <div class="subcontent_confirm">
        <div class="title_confirm"><h1>Atencion !!!</h1></div>
          <p>Señor Aprendiz usted ha guardado con exito la anterior pregunta para continuar oprima el boton siguiente</p>
        </b>
         <div class="button_confirm"><input class="con_evaluacion" type="submit" name="btnNewPre" value="Siguiente ..."></div>
      </div>

    </div>
  </form>

  <?php
  // header("location:../Views/frm_evaluar_pregunta.php");
}
}

 ?>

</body>
</html>
