<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Generacion de Reporte por evaluacion</h1>

    <form class="" action="rte_por_evaluacion.php" method="post">
        <label for="">Evaluacion No.</label>
        <select id="SelectEvaluacion" name ="SelectEvaluacion">
          <option value='0'></option>
          <?php
              require_once "../Models/leerreportes.php";
              $cEvaluacion= new ReporteEvaluacion();
              $vEvaluacion=$cEvaluacion->fReporteEvaluacionM();

              foreach ($vEvaluacion as $vEvaluacionInt) {
                  echo "<option value='".$vEvaluacionInt[0]."'>".$vEvaluacionInt[0]."</option>";
              }
           ?>
          </select>
          <input type="submit" name="btnGenerar" value="Generar ...">
    </form>
  </body>
</html>
