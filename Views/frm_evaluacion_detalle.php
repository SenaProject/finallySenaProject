<!-- SELECT id_evaluacion_detalle, id_evaluacion, id_formulario, id_pregunta,
       id_instructor, id_aprendiz, estado, respuesta
  FROM public.evaluacion_detalle; -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Asignacion de detalle de evaluación</h1>


    <?php
    require_once "../Models/leer.php";
    $consultar= new ConsultarFormularioM();
    $ver=$consultar->TraeFormularioMall();
    $consultar1= new ConsultaParametros();
    $ver1=$consultar1->TraeParametros(0,'annio');
    $consultar2= new ConsultaParametros();
    $ver2=$consultar2->TraeParametros(0,'trimestre');

      $IdEvaluacion = $_GET['valor'];
      echo "<form class='' action='../Controllers/validar_detalle_eva.php?valor=".$IdEvaluacion."' method='POST'>";
      echo "<table>";
      echo "<tr>";
      echo "<td>";
      echo "Evaluacion No.: ";
      echo "</td>";
      echo "<td>";
      echo $IdEvaluacion;
      echo "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>";
      echo "Formulario a asignar: ";
      echo "</td>";
      echo "<td>";
      // echo $IdEvaluacion;
      echo "<select class='' name='ListaForm'>";
        echo "<option value='Nulo' ></option>";
      foreach ($ver as $value) {
        echo "<option value='".$value[0]."' >".$value[1]."</option>";
              }
      echo "</select>";
      echo "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>";
      echo "Año";
      echo "</td>";
      echo "<td>";
      echo "<select class='' name='lannio'>";
        echo "<option value='Nulo' ></option>";
      foreach ($ver1 as $value1) {
        echo "<option value='".$value1[0]."' >".$value1[1]."</option>";
              }
      echo "</select>";
      echo "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>";
      echo "Trimestre: ";
      echo "</td>";
      echo "<td>";
      echo "<select class='' name='lannio'>";
        echo "<option value='Nulo' ></option>";
      foreach ($ver2 as $value2) {
        echo "<option value='".$value2[0]."' >".$value2[1]."</option>";
              }
      echo "</select>";
      echo "</td>";
      echo "</tr>";



      echo "<tr>";
      echo "<td>";
      echo "Seleccione a cual grupo humano va a aplicarsele la evaluacion";
      echo "</td>";
      echo "<td>";
      echo "<select class='' name='ListaHumano'>";
      echo "<option value='0' >Seleccione ...</option>";
      echo "<option value='1' >Todos</option>";
      echo "<option value='2' >Por Programa</option>";
      echo "<option value='3' >Por Ficha</option>";
      echo "<option value='4' >Por Instructor</option>";
      echo "</select>";
      echo "</td>";
      echo "</tr>";



      echo "</table>";


      // echo "<h3>Seleccione el formulario a asignar</h3>";
      echo "<br>";


      echo "<br>";

      // echo "id_instructor"."<br>";
      // echo "id_aprendiz"."<br>";
      echo "<input type='submit' name='BtnGuardar' value='Guardar'>";
      echo "<input type='reset' name='BtnCancelar' value='Cancelar'>";
      echo "</form>";
     ?>
  </body>
</html>
