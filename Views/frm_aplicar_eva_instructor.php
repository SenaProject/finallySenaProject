<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <?php

    require_once "../Models/leer.php";
    // print_r($UsuarioApp);
    // $IdPersona = USUARIO;
    $UserApp = $_POST['usuario'];
    $vFicha = $_POST['tFicha'];
    $vAnnio = $_POST['tAnnio'];
    $vTrimestre = $_POST['SelectTrimestre'];
    $cInstructor= new ConsultaAplicarEvaluacion();
    $vInstructor=$cInstructor->fTraeInfoEva($UserApp, $vFicha, $vAnnio, $vTrimestre, 0, 4);
    ?>
  </head>
  <body>

      <h1>Aplicar Evaluacion [Instructor]</h1>
          <form class="" action="frm_aplicar_eva_evaluacion.php" method="POST">
           <br>
             Usuario:
            <input type="text" name="usuario" value=<?php echo $UserApp; ?> readonly>
            <br>
             Ficha:
            <input type="text" name="tFicha" value=<?php echo $vFicha; ?> readonly>
            <br>
            Año:
            <input type="text" name="tAnnio" value=<?php echo $vAnnio; ?> readonly>
            <br>
            Trimestre:
            <input type="text" name="tTrimestre" value=<?php echo $vTrimestre; ?> readonly>
            <br>
            Instructor:
             <select id="SelectInstructor" name = "SelectInstructor">
               <option value='0'></option>
               <?php
                 foreach ($vInstructor as $vInstructorInt) {
                     echo "<option value='".$vInstructorInt[0]."'>".$vInstructorInt[1]."</option>";
                 }
                ?>
             </select>
             <br>
           <input type="submit" name="btnSig" value="Siguiente ...">
    </form>
  </body>
</html>
