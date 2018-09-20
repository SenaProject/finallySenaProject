<?php
$IdFormulario = $_GET['valor'];
require_once "../Models/leer.php";

$consultar= new ConsultarFormularioD();
$ver=$consultar->TraeFormularioDall($IdFormulario);
$consultar1= new ConsultarFormularioM();
$ver1=$consultar1->TraeFormularioM($IdFormulario);
$consultar2= new ConsultaPregunta();
$ver2=$consultar2->TraeGrupoPreguntas();

// var_dump ($ver);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/frm_persona_individual_pl.css">
    <title></title>
<body>
        <h1>Formulario detalle</h1>
        <h3><?php echo "Formulario No.: ".$ver1[1]; ?> </h3>
        <br>
        <h3>De cual grupo desea adicionar pregunta </h3>
        <br>


        <?php
        echo "<form class='' action='frm_formulario_detalle_add.php?valor=nuevodetalle&formulario=$IdFormulario' method='POST'>";
            echo "<select class='' name='sGrupoPreguntas' >";
            echo "<option value='0' ></option>";
            foreach ($ver2 as $value2){
            echo "<option value='".$value2[0]."'>".$value2[0]." - ".$value2[1]."</option>";
            }
            echo "</select>";
            echo "<br><br>";
            echo "<input type='submit' name='BtnAdicion' value='Adicionar nuevo registro'>";
        echo "</form>";
            ?>

        <br>
        <br>
        <h3><a href="frm_formulario_maestro.php"> volver </a></h3>
    <table >
      <tr>
        <th><a>Id Grupo</a></th>
        <th><a>Nombre Grupo</a></th>
        <th><a>Id Pregunta</a></th>
        <th><a>Descripcion</a></th>
        <!-- <th><a>Edicion</a></th> -->
        <th><a>Eliminacion</a></th>
      </tr>
      <tr>
        <?php
          foreach ($ver as $value) {
            // code...
            // var_dump ($value);
          echo        "<td><a>".$value[2]."</a></td>";
          echo        "<td><a>".$value[3]."</a></td>";
          echo        "<td><a>".$value[4]."</a></td>";
          echo        "<td><a>".$value[5]."</a></td>";
          // echo        "<td><a href='frm_formulario_maestro_edi.php?valor=".$value[0]."'>Editar</a></td>";
          echo        "<td><a href='../Controllers/valida_formulario.php?valor=BorrarMaestro&IdFormulario=".$value[0]."'>Eliminar</a></td>";  // AQUI VOY
          echo "</tr>";
}
         ?>
    </table>

  </head>
  </body>
</html>
