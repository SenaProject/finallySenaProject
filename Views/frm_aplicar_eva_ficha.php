<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php

    require_once "../Models/leer.php";
    // print_r($UsuarioApp);
    // $IdPersona = USUARIO;
    $UserApp = $_GET['valor'];

    $cFicha= new ConsultaAplicarEvaluacion();
    $vFicha=$cFicha->fTraeInfoEva($UserApp, 0, 0, 0, 0);
    ?>
  </head>
  <body>
      <h1>Aplicar Evaluacion [Ficha]</h1>
      <br>
        <form class="" action="frm_aplicar_eva_annio.php" method="POST">
           Usuario:
           <input type="text" name="usuario" value=<?php echo $UserApp; ?>>
           <br>
           Ficha:
           <select id="SelectFicha" name ="SelectFicha">
             <option value='0'></option>
             <?php
                 foreach ($vFicha as $vFichaInt) {
                     echo "<option value='".$vFichaInt[0]."'>".$vFichaInt[0]."</option>";
                 }
              ?>
             </select>
             <br>
           <input type="submit" name="btnSig" value="Siguiente ...">
    </form>
  </body>
</html>
