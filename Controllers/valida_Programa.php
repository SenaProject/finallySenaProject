<?php

$seguro = $_GET['actualiza'];
if ($seguro =='actualiza') {
$IdPrograma = $_POST['idprg'];
$NombrePrograma = $_POST['nomprg'];

require "../Models/actualizar.php";

$consultar= new ModificarPrograma();
$ver=$consultar->fModificaPrograma($NombrePrograma, $IdPrograma);

echo "
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title></title>
  </head>
  <body>
    <h2>REGISTRO ACTUALIZADO</h2>
  </body>
</html>
";
// code...
}
?>
