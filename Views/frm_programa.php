<?php
require "../Models/leer.php";

$consultar= new ConsultaPrograma();
$ver=$consultar->TraeAllPrograma();
// var_dump ($ver);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/frm_persona_individual_pl.css">
    <title>Programas</title>
<body>
        <h2>PROGRAMAS</h2>
        <br>
        <br>
        <br>
        <a href="frm_programa_add.php">Adicionar nuevo registro</a>
        <br>
        <br>
        <br>
    <table >
      <tr>
        <th><a>Id Programa</a></th>
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
// echo        "<td><a>".$value[2]."</a></td>";  href=""
echo        "<td><a href='frm_programa_edi.php?id_prg=".$value[0]."'>Editar</a></td>";
echo        "<td><a href='../Controllers/valida_programa.php?valor=borrar&id_prg=".$value[0]."'>Eliminar</a></td>";
echo "</tr>";
}

         ?>
    </table>
  </head>
  </body>
</html>
