<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="frm_formulario_detalle.php?valor=detalle" method="post">
    <label for="lFicha">Formulario: </label>
    <select name="sFicha">
      Formulario No.:
      <!-- lista desplega con los formularios activos
      Consulta_x_Form
      target='iframe_dte'
      -->
      <?php
      require_once "../Models/leer.php";

      $consultar= new ConsultarFormulario();
      $ver=$consultar->ConsultaFormM();

      echo        "<option value='Nulo'></option>";
      foreach ($ver as $valor) {
      echo        "<option value='".$valor[0]."'>".$valor[0]." - ".$valor[1]."</option>";
      }
      ?>

    </select>
    <input type="submit" name="BtnTraer" value="Recargar">
    </form>
    <?php
    // print_r($_GET['valor']);
// if (isset($_GET['valor']=="Nulo")) {
//   echo "por aqui paso";
// }
// elseif ($_GET['valor']=='detalle') {
//
//
//
// echo "<table border=4>";
// echo "  <tr>";
// echo "    <th>Numero Pregunta</th>";
// echo "    <th>Pregunta</th>";
// echo "  </tr>";
// echo "  <tr>";
// echo "    <td></td>";
// echo "    <td></td>";
// echo "  </tr>";
// echo "</table>";
// }
     ?>
    <!-- <div class="">
      <iframe height="400px" width="95%" src="" name="iframe_dte"></iframe>
    </div> -->
  </body>
</html>
