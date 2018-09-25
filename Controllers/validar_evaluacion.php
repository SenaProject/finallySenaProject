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

if ($Control=='sigpregunta') {
  $UserApp = $_GET['usuario'];
  $vFicha = $_GET['tFicha'];
  $vAnnio = $_GET['tAnnio'];
  $vTrimestre = $_GET['tTrimestre'];
  $vInstructor = $_GET['tInstructor'];
  $vEvaluacion= $_GET['SelectEvaluacion'];
  $vRespuesta= $_GET['respuesta'];
  echo "llego aqui Usuario ".$UserApp;
  // debo guardar la respuesta en la base de datos y volver a cagar la misma pagina
if ($vRespuesta!==0) {
  
}
  header("location:../Views/frm_evaluar_pregunta.php?valor=sigpregunta&usuario=".$UserApp."&tFicha=".$vFicha."&tAnnio=".$vAnnio."&tTrimestre=".$vTrimestre."&tInstructor=".$vInstructor."&SelectEvaluacion=".$vEvaluacion);

}

 ?>
