<?php
require "../Models/leer.php";

$consultar= new ConsultaGrupoPregunta();
$ver=$consultar->TraeGrupoPregunta();
// var_dump ($ver);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/frm_persona_individual_pl.css">
    <title>Grupo de Preguntas</title>
<body>
        <h2>Grupo de Preguntas</h2>
        <br>
        <br>
        <br>
        <a href="frm_grupo_preguntas_add.php">Adicionar nuevo registro</a>
        <br>
        <br>
        <br>
    <table >
      <tr>
        <th><a>Id Grupo</a></th>
        <th><a>Descripcion</a></th>
        <!-- <th><a>Correo Electronico</a></th> -->
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
// echo        "<td><a>".$value[2]."</a></td>";
echo        "<td><a href='#'>Editar</a></td>";
echo        "<td><a href='#'>Eliminar</a></td>";
echo "</tr>";
}

         ?>
    </table>
  </head>
  </body>
</html>
