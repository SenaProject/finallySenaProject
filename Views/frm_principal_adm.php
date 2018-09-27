<!DOCTYPE html>
<!Autor: Pablo Emilio Garcia>
<!Fecha: 04/06/2018>
<!Version: >
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/frm_principal.css">
    <meta charset="utf-8">
    <title>Evaplus +</title>
  </head>
  <body>

    <footer>
      <div class="footer_main">
        <img src="image/ima_evaplus.jpg" width="100px" height="50px" alt="">
        <?php
        $User = $_GET['user'];
        $NomCom = $_GET['valor'];
          echo "<div class='title_user'><h2 width='100px' height='50px'>Usuario: ".$User." - ".$NomCom."</h2></div>";
          // print_r($UsuarioApp);
        ?>
      </div>
    <nav class="nav_main">
      <ul>

         <li><a>Archivo</a>
              <ul>
                <li><a></a></li>
                <li><a></a></li>
                <li><a></a></li>
                <li><a href='frm_cerrar.php'>Salida</a></li>
              </ul>
          </li>
          <li><a>Crear</a>
            <ul>
              <li><a target='iframe_a'>Persona</a>
                <ul>
                  <li><a href='frm_persona_individual_pl.php' target='iframe_a'>Uno a Uno</a></li>
                  <li><a href='frm_persona_masivo.php' target='iframe_a'>Masivo</a></li>
                    <li><a target='iframe_a'>Asigna ficha </a>
                      <ul>
                        <li><a href='frm_ficha_asigna.php' target='iframe_a'>Uno a Uno</a></li>
                        <li><a href='frm_ficha_asigna_m.php' target='iframe_a'>Masivo</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a>Programa</a>
                  <ul>
                    <li><a href='frm_programa.php' target='iframe_a'>Uno a Uno</a></li>
                    <li><a href='frm_programa_masivo.php' target='iframe_a'>Masivo</a></li>
                  </ul>
                </li>
                    <li><a>Curso</a>
                  <ul>
                <li><a href='frm_curso_ver.php' target='iframe_a'>Consultar</a></li>
                <li><a >Asignar</a>
                  <ul>
                    <li><a href='frm_curso_asignar_ins.php' target='iframe_a'>Instructor</a></li>
                    <li><a href='frm_curso_asignar_ficha.php' target='iframe_a'>Ficha</a></li>
                  </ul>
                </li>
                <li><a href='frm_curso_quitar.php' target='iframe_a'>Desasignar</a>
                  <ul>
                    <li><a href='frm_curso_quitar_ins.php' target='iframe_a'>Instructor</a></li>
                    <li><a href='frm_curso_quitar_ficha.php' target='iframe_a'>Ficha</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a target='iframe_a'>Ficha</a>
              <ul>
                <li><a href='frm_ficha.php' target='iframe_a'>Uno a Uno</a></li>
                <li><a href='' target='iframe_a'>Masivo</a></li>
              </ul>
            </li>
            <li><a>Grupo Preguntas</a>
              <ul>
                <li><a href='frm_grupo_pregunta.php' target='iframe_a'>Uno a Uno</a></li>
                <li><a target='iframe_a'>Masivo</a></li>
              </ul>
            </li>
            <li><a>Banco de respuestas</a>
              <ul>
                <li><a href='frm_Ban_Respuestas.php' target='iframe_a'>Uno a Uno</a></li>
                <li><a target='iframe_a'>Masivo</a></li>
              </ul>
            </li>
            </li>
              <li><a>Banco de preguntas</a>
                  <ul>
                    <li><a href='frm_banco_preguntas.php' target='iframe_a'>Uno a Uno</a></li>
                    <li><a target='iframe_a'>Masivo</a></li>
                  </ul>
              </li>
            </ul>
            <li><a>Evaluacion</a>
              <ul>
                <!-- frm_aplicar_encuesta.php -->
                <?php echo "<li><a href='frm_aplicar_eva_ficha.php?valor=".$User."' target='iframe_a'>Evaluar</a></li>";  ?>

                <li><a href='frm_evaluar_adm.php' target='iframe_a'>Administrar</a></li>
                <li><a href='frm_formulario_maestro.php' target='iframe_a'>Formulario</a></li>
              </ul>
            </li>
            <li><a>Reportes</a>
              <ul>
                <li><a target='iframe_a'>uno</a></li>
                <li><a target='iframe_a'>dos</a></li>
              </ul>
            </li>
            <li><a>Administracion</a>
              <ul>
                <li><a href='frm_cambio_contrasenna.php' target='iframe_a'>Cambio de contraseña</a></li>
                <li><a href='frm_cambio_contrasenna_otros.php' target='iframe_a'>Cambiar contraseña otro usuario</a></li>
              </ul>
            </li>
          </ul>
        </nav>
    </footer>
<!-- <nav> -->


	<div class="">
		<iframe height="500px" width="100%" src="" name="iframe_a"></iframe>
	</div>
   <!--<iframe height="300px" width="100%" name= "iframe_b" src="Frm_Ban_Respuestas.html" style="border:none;"></iframe>-->
  </body>
<footer></footer>  
</html>
