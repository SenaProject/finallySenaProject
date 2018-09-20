<?php
require "../Models/leer.php";

$consultar= new ConsultaPersona();
$ver=$consultar->TraeAllPersona();
// var_dump ($ver);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/frm_persona_individual_pl.css">
    <title>Listado de Personas</title>
<body>
        <h2>Personas</h2>
        <br>
        <br>
        <br>
        <h3><a href="frm_persona_individual_add.php">Adicionar nuevo registro</a></h3>
        <br>
        <br>
        <br>
    <table >
      <tr>
        <th><a>Id de la persona</a></th>
        <th><a>Nombre Completo</a></th>
        <th><a>Correo Electronico</a></th>
        <th><a>Fichas</a></th>
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
echo        "<td><a href='frm_persona_ficha_ver.php?valor=".$value[0]."&&valor2=".$value[1]."'>Fichas</a></td>";
echo        "<td><a href='frm_persona_individual_edi.php?valor=".$value[0]."'>Editar</a></td>";
echo        "<td><a href='../Controllers/valida_persona_ind.php?valor=BorrarPersona&IdPersona=".$value[0]."'>Eliminar</a></td>";  // AQUI VOY
echo "</tr>";
}

         ?>
    </table>
  </head>
  </body>
</html>
