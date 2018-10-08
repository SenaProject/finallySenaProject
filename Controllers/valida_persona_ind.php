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
  $admin = $_POST["tipoadmin"];
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

  require_once "../Models/actualizar.php";

  $consultar= new ModificarPersona();
  $ver=$consultar->ModificaPer($IdPersona,$Nombre1,$Nombre2,$Apellido1,$Apellido2, $estado, $fnacimiento, $email, $Tel, $Dir, $tipo_documento, $admin);
}

if ($valor=="CrearPersona") {
  require_once "../Models/crear.php";
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
  require_once "../Models/borrar.php";


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
if ($valor=='cargue') {
require_once "../Models/leer.php";
$control = 0;
$consultar= new ConsultaPersona();
$consultar2= new ConsultaParametros();
$consultar3= new ConsultaRol();
$bandera =0;
$archivo = $_FILES['archivo']['name'];
// $ver = 0;
echo "<form class='' action='valida_persona_ind.php?valor=cargueexec&archivo=".$archivo."' method='POST'>";
echo "<table border='3'>";
echo    "<tr>";
echo          "<th>Numero de documento</th>";
echo          "<th>Tipo de Documento</th>";
echo          "<th>Primer Nombre</th>";
echo          "<th>Segundo Nombre</th>";
echo          "<th>Primer Apellido</th>";
echo          "<th>Segundo Apellido</th>";
echo          "<th>Ficha</th>";
echo          "<th>Fecha de nacimiento</th>";
echo          "<th>Correo electronico</th>";
echo          "<th>Telefono</th>";
echo          "<th>Direccion</th>";
echo          "<th>Rol</th>";
echo    "</tr>";
$file=fopen($archivo,'r') or die("Problemas al abrir el archivo");
$allfile=fread($file,filesize($archivo));


$linea=explode(chr(13).chr(10),$allfile);
for ($i=0; $i < count($linea); $i++) {
  echo "<tr>";
  $campo=explode(chr(59),$linea[$i]);
  // print_r($campo[0]);
  for ($x=0; $x < count($campo); $x++) {
    echo "<td>";
    if ($x==0) {
      // $ver= 0;
      // print_r($campo[$x]);
      $ver=$consultar->ExistePersona($campo[$x]);
      // print_r($ver[0]);
        if ($ver[0] == 0) {
          echo $campo[$x];
          $bandera=$bandera+0;
        } else {
          echo "<font color='green'><b>".$campo[$x]." </b></font>";
          $bandera=$bandera+1;
        }
        // Tipo de documento
    }elseif ($x==1) {
      $ver2=$consultar2->TraeParametros($campo[$x],'tipodocumento');
      if ($ver2[0]) {
          echo $campo[$x]." - ".$ver2[0];
          $bandera=$bandera+0;
        } else {
          echo "<font color='red'><b>".$campo[$x]."</b></font>";
          $bandera=$bandera+1;
        }
        // ficha
    } elseif($x==6) {
    echo $campo[$x];
    echo "y";
    // Rol
  }  elseif($x==11) {
      $ver3=$consultar3->TraeRol($campo[$x]);
      echo $campo[$x]." - ".$ver3[1];

      }
      else {
        echo $campo[$x];
      }
    if ($x==count($campo)-1) {
    echo "</tr>";
  } else {
    echo "</td>";
  }
}// hasta aqui
}
echo "<tr>";
echo "<td colspan='12'>";

if ($bandera<1) {
  echo "<b>Al dar click en el siguiente boton cargara los anteriores registros al sistema</b>";
  echo "<input type='submit' name='btnCargar' value='Cargar'>";
} else {
  echo "<b>Atencion:</b><br> Por favor validar el archivo en los campos de color <font color='red'><b>rojo</b>. </font><br>Retirara los registros que los documentos esten en <font color='green'><b>verde</b></font>, ya existen, <b>eliminarlos</b> y volver a intentar -  ";
  echo "<b></b><a href='../Views/frm_persona_masivo.php'>Volver ...</a></b>";
}
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";

}

if ($valor=='cargueexec') {
  require "../Models/crear.php";
  $consultar= new CrearPersona();

$IdPersona='';
$Nombre1='';
$Nombre2='';
$Apellido1='';
$Apellido2='';
$fnacimiento='';
$Tel='';
$email='';
$Dir='';
$tipo_documento='';
$Administrador='False';
$Rol='';
$ficha='';


$archivo = $_GET["archivo"];
$file=fopen($archivo,'r') or die("Problemas al abrir el archivo");
$allfile=fread($file,filesize($archivo));
$linea=explode(chr(13).chr(10),$allfile);
for ($i=0; $i < count($linea); $i++) {
  $campo=explode(chr(59),$linea[$i]);
  for ($x=0; $x < count($campo); $x++) {
    // echo preg_replace("/\xEF\xBB\xBF/", "", $string);
    if ($x==0) { $IdPersona=preg_replace("/\xEF\xBB\xBF/", "",$campo[$x]);}
    if ($x==1) { $tipo_documento=$campo[$x];}
    if ($x==2) { $Nombre1=$campo[$x];}
    if ($x==3) { $Nombre2=$campo[$x];}
    if ($x==4) { $Apellido1=$campo[$x];}
    if ($x==5) { $Apellido2=$campo[$x];}
    if ($x==6) { $ficha=$campo[$x];}
    if ($x==7) { $fnacimiento=$campo[$x];}
    if ($x==8) { $email=$campo[$x];}
    if ($x==9) { $Tel=$campo[$x];}
    if ($x==10) { $Dir=$campo[$x];}
    if ($x==11) { $Rol=$campo[$x];}
    // echo $campo[$x];

}
     echo "NumDoc ".$IdPersona." Nom1 ".$Nombre1." Nom2 ".$Nombre2." Ape1 ".$Apellido1." Ape2 ".$Apellido2." fn ".$fnacimiento." tel ".$Tel." email ".$email." dir ".$Dir." tipodoc ".$tipo_documento." adm ".$Administrador." rol ".$Rol." ficha ".$ficha;
$ver=$consultar->fCrearPersona($IdPersona,$Nombre1,$Nombre2,$Apellido1,$Apellido2,$fnacimiento,$Tel,$email,$Dir,$tipo_documento,$Administrador,$Rol,$ficha);
}

// echo "aqui toy";

// print_r($archivo);

}
?>
