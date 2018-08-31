<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<?php
require "../Models/leer.php";

$consultar= new ConsultaPrograma();
$ver=$consultar->TraePrograma($_GET['id_prg']);

 ?>
  <body>
    <h1>Edicion de Programa</h1>
    <form class="" action="../Controllers/valida_Programa.php?valor='actualiza'" method="post">

<?php
echo "Id del programa:";
echo        "<input type='text' name='idprg' value='".$ver[0]."'>";
echo "<br><br>";
echo "Descripcion:";
echo        "<input type='text' name='nomprg' value='".$ver[1]."'>";
 ?>
        <br>
        <input type="submit" name="" value="Guardar">
    </form>
  </body>
</html>
