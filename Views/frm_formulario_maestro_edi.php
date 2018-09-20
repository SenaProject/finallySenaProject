<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>
      <b>Encabezado de formulario</b>
    </h1>
    <?php
        require "../Models/leer.php";
        $IdFormulario = $_GET['valor'];
        $consultar= new ConsultarFormularioM();
        $ver=$consultar->TraeFormularioM($IdFormulario);
        echo "Id formulario: ".$IdFormulario;
        echo "<form class='' action='../Controllers/validar_formulario.php?valor=guardamaestro&IdForm=".$IdFormulario."' method='POST'>";
     ?>

        Nombre del formulario:
        <?php

          echo "<input type='text' name='vNomFrm' value='".$ver[1]."' size='50'>";
        ?>

        <br><br>
        <input type="submit" name="BtnGuardar" value="Guardar">
        <input type="reset" name="BtnCancelar" value="Cancelar">
      </form>
      <h3><a href='frm_formulario_maestro.php'> volver </a></h3><br>
  </body>
</html>
