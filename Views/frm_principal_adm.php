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
  echo				"<li><a href='frm_cerrar.php'>Salida</a>";
  echo        "</li>";
  echo			"</ul>";
  echo		"</li>";
  echo		"<li><a>Crear</a>";
  echo      "<ul>";
  echo        "<li><a target='iframe_a'>Persona</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_persona_individual_pl.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a href='frm_persona_masivo.php' target='iframe_a'>Masivo</a></li>";
  echo            "<li><a target='iframe_a'>Asigna ficha </a>";
  echo          "<ul>";
  echo    				"<li><a href='frm_ficha_asigna.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a href='frm_ficha_asigna_m.php' target='iframe_a'>Masivo</a></li>";
  echo    			"</ul>";
  echo    			"</li>";
  echo          "</ul>";
  echo        "</li>";
  echo       "<li><a>Programa</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_programa.php' target='iframe_a'>Uno a Uno</a></li>";
  echo            "<li><a href='frm_programa_masivo.php' target='iframe_a'>Masivo</a></li>";
  echo          "</ul>";
  echo       "</li>";
  echo       "<li><a>Curso</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_curso_ver.php' target='iframe_a'>Consultar</a></li>";
  echo            "<li><a href='' target='iframe_a'>Asignar</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_curso_asignar_ins.php' target='iframe_a'>Instructor</a></li>";
  echo            "<li><a href='frm_curso_asignar_ficha.php' target='iframe_a'>Ficha</a></li>";
  echo          "</ul>";
  echo       "</li>";
  echo            "<li><a href='frm_curso_quitar.php' target='iframe_a'>Desasignar</a>";
  echo          "<ul>";
  echo            "<li><a href='frm_curso_quitar_ins.php' target='iframe_a'>Instructor</a></li>";
  echo            "<li><a href='frm_curso_quitar_ficha.php' target='iframe_a'>Ficha</a></li>";
  echo          "</ul>";
  echo            "</li>";
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
  echo		"<li><a>Evaluacion</a>";
  echo      "<ul>";
  echo        "<li><a href='frm_aplicar_encuesta.php' target='iframe_a'>Evaluar</a></li>";
  echo        "<li><a href='frm_evaluar_adm.php' target='iframe_a'>Administrar</a>";
  echo        "</li>";
  echo        "<li><a href='frm_formulario_maestro.php' target='iframe_a'>Formulario</a></li>";
  echo      "</ul>";
  echo    "</li>";
  echo		"<li><a>Reportes</a>";
  echo      "<ul>";
  echo        "<li><a target='iframe_a'>uno</li>";
  echo        "<li><a target='iframe_a'>dos</li>";
  echo      "</ul>";
  echo    "</li>";
  echo		"<li><a>Administracion</a>";
  echo      "<ul>";
  echo        "<li><a target='iframe_a'>Cambio de contraseña</li>";
  echo        "<li><a target='iframe_a'>Rol</li>";
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
