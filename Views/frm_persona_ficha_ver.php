<?php
//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 05/09/2018
//Version: 1.0.0.0
$idPersona = $_GET['valor'];
$NombreCompleto  = $_GET['valor2'];
require "../Models/leer.php";
$consultar= new ConsultaPersona();
$ver=$consultar->TraePersFichaRolAll($idPersona);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
echo "<h3>Cedula:".$idPersona."</h3>";
echo "<h3>Nombre:".$NombreCompleto."</h3>";


 ?>
 <h3><a href="frm_persona_individual_pl.php">Volver ...</a></h3>
    <table>
      <tr>
        <th>Fichas ligadas a la persona</th>
      </tr>
      <tr>
        <th>Numero de ficha</th>
        <th>Nombre de Programa</th>
        <th>Rol</th>
      </tr>
<?php
foreach ($ver as $value) {
echo "<tr>";
echo    "<td>".$value[0]."</td>";
echo    "<td>".$value[1]."</td>";
echo    "<td>".$value[2]."</td>";
echo "</tr>";
}

 ?>
    </table>
  </body>
</html>
