<?php
require "../Models/leer.php";

$consultar= new ConsultaPregunta();
$ver=$consultar->TraePregunta();
// var_dump ($ver);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/frm_persona_individual_pl.css">
    <title>Banco Preguntas</title>
<body>
        <h2>Banco Preguntas</h2>
        <br>
        <br>
        <br>
        <a href="frm_banco_preguntas_add.php">Adicionar nuevo registro</a>
        <br>
        <br>
        <br>
    <table >
      <tr>
        <th><a>Id pregunta</a></th>
        <th><a>Descripcion</a></th>
        <th><a>Grupo Preguntas</a></th>
        <th><a>Edicion</a></th>
        <th><a>Eliminacion</a></th>
      </tr>
      <tr>
        <?php
foreach ($ver as $value) {
  // code...
  // var_dump ($value);
echo        "<td><a>".$value[0]."</a></td>";
echo        "<td><a>".$value[1]."</a></td>";
echo        "<td><a>".$value[2]."</a></td>";
echo        "<td><a href='frm_banco_preguntas_edi.php?valor=".$value[0]."'>Editar</a></td>";
echo        "<td><a href='#'>Eliminar</a></td>";
echo "</tr>";
}

         ?>
    </table>
  </head>
  </body>
</html>
