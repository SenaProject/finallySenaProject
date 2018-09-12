<?php
$valor=$_GET['valor'];

require "../Models/leer.php";
require "../Models/crear.php";

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
