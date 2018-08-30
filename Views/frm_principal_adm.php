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
	echo "<nav>";
	echo "<ul>";
	echo	"<li><a>Archivo</a>";
	echo		"<ul>";
  echo				"<li><a></a></li>";
  echo				"<li><a></a></li>";
  echo				"<li><a></a></li>";
  echo				"<li><a href='frm_cerrar.php'>Salida</a></li>";
  echo			"</ul>";
  echo		"</li>";
  echo		"<li><a>Crear</a>";
  echo      "<ul>";

  echo        "<li><a target='iframe_a'>Persona</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_persona_individual_pl.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a href='frm_en_blanco.php' target='iframe_a'>Asigna ficha </a></li>";
  echo            "<li><a href='frm_persona_masivo.php' target='iframe_a'>Masivo</a></li>";
  echo          "</ul>";
  echo        "</li>";

  echo       "<li><a target='iframe_a'>Programa</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_programa.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a href='' target='iframe_a'>Masivo</a></li>";
  echo          "</ul>";
  echo       "</li>";

  echo       "<li><a target='iframe_a'>Curso</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_en_blanco.php' target='iframe_a'>Crear Curso</a></li>";

  echo          "</ul>";
  echo       "</li>";

  echo       "<li><a target='iframe_a'>Ficha</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_ficha.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a href='' target='iframe_a'>Masivo</a></li>";
  echo          "</ul>";
  echo       "</li>";

  echo        "<li><a>Grupo Preguntas</a>";
  echo          "<ul>";
  echo    				"<li><a href='frm_grupo_pregunta.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a target='iframe_a'>Masivo</a></li>";
  echo    			"</ul>";
  echo        "</li>";
  echo        "<li><a>Banco de respuestas</a>";
  echo          "<ul>";
  echo    				"<li><a href='frm_Ban_Respuestas.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a target='iframe_a'>Masivo</a></li>";
  echo    			"</ul>";
  echo        "</li>";
  echo    "</li>";
  echo        "<li><a>Banco de preguntas</a>";
  echo          "<ul>";
  echo    				"<li><a href='frm_banco_preguntas.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a target='iframe_a'>Masivo</a></li>";
  echo    			"</ul>";
  echo        "</li>";
  echo      "</ul>";
  echo		"<li><a>Encuesta</a>";
  echo      "<ul>";
  echo        "<li><a href='frm_crear_encuesta.php' target='iframe_a'>Crear</a></li>";
  echo        "<li><a href='frm_listar_encuestas.php' target='iframe_a'>Listar</a></li>";
  echo        "<li><a href='frm_aplicar_encuesta.php' target='iframe_a'>Aplicar </a></li>";
  echo      "</ul>";
  echo    "</li>";
  echo		"<li><a>Administracion</a>";
  echo      "<ul>";
  echo        "<li><a target='iframe_a'>Cambio de contraseña</li>";
  echo        "<li><a target='iframe_a'>Creacion de Usuarios</li>";
  echo        "<li><a target='iframe_a'>Creacion de roles</li>";
  echo      "</ul>";
  echo    "</li>";
  echo	"</ul>";
  echo	"</nav>";
  echo "<nav>";

 ?>
	<div class="">
		<iframe height="500px" width="100%" src="" name="iframe_a"></iframe>
	</div>
   <!--<iframe height="300px" width="100%" name= "iframe_b" src="Frm_Ban_Respuestas.html" style="border:none;"></iframe>-->
  </body>
</html>
