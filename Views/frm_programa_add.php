<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h2>Nuevo Programa</h2>
<form class="" action="../Controllers/valida_Programa.php?valor='crear'" method="post">
  <?php

  echo "Nombre del Programa:";
  echo "  <input type='text' name='nombre_programa' value=''> <br>";
  echo "Estado:";
  echo "  <input type='text' name='estado_programa' value=''> <br>";
  echo "<br><br>";
  echo "  <input type='submit' name='BtnGuardar' value='Guardar'>";
  echo "  <input type='reset' name='BtnLimpiar' value='Borrar'>";

   ?>
</form>
<h2><a href="frm_programa.php">Volver ...</a></h2>

  </body>
</html>
