<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>ASIGNACION DE FICHA</h1>
    <form class="" action="../Controllers/valida_ficha.php?valor=asignaficha" method="POST">
      Persona:
      <?php
      require "../Models/leer.php";
      $consultar= new ConsultaPersona();
      $ver=$consultar->TraeAllPersona();
        echo "				<select name='vPersona' required = 'required'>";
        echo "            <option value='Nulo' ></option>";
            				        foreach ($ver as $valor) {
        echo "            <option value='".$valor[0]."'>".$valor[0]." - ".$valor[1]."</option>";
                                 }
        echo "				</select>";
        echo "<br/>";
        $consultar1= new ConsultaRoles();
        $ver1=$consultar1->TraeAllRoles();
        echo "Rol";
        echo "				<select name='vRol' required = 'required'>";
        echo "            <option value='Nulo' ></option>";
            				        foreach ($ver1 as $valor1) {
        echo "            <option value='".$valor1[0]."'>".$valor1[0]." - ".$valor1[1]."</option>";
                                 }
        echo "				</select>";




       ?>
       <br>

      Ficha:
<?php
        $consultar2= new ConsultaFicha();
        $ver2=$consultar2->TraeFichaAll();

        echo "				<select name='vFicha' required = 'required'>";
        echo "            <option value='Nulo' ></option>";
      				        foreach ($ver2 as $valor2) {
        echo "            <option value='".$valor2[0]."'>".$valor2[0]." - ".$valor2[1]."</option>";
                           }
        echo "				</select>";
 ?>
 <br>
      <input type="submit" name="btnExecute" value="Aplicar">
    </form>


  </body>
</html>
