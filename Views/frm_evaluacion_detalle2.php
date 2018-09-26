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
    $consultar1= new ConsultaParametros();

    $consultar2= new ConsultarCurso();

    $consultar3= new ConsultaParametros();
    $ver3=$consultar3->TraeParametros(0,'listahumano');
    $IdEvaluacion = $_GET['valor'];


        echo "<form class='' action='../Controllers/validar_detalle_eva.php?&valor=".$IdEvaluacion."' method='POST'>";
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
      <?php
        $IdFormulario = $_POST['ListaForm'] ;
        $ver=$consultar->TraeFormularioM($IdFormulario);

        echo "<input type='text' name='ListaForm' value='".$IdFormulario."' readonly>"  ;
        echo "<label for=''>".$ver[1]."</label>";
       ?>

    </td>
  </tr>
  <tr>
    <td>
      Año
    </td>
    <td>
      <?php
        $Annio = $_POST['lannio'];
        // echo $Annio;
        $ver1=$consultar1->TraeParametros($Annio,'');
        echo "<input type='text' name='lannio' value='".$Annio."' readonly>"  ;
        echo "<label for=''>".$ver1[0]."</label>";
       ?>
    </td>
  </tr>
  <tr>
    <td>
      Trimestre:
    </td>
    <td>
      <?php
          $ver2=$consultar2->ConsultarTrimestreCursoAll($Annio);
       ?>

      <select required class='' name='ltrimestre'>
      <option value='' >Seleccione ...</option>
  <?php
      foreach ($ver2 as $value2) {
        echo "<option value='".$value2[0]."' >".$value2[1]."</option>";
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
      <select required class='' name='ListaHumano'>
      <option value='' >Seleccione ...</option>
<?php
      foreach ($ver3 as $value3) {
        echo "<option value='".$value3[0]."' >".$value3[1]."</option>";
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
