<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require_once "../Models/borrar.php";
      $cQuiDetEva= new QuitarDetalleEvaluacion();

      $IdEvaluacion = $_GET['IdFormulario'];
      $vQuiDetEva=$cQuiDetEva->fQuitarDetalleEvaluacion($IdEvaluacion);

     ?>
     <h1>
       <p>Proceso realizado se elimino el detalle de la evaluacion no. <?php echo $IdEvaluacion; ?></p>
     </h1>
  </body>
</html>
