<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/programaCrear.css">
  </head>
  <body>
<h2>Nuevo Programa</h2>
<form class="" action="../Controllers/valida_Programa.php?valor='crear'" method="post">
  <div class="content_program">
   <div class="subcontent_program">
     <?php

     echo "<div class='title_programa'>Nombre del Programa: </div>";
     echo "<div class='field_program'>  <input  type='text' name='nombre_programa' value=''> </div>";
     echo "<div class='title_programa'>Estado:</div>";
     echo " <div class='field_program'> <input type='text' name='estado_programa' value=''> </div>";
     echo "<br><br>";
     echo " <div class='button_guardar'> <input type='submit' name='BtnGuardar' value='Guardar'></div>";
     echo "  <div class='button_reset'><input type='reset' name='BtnLimpiar' value='Borrar'></div>";

      ?>
     </form>
   </div>

  </div>


<h2><a href="frm_programa.php">Volver ...</a></h2>

  </body>
</html>
