<?php
$valor=$_GET['valor'];
// print_r($valor);
require "../Models/leer.php";
require "../Models/crear.php";

if ($valor=='nuevaficha') {
  $Ficha = $_POST['vficha'];
  $IdPrograma = $_POST['lprograma'];
  $FInicio = $_POST['vfecini'];
  $FFin = $_POST['vfecfin'];
  $IdJornada = $_POST['ljornada'];
  // echo $Ficha." - ".$IdPrograma." - ".$FInicio." - ".$FFin." - ".$IdJornada;
  $consultar = new CrearFicha();
  $ver=$consultar->fCrearFicha($Ficha, $IdPrograma, $FInicio, $FFin, $IdJornada);
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Se Registro con exito la nueva ficha</h1>
    <h2><a href="../Views/frm_ficha.php">Volver</a></h2>
  </body>
</html>
  <?php
}

if ($valor =='asignaficha') {
$persona = $_POST['vPersona'];
$rol = $_POST['vRol'];
$ficha = $_POST['vFicha'];

// print_r($persona);
// print_r(is_null($persona));
$Control = False;


if ($persona!=="Nulo") {
  $consultar= new ConsultaPersona();
  $ver=$consultar->TraePersona($persona);
      if ($rol!=="Nulo") {
        $consultar1= new ConsultaPersona();
        $ver1=$consultar1->TraePersRolxPxR($persona,$rol);
        if ($ficha!=="Nulo") {
          $consultar2= new ConsultaFicha();
          $ver2=$consultar2->TraeFicha($ficha);
          echo "<h1>Cargado con exito</h1>";
          echo $persona." - ". $ver[5]." <br />";
          foreach ($ver1 as $valor1){
          echo $rol." - ". $valor1[2]." <br />";}
          echo $ficha." - ". $ver2[1]." <br />";
        } else {$ficha = NULL; echo "<h1>Atencion Valide la ficha</h1>";}
      } else {$rol = NULL; echo "<h1>Atencion Valide el Rol</h1>";}
} else {$persona = NULL; echo "<h1>Atencion Valide el Usuario</h1>";}




if (isset($ver) && isset($ver1)&&isset($ver2)) {
   $consultar3 = new CrearFichaPersonaRol();
   $ver3=$consultar3->fCrearFichaPersonaRol($persona, $rol, $ficha);
}

}


 ?>
