<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <?php

    require_once "../Models/leer.php";
    // print_r($UsuarioApp);
    // $IdPersona = USUARIO;
    $UserApp = $_GET['vusuario'];
    $vFicha =  $_GET['vficha'];

    $cAnnio= new ConsultaAplicarEvaluacion();
    $vAnnio=$cAnnio->fTraeInfoEva($UserApp, $vFicha, 0, 0, 0, 1);
    ?>
  </head>
  <body>

      <h1>Aplicar Evaluacion [Año]</h1>
          <form class="" action="../Controllers/validar_evaluacion.php?valor=evaluacionannio" method="POST">
           <br>
             Usuario: <input type="text" name="usuario" value=<?php echo $UserApp; ?> readonly>
             <br>
             Ficha: <input type="text" name="tFicha" value=<?php echo $vFicha; ?> readonly>
            <br>
             Año:
             <select id="Selectannio" name = "Selectannio">
               <option value='0'></option>
               <?php
                 foreach ($vAnnio as $vAnnioInt) {
                     echo "<option value='".$vAnnioInt[0]."'>".$vAnnioInt[1]."</option>";
                 }
                ?>
             </select>
             <br>
           <input type="submit" name="btnSig" value="Siguiente ...">
    </form>
  </body>
</html>
