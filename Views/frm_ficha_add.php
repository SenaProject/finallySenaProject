<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once "../Models/leer.php";
    $consultar= new ConsultaPrograma();
    $ver=$consultar->TraeAllPrograma();

    $consultar1= new ConsultaParametros();
    $ver1=$consultar1->TraeParametros(0,'jornada');

     ?>
    <h1>Creacion de Ficha</h1>
    <br>
    <br>
    <form class="" action="../Controllers/valida_ficha.php?valor=nuevaficha" method="POST">
      Ficha No. :<input type="number" name="vficha" value="">
      <br>
      <br>
      Programa  :
      <?php
      echo "<select class='' name='lprograma'>";
      echo "<option value='Nulo' ></option>";
      foreach ($ver as $value) {
      echo "<option value='".$value[0]."' >".$value[1]."</option>";
      }
      echo "</select>";
       ?>
      <br><br>
      Fecha inicial: <input type="date" name="vfecini" value="">
      <br><br>
      Fecha final: <input type="date" name="vfecfin" value="">
      <br><br>
      Jornada:
      <?php
      echo "<select class='' name='ljornada'>";
      echo "<option value='Nulo' ></option>";
      foreach ($ver1 as $value1) {
      echo "<option value='".$value1[0]."' >".$value1[1]."</option>";
      }
      echo "</select>";
       ?>
       <br><br>
      <input type="submit" name="btnGuardar" value="Guardar">
      <input type="reset" name="btnCancelar" value="Cancelar">
    </form>
  </body>
</html>
