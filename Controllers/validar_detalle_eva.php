<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Procesando!!</h1>
    <?php
    require_once "../Models/crear.php";
    $IdEvaluacion = $_GET['valor'];
    $IdFormulario = $_POST['ListaForm'];
    $ListaHumano = $_POST['ListaHumano'];
    // echo $IdEvaluacion;
    // echo $IdFormulario;
    // echo $ListaHumano;
    if ($IdFormulario !== 'Nulo') {
      if ($ListaHumano == 1) {

        // $consultar= new CrearEvaluacionDetalle();
        // $ver=$consultar->fCrearEvaDetAll($IdEvaluacion, $IdFormulario, $IdPregunta, $IdInstructor, $IdAprendiz, $Estado);
        echo "Todos los Aprendices todos los instructores";
      } elseif ($ListaHumano == 2) {
        echo "Por un programa en especial";
      } elseif ($ListaHumano == 3) {
        echo "Por una ficha en especial";

      } elseif ($ListaHumano == 4) {
        echo "Por una instructor en especial";
      }
    } else {
      echo "Volver por que no se escogio el formulario";
    }
     ?>
  </body>
</html>
