<?php

//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 03/09/2018
//Version: 1.0.0.0

require "../Models/leer.php";

$consultar1= new ConsultaAnnio();
$ver1=$consultar1->TraeAllAnnio();

$consultar2= new ConsultaTrimestre();
$ver2=$consultar2->TraeAllTrimestre();

$consultar3= new ConsultaPrograma();
$ver3=$consultar3->TraeAllPrograma();

$consultar4= new ConsultaFicha();
$ver4=$consultar4->TraeFichaAll();

$consultar5= new ConsultaPersona();
$ver5=$consultar5->TraeAllInstructor();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>

  </head>
  <body>
    <h1>ASIGNACION DE FICHA</h1>

    <form class="" action="../Controllers/validar_curso.php?valor=asignarficha" method="POST">
      <label for="lannio">Año:</label>
      <select name="sAnnio">

<?php
echo        "<option value='Nulo'></option>";
foreach ($ver1 as $valor1) {
echo        "<option value='".$valor1[0]."'>".$valor1[1]."</option>";
}
 ?>
      </select>
      <br>
      <br>
      <label for="lTrimestre">Trimestre:</label>
      <select name="sTrimestre">
<?php

echo        "<option value='Nulo'></option>";
foreach ($ver2 as $valor2) {
echo        "<option value='".$valor2[0]."'>".$valor2[1]."</option>";
}
 ?>
      </select>
      <br>
      <br>
<?php
 ?>
      </select>
      <label for="lFicha">Ficha:</label>
      <select name="sFicha">
<?php

echo        "<option value='Nulo'></option>";
foreach ($ver4 as $valor4) {
echo        "<option value='".$valor4[0]."'>".$valor4[0]." - ".$valor4[1]."</option>";
}
 ?>

      </select>
      <br>
      <br>
      <br>
      <input type="submit" name="BtnGuardar" value="Guardar">
    </form>
  </body>
</html>
