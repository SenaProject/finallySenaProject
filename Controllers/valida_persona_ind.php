<?php
 require "../Models/crear.php";

$IdPersona = $_POST["NumDoc"];
$Apellido1 = $_POST["Apellido1"];
$Apellido2 = $_POST["Apellido2"];
$Nombres1 = $_POST["Nombres1"];
$Nombres2 = $_POST["Nombres2"];
$estado = $_POST["estado"];
$fnacimiento = $_POST["fnacimiento"];
$Tel = $_POST["Tel"];
$email = $_POST["email"];
$Dir = $_POST["Dir"];
$tipo_documento = $_POST["tipodocumento"];
$Administrador = $_POST["vAdmin"];
$Rol = $_POST["vRol"];
//Botones de Crud
  // $BtnMM ="1";
 // $BtnM = $_POST["BtnM"];
// $BtnE = $_POST["BtnE"];
// $BtnB = $_POST["BtnB"];
// $BtnG = $_POST["BtnG"];

// print_r($_POST["BtnM"]);
// if (){
//
// }
// if ($BtnMM = "1"){
// $consultar= new ConsultaPersona();
// $ver=$consultar->TraePersona($IdPersona, $BtnMM);
// }

$consultar= new CrearPersona();
$ver=$consultar->fCrearPersona($IdPersona,$Nombres1,$Nombres2,$Apellido1,$Apellido2,$fnacimiento,$Tel,$email,$Dir,$tipo_documento,$Administrador,$Rol);

 ?>
