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
    $vAnnio = $_POST['Selectannio'];
    $cTrimestre= new ConsultaAplicarEvaluacion();
    $vTrimestre=$cTrimestre->fTraeInfoEva($UserApp, $vFicha, $vAnnio, 0, 3);
    ?>
  </head>
  <body>

      <h1>Aplicar Evaluacion [Trimestre]</h1>
          <form class="" action="" method="POST">
           <br>
             Usuario:
            <input type="text" name="usuario" value=<?php echo $UserApp; ?>>
            <br>
             Ficha:
            <input type="text" name="tFicha" value=<?php echo $vFicha; ?>>
            <br>
            Año:
            <input type="text" name="tAnnio" value=<?php echo $vAnnio; ?>>
           <br>
             Trimestre:
             <select id="SelectTrimestre">
               <option value='0'></option>
               <?php
                 foreach ($vTrimestre as $vTrimestreInt) {
                     echo "<option value='".$vTrimestreInt[0]."'>".$vTrimestreInt[1]."</option>";
                 }
                ?>
             </select>
             <br>
           <input type="submit" name="btnSig" value="Siguiente ...">
    </form>
  </body>
</html>
