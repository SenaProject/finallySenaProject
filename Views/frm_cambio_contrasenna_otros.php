<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Cambio de contraseña</h1>
    <form class="" action="../Controllers/validar_contrasena.php?valor=cambiopwdotro" method="post">
      <table>
        <tr>
          <td>Usuario Administrador:</td>
          <td><input type="number" name="usuario" value=""></td>
        </tr>
        <tr>
          <td>Contraseña Administrador:</td>
          <td><input type="password" name="aclave" value=""></td>
        </tr>
        <tr>
          <td>Seleccione Usuario:</td>
          <td>

            <select id="SelectPersona" name = "SelectPersona">
              <option value='0'></option>
              <?php
              require_once "../Models/leer.php";
              $cPersona= new ConsultaPersona();
              $vPersona=$cPersona->TraeAllPersona();

                foreach ($vPersona as $vPersonaInt) {
                    echo "<option value='".$vPersonaInt[0]."'>".$vPersonaInt[1]."</option>";
                }
               ?>
            </select>
        </td>
        </tr>

        <tr>
          <td>Nueva Contraseña:</td>
          <td><input type="password" name="nclave" value=""></td>
        </tr>
        <tr>
          <td>Confirme contraseña:</td>
          <td><input type="password" name="rclave" value=""></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="btnCambiarPwd" value="Cambiar contraseña ...">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php
// $valor = $_GET['valor'];
// if ($valor=='ok') {
//
// echo "<h1>Contraseña cambiada con exito</h1>";
//
// }
 ?>
