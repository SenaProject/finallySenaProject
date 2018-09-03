<?php
require "../Models/leer.php";

$consultar1= new ConsultaAnnio();
$ver1=$consultar1->TraeAllAnnio();

$consultar2= new ConsultaTrimestre();
$ver2=$consultar2->TraeAllTrimestre();

$consultar3= new ConsultaFicha();
$ver3=$consultar3->TraeFichaAll();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <label for="lannio">Año:</label>
      <select name="sAnnio">

<?php
echo        "<option value='Nulo'></option>";
foreach ($ver1 as $valor1) {
echo        "<option value='".$valor1[0]."'>".$valor1[1]."</option>";
}
 ?>
      </select>
      <label for="lTrimestre">Trimestre:</label>
      <select name="sTrimestre">
<?php

echo        "<option value='Nulo'></option>";
foreach ($ver2 as $valor2) {
echo        "<option value='".$valor2[0]."'>".$valor2[1]."</option>";
}
 ?>
      </select>
      <label for="lFicha">Ficha:</label>
      <select name="sFicha">
<?php

echo        "<option value='Nulo'></option>";
foreach ($ver3 as $valor3) {
echo        "<option value='".$valor3[0]."'>".$valor3[1]."</option>";
}
 ?>
      </select>
    </form>
  </body>
</html>
