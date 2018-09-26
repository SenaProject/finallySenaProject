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
    $consultar1= new ConsultarCurso();
    $ver1=$consultar1->ConsultarAnnioCursoAll();
    $consultar2= new ConsultaParametros();
    $IdEvaluacion = $_GET['valor'];
echo "<form class='' action='frm_evaluacion_detalle2.php?valor=".$IdEvaluacion."' method='POST'>";
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
      <select required class='' name='ListaForm' >
      <option value='' >Seleccione ...</option>
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
      Año
    </td>
    <td>
      <select required class='' name='lannio'>
      <option value='' >Seleccione ...</option>
<?php
      foreach ($ver1 as $value1) {
        echo "<option value='".$value1[0]."' >".$value1[1]."</option>";
              }
?>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type='submit' name='BtnGuardar' value='Guardar'>
      <input type='reset' name='BtnCancelar' value='Cancelar'>
    </td>
  </tr>
</table>
<br>
<br>
</form>
  </body>
</html>
