<?php
require "../Models/leer.php";

$consultar= new ConsultarFormularioM();
$ver=$consultar->TraeFormularioMall();
// var_dump ($ver);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/frm_persona_individual_pl.css">
    <title>Listado de Personas</title>
<body>
        <h1>Formulario</h1>
        <br>
        <br>
        <br>
        <h3><a href="frm_formulario_maestro_add.php?valor=nuevomaestro">Adicionar nuevo registro</a></h3>
        <br>
        <br>
        <br>
    <table >
      <tr>
        <th><a>Id de formulario</a></th>
        <th><a>Descripcion</a></th>
        <th><a>Detalle</a></th>
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
          echo        "<td><a href='frm_formulario_detalle.php?valor=".$value[0]."'>Detalle de: ".$value[1]."</a></td>";
          echo        "<td><a href='frm_formulario_maestro_edi.php?valor=".$value[0]."'>Editar</a></td>";
          echo        "<td><a href='../Controllers/valida_formulario.php?valor=BorrarMaestro&IdFormulario=".$value[0]."'>Eliminar</a></td>";  // AQUI VOY
          echo "</tr>";
}
         ?>
    </table>
  </head>
  </body>
</html>
