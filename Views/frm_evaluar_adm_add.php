<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>
      <b>Evaluacion</b>
    </h1>
      <form class="" action="../Controllers/validar_evaluacion.php?valor=nuevaeva" method="POST">
        Fecha Inicial: <input type="date" name="fini" value="" size="50">
        <br><br>
        Fecha Final: <input type="date" name="ffin" value="" size="50">
        <br><br>
        <input type="submit" name="BtnGuardar" value="Guardar">
        <input type="reset" name="BtnCancelar" value="Cancelar">
        <br><br>
      </form>
      <h3><a href='frm_evaluar_adm.php'> volver </a></h3><br>
  </body>
</html>
