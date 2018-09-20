<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $valor=$_GET['valor'];
      if ($valor=='guardamaestro') {
        require_once "../Models/actualizar.php";
        $IdFormulario = $_GET['IdForm'];
        $NomForm = $_POST['vNomFrm'];
        $consultar= new ModificarFormulario();
        $ver=$consultar->fModificarFormulario($IdFormulario, $NomForm);
        echo "<h1>Fue modificado con exito</h1>";
        echo "Id Numero: ".$IdFormulario;
        echo "<br>";
        echo "Nombre Formulario: ".$NomForm;
      }
      if ($valor=='nuevomaestro') {
        require_once "../Models/crear.php";
        $NomForm = $_POST['vNomFrm'];
        $consultar= new CrearFormularioM();
        $ver=$consultar->fCrearFormularioM($NomForm);
        echo "<h1>Fue adicionado con exito</h1>";
        echo "<br>";
        echo "Nombre Formulario: ".$NomForm;
      }


     ?>

  </body>
</html>
