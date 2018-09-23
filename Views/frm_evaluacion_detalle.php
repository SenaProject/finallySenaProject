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


echo "<form class='' action='frm_evaluacion_detalle.php?valor=$IdEvaluacion' method='POST'>";
?>

<table>
  <tr>
    <td>
      Evaluacion No.:
    </td>
    <td>
<?php
echo $IdEvaluacion;
?>
    </td>
  </tr>
  <tr>
    <td>
        Formulario a asignar:
    </td>
    <td>
      <select class='' name='ListaForm'>
      <option value='Nulo' ></option>
<?php
      foreach ($ver as $value) {
        echo "<option value='".$value[0]."' >".$value[1]."</option>";
              }
?>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      Aplicar evaluacion a:
    </td>
    <td>
      <select class='' name='ListaHumano'>
      <option value='0' >Seleccione ...</option>
<?php
      echo "<option value='1' >Todos</option>";
      echo "<option value='2' >Por Programa</option>";
      echo "<option value='3' >Por Ficha</option>";
      echo "<option value='4' >Por Instructor</option>";
?>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type='submit' name='BtnSiguiente' value='Siguiente..'>
      <input type='reset' name='BtnCancelar' value='Cancelar'>
    </td>
  </tr>
</form>
  <!-- segunda carga -->
<form class='' action='../Controllers/validar_detalle_eva.php?valor=".$IdEvaluacion."' method='POST'>
  <?php


  ?>
  <tr>
    <td>
      Año
    </td>
    <td>
      <select class='' name='lannio'>
      <option value='Nulo' ></option>
<?php
      foreach ($ver1 as $value1) {
        echo "<option value='".$value1[0]."' >".$value1[1]."</option>";
              }
?>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      Trimestre:
    </td>
    <td>
      <select class='' name='lannio'>
      <option value='Nulo' ></option>
<?php
      foreach ($ver2 as $value2) {
        echo "<option value='".$value2[0]."' >".$value2[1]."</option>";
              }
?>
      </select>
    </td>
  </tr>

</table>
<br>
<br>
  <input type='submit' name='BtnGuardar' value='Guardar'>
<input type='reset' name='BtnCancelar' value='Cancelar'>
</form>
  </body>
</html>
