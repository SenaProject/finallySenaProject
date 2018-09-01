<!DOCTYPE html>
<!Autor: Pablo Emilio Garcia>
<!Fecha: 04/06/2018>
<!Version: >


<html lang="en" dir="ltr">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/frm_principal.css">
    <meta charset="utf-8">

    <title>Evaplus +</title>
  </head>
  <body>
<?php
$NomCom = $_GET['valor'];
  echo "<h2>Nombre Usuario:   ".$NomCom."</h2>";
  echo "<nav>";
	echo "<ul>";
	echo	"<li><a>Archivo</a>";
	echo		"<ul>";
  echo				"<li><a></a></li>";
  echo				"<li><a></a></li>";
  echo				"<li><a></a></li>";
  echo				"<li><a>Salida</a></li>";
  echo			"</ul>";
  echo		"</li>";
  echo		"<li><a>Encuesta</a>";
  echo      "<ul>";
  echo        "<li><a href='frm_aplicar_encuesta.php' target='iframe_a'>Aplicar </a></li>";
  echo      "</ul>";
  echo    "</li>";
  echo		"<li><a>Administracion</a>";
  echo      "<ul>";
  echo        "<li><a target='iframe_a'>Cambio de contraseña</li>";
  echo      "</ul>";
  echo    "</li>";
  echo	"</ul>";
  echo	"</nav>";
 ?>
	<div class="">
		<iframe height="500px" width="100%" src="" name="iframe_a"></iframe>
	</div>
   <!--<iframe height="300px" width="100%" name= "iframe_b" src="Frm_Ban_Respuestas.html" style="border:none;"></iframe>-->
  </body>
</html>
