
<?php
$seguro = $_GET['valor'];
 print_r($seguro);
// print_r($_GET['valor']);
if ($seguro =="'actualiza'") {
$IdPrograma = $_POST['idprg'];
$NombrePrograma = $_POST['nomprg'];

// print_r('por aqui');


require "../Models/actualizar.php";

$consultar= new ModificarPrograma();
$ver=$consultar->fModificaPrograma($NombrePrograma, $IdPrograma);

echo "<!DOCTYPE html>";
echo "<html lang='en' dir='ltr'>";
echo "  <head>";
echo "    <meta charset='utf-8'>";
echo "    <title></title>";
echo "  </head>";
echo "  <body>";
echo "    <h2>REGISTRO ACTUALIZADO</h2>";
echo "<a href='../Views/frm_programa.php'>ir a Programa</a>";
echo "  </body>";
echo "</html>";
// code...
}

if ($seguro =="'crear'") {

$NombrePrograma = $_POST['nombre_programa'];
$estado = $_POST['estado_programa'];
// print_r('por aqui');


require "../Models/crear.php";

$consultar= new CrearPrograma();
$ver=$consultar->CreaPrograma($NombrePrograma, $estado);

echo "<!DOCTYPE html>";
echo "<html lang='en' dir='ltr'>";
echo "  <head>";
echo "    <meta charset='utf-8'>";
echo "    <title></title>";
echo "  </head>";
echo "  <body>";
echo "    <h2>REGISTRO ACTUALIZADO</h2>";
echo "<a href='../Views/frm_programa.php'>ir a Programa</a>";
echo "  </body>";
echo "</html>";
// code...
}
// class BorrarPrograma(){
//   function BorrarPrograma(){
//
//   }
//   public function Borrar($nombre_programa, $estado_programa){
//
//   }
// }
if ($seguro =="borrar") {
  require "../Models/borrar.php";
  $idprograma = $_GET['id_prg'];
  $consultar= new BorrarPrograma();
  $ver=$consultar->BorraPrograma($idprograma);
  echo "<!DOCTYPE html>";
  echo "<html lang='en' dir='ltr'>";
  echo "  <head>";
  echo "    <meta charset='utf-8'>";
  echo "    <title></title>";
  echo "  </head>";
  echo "  <body>";
  echo "    <h2>REGISTRO ELIMINADO</h2>";
  echo "<a href='../Views/frm_programa.php'>ir a Programa</a>";
  echo "  </body>";
  echo "</html>";
}
?>
