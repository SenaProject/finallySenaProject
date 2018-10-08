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
     ?>
     <div class='title_programa'>Nombre del Programa: </div>
     <div class='field_program'>  <input  type='text' name='nombre_programa' value=''> </div>
     <div class='div_botones'> <input class='button_guardar' type='submit' name='BtnGuardar' value='Guardar'>
     <input class='button_reset' type='reset' name='BtnLimpiar' value='Borrar'></div>
     </form>
   </div>

  </div>


<h2><a href="frm_programa.php">Volver ...</a></h2>

  </body>
</html>
