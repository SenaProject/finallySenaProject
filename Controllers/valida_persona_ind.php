<?php
$valor = $_GET["valor"];

if ($valor=="EditarPersona") {
  $IdPersona = $_POST["NumDoc"];
  $Apellido1 = $_POST["Apellido1"];
  $Apellido2 = $_POST["Apellido2"];
  $Nombre1 = $_POST["Nombre1"];
  $Nombre2 = $_POST["Nombre2"];
  $estado = $_POST["estado"];
  $fnacimiento = $_POST["fnacimiento"];
  $Tel = $_POST["Tel"];
  $email = $_POST["email"];
  $Dir = $_POST["Dir"];
  $tipo_documento = $_POST["tipodocumento"];
  echo "<!DOCTYPE html>";
  echo "<html lang='en' dir='ltr'>";
  echo "  <head>";
  echo "    <meta charset='utf-8'>";
  echo "    <title></title>";
  echo "  </head>";
  echo "  <body>";
  echo "    <h1>REGISTRO EDITADO</h1>";
  echo "  </body>";
  echo "</html>";

  require "../Models/actualizar.php";

  $consultar= new ModificarPersona();
  $ver=$consultar->ModificaPer($IdPersona,$Nombre1,$Nombre2,$Apellido1,$Apellido2, $estado, $fnacimiento, $email, $Tel, $Dir, $tipo_documento);
}

if ($valor=="CrearPersona") {
  require "../Models/crear.php";
  $IdPersona = $_POST["NumDoc"];
  $Apellido1 = $_POST["Apellido1"];
  $Apellido2 = $_POST["Apellido2"];
  $Nombre1 = $_POST["Nombre1"];
  $Nombre2 = $_POST["Nombre2"];
  $estado = $_POST["estado"];
  $fnacimiento = $_POST["fnacimiento"];
  $Tel = $_POST["Tel"];
  $email = $_POST["email"];
  $Dir = $_POST["Dir"];
  $tipo_documento = $_POST["tipodocumento"];
  $Administrador = $_POST["vAdmin"];
  $Rol = $_POST["vRol"];
  $ficha = $_POST["vFicha"];


$consultar= new CrearPersona();
$ver=$consultar->fCrearPersona($IdPersona,$Nombre1,$Nombre2,$Apellido1,$Apellido2,$fnacimiento,$Tel,$email,$Dir,$tipo_documento,$Administrador,$Rol,$ficha);
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
if ($valor=='BorrarPersona') {
$IdPersona = $_GET["IdPersona"];
  require "../Models/borrar.php";


  $consultar= new BorrarPersona();
  $ver=$consultar->fBorrarPersona($IdPersona);
  echo "<!DOCTYPE html>";
  echo "<html lang='en' dir='ltr'>";
  echo "  <head>";
  echo "    <meta charset='utf-8'>";
  echo "    <title></title>";
  echo "  </head>";
  echo "  <body>";
  echo "    <h1>REGISTRO ELIMINADO</h1>";
  echo "  </body>";
  echo "</html>";
}
 ?>
