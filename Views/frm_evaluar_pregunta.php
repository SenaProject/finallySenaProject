<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/frm_evaluar_pregunta.css">
    <title></title>

        <?php

        require_once "../Models/leer.php";
        // print_r($UsuarioApp);
        // $IdPersona = USUARIO;
        $UserApp = $_POST['usuario'];
        $vFicha = $_POST['tFicha'];
        $vAnnio = $_POST['tAnnio'];
        $vTrimestre = $_POST['tTrimestre'];
        $vInstructor = $_POST['tInstructor'];
        $vEvaluacion= $_POST['SelectEvaluacion'];
        $cPreguntaActiva = new ConsultaAplicarEvaluacion();
        $viPreguntaActiva=$cPreguntaActiva->fTraePreguntaEva($UserApp, $vFicha , $vAnnio, $vTrimestre, $vInstructor, $vEvaluacion, 1);
        $vNumPre = $viPreguntaActiva[0];
        ?>

  </head>
  <body>
    <?php
       // $vRuta = '"../Controllers/validar_evaluacion.php?valor=sigpregunta&usuario='.$UserApp.'&tFicha='.$vFicha.'&tAnnio='.$vAnnio.'&tTrimestre='.$vTrimestre.'&tInstructor='.$vInstructor.'&SelectEvaluacion='.$vEvaluacion.'&nPregunta='.$vNumPre.'"';
      $vRuta = '../Controllers/validar_evaluacion.php?valor=sigpregunta';
      // print_r($vRuta);
      echo "<form class='' action='".$vRuta."' method='post'>";
      ?>
      <div class="">

          <?php
            echo "<input  class='ocultarinput' type='text' name ='usuario' value='".$UserApp."' readonly>";
            echo "<input  class='ocultarinput' type='text' name ='tFicha' value='".$vFicha."' readonly>";
            echo "<input  class='ocultarinput' type='text' name ='tAnnio' value='".$vAnnio."' readonly>";
            echo "<input  class='ocultarinput' type='text' name ='tTrimestre' value='".$vTrimestre."' readonly>";
            echo "<input  class='ocultarinput' type='text' name ='tInstructor' value='".$vInstructor."' readonly>";
            echo "<input  class='ocultarinput' type='text' name ='SelectEvaluacion' value='".$vEvaluacion."' readonly>";
            echo "<input  class='ocultarinput' type='text' name ='nPregunta' value='".$vNumPre."' readonly>";
           ?>
      </div>

    <div class="content_pregunta">
      <div class="box_pregunta">
          <h6 class="title_pregunta">Cantidad de Pregunta por responder :</h6>
          <?php
          $cCantPreguntasXRes= new ConsultaAplicarEvaluacion();
          $viCantPreguntasXRes=$cCantPreguntasXRes->fTraePreguntaEva($UserApp, $vFicha , $vAnnio, $vTrimestre, $vInstructor, $vEvaluacion, 0);
          echo '<div class="subtitle_respuesta">'.$viCantPreguntasXRes[0].'</div>';
          if ($viCantPreguntasXRes[0]>0) {

          ?>
      </div>
      <div class="box_pregunta">
        <h6 class="title_pregunta">  Evaluacion No. : </h6><?php echo '<div class="subtitle_respuesta">'.$vEvaluacion.'</div>'; ?>
      </div>
      <div class="box_pregunta">
        <h6 class="title_pregunta">  Ficha No. :</h6> <?php echo '<div class="subtitle_respuesta">'.$vFicha.'</div>'; ?>
      </div>
      <div class="box_pregunta">
        <h6 class="title_pregunta">  Año :</h6>
          <?php
          $cAnnio= new ConsultaAnnio();
          $viAnnio=$cAnnio->TraeAnnio($vAnnio);

            echo '<div class="subtitle_respuesta">'.$viAnnio[1].'</div>' ;
          ?>
      </div>
      <div class="box_pregunta">
        <h6 class="title_pregunta">  Trimestre :</h6>
            <?php
              $cTrimestre = new ConsultaTrimestre();
              $viTrimestre=$cTrimestre->TraeTrimestre($vTrimestre);
              echo '<div class="subtitle_respuesta">'.$viTrimestre[1].'</div>';

             ?>
      </div>
      <div class="box_pregunta">
          <h6 class="title_pregunta"> Instructor :</h6>
            <?php
              $cInstructor = new ConsultaPersona();
              $viInstructor=$cInstructor->TraeInstructor($vInstructor);
              echo '<div class="subtitle_respuesta">'.$viInstructor[1].'</div>';
            ?>
      </div>
      </div>
      <div class="main_content_eva">
        <div class="content_evaluacion">

                <?php

                  $cRespuestaActiva= new ConsultaRespuesta();
                  $viRespuestaActiva=$cRespuestaActiva->fTraeRespuesta($viPreguntaActiva[2]);
                  ?>
                  <div class="title_enunciado">

                    <h4>Enunciado de la pregunta</h4>
                    </div>
                    <?php
                    echo '<div class="body_enunciado">'.$viPreguntaActiva[1].'</div>';

                    ?>



      </div>
      <div class="content_respuesta">
                <div class="title_enunciado_res">
                    <h4>Respuesta</h4>
                  </div>
                    <?php
                    // print_r($viRespuestaActiva[1] [2]);
                    if ($viRespuestaActiva[1] [2] == 15) {
                      echo  "<div class='body_enunciado_res'><select class='respuesta' name='respuesta'>";
                          echo "<option value='0'>Selecciones repuesta</option>";
                      foreach ($viRespuestaActiva as $viRespuestaActivaInt) {
                          echo "<option value='".$viRespuestaActivaInt[0]."'>$viRespuestaActivaInt[1]</option>";
                        // debo hacer una lista desplegable
                        // echo "<input type='radio' name='respuesta' value=".$viRespuestaActivaInt[0].">".$viRespuestaActivaInt[1];
                        // echo $viRespuestaActivaInt[1]."<br>";
                      }
                      echo "</select></div>";
                      }
                    if ($viRespuestaActiva[1] [2] == 16){
                      foreach ($viRespuestaActiva as $viRespuestaActivaInt) {
                        echo "<div class='body_enunciado_button'><input type='radio' name='respuesta' value=".$viRespuestaActivaInt[0].">".$viRespuestaActivaInt[1]."</div>";
                        // echo $viRespuestaActivaInt[1]."<br>";
                      }
                    }

                    ?>
                  </fieldset>
                </div>

                </div>
          </div>
          <div class="input_content_eva">
            <input class="input_evaluacion" type="submit" name="btnGuardar" value="Guardar ...">
          </div>

        </form>
      </div>

<?php           } else {
      header("location:frm_aplicar_eva_ficha.php?valor=".$UserApp);
}
 ?>

  </body>
</html>
