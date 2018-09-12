<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>ASIGNACION MASIVA DE FICHA</h1>
    <form class="" action="index.html" method="post">
      <?php
      require_once "../Models/leer.php";
      $consultar= new ConsultaRoles();
      $ver=$consultar->TraeAllRoles();

          echo "        <label for='nFichaText'><b>Rol:<b></label>";
          echo "				<select name='vRol' required = 'required'>";
          				               echo "<option value='Nulo' ></option>";
          				        foreach ($ver as $valor) {
                                 echo "<option value='".$valor[0]."'>".$valor[0]." - ".$valor[1]."</option>";
                               }
          echo "				</select>";
        ?>
      <br>
      <input type="file" name="" value="Cargar">
    </form>
  </body>
</html>
