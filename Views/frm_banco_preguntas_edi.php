<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="">


    Pregunta No.:
    <?php
    $pregunta=$_GET['valor'];
    echo $pregunta;
    ?>
    </div>
    <div class="">
    Grupo:
    <select id="SelectInstructor" name = "SelectInstructor">
      <option value='0'></option>
      <?php
        foreach ($vInstructor as $vInstructorInt) {
            echo "<option value='".$vInstructorInt[0]."'>".$vInstructorInt[1]."</option>";
        }
       ?>
    </select>
  </div>
  <div class="">
    Pregunta:
    <?php

     ?>
   </div>
   <div class="">
     Grupo respuesta:
     <select id="SelectInstructor" name = "SelectInstructor">
       <option value='0'></option>
       <?php
         foreach ($vInstructor as $vInstructorInt) {
             echo "<option value='".$vInstructorInt[0]."'>".$vInstructorInt[1]."</option>";
         }
        ?>
     </select>
   </div>     
  </body>
</html>
