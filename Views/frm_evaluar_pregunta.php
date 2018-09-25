<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

        <?php

        require_once "../Models/leer.php";
        // print_r($UsuarioApp);
        // $IdPersona = USUARIO;
        $UserApp = $_GET['usuario'];
        $vFicha = $_GET['tFicha'];
        $vAnnio = $_GET['tAnnio'];
        $vTrimestre = $_GET['tTrimestre'];
        $vInstructor = $_GET['tInstructor'];
        $vEvaluacion= $_GET['SelectEvaluacion'];
        ?>

  </head>
  <body>
    <form class="" action=<?php echo "../Controllers/validar_evaluacion.php?valor=sigpregunta&usuario=".$UserApp."&tFicha=".$vFicha."&tAnnio=".$vAnnio."&tTrimestre=".$vTrimestre."&tInstructor=".$vInstructor."&SelectEvaluacion=".$vEvaluacion ?> method="GET">
      <div class="">
          Cantidad de Pregunta por responder :
          <?php
          $cCantPreguntasXRes= new ConsultaAplicarEvaluacion();
          $viCantPreguntasXRes=$cCantPreguntasXRes->fTraePreguntaEva($UserApp, $vFicha , $vAnnio, $vTrimestre, $vInstructor, $vEvaluacion, 0);
          echo $viCantPreguntasXRes[0];
          ?>
      </div>
      <div class="">
          Evaluacion No. : <?php echo $vEvaluacion; ?>
      </div>
      <div class="">
          Ficha No. : <?php echo $vFicha; ?>
      </div>
      <div class="">
          Año :
          <?php
          $cAnnio= new ConsultaAnnio();
          $viAnnio=$cAnnio->TraeAnnio($vAnnio);

            echo $viAnnio[1] ;
          ?>
      </div>
      <div class="">
          Trimestre :
            <?php
              $cTrimestre = new ConsultaTrimestre();
              $viTrimestre=$cTrimestre->TraeTrimestre($vTrimestre);
              echo $viTrimestre[1];

             ?>
      </div>
      <div class="">
          Instructor :
            <?php
              $cInstructor = new ConsultaPersona();
              $viInstructor=$cInstructor->TraeInstructor($vInstructor);
              echo $viInstructor[1];
            ?>
      </div>
      <div class="">
            <div class="">


            <?php
              $cPreguntaActiva = new ConsultaAplicarEvaluacion();
              $viPreguntaActiva=$cPreguntaActiva->fTraePreguntaEva($UserApp, $vFicha , $vAnnio, $vTrimestre, $vInstructor, $vEvaluacion, 1);
              $cRespuestaActiva= new ConsultaRespuesta();
              $viRespuestaActiva=$cRespuestaActiva->fTraeRespuesta($viPreguntaActiva[2]);
              ?>
              <fieldset>
              <legend><b>Enunciado de la pregunta</b></legend>
              <br>
              <?php
              echo $viPreguntaActiva[1];
              ?>
              </fieldset>
            </div>
            <div class="">

            <fieldset>
              <legend><b>Respuesta
              </b></legend>
              <?php
              // print_r($viRespuestaActiva[1] [2]);
              if ($viRespuestaActiva[1] [2] == 15) {
                echo  "<select class='' name='respuesta'>";
                foreach ($viRespuestaActiva as $viRespuestaActivaInt) {
                    echo "<option value='".$viRespuestaActivaInt[0]."'>$viRespuestaActivaInt[1]</option>";
                  // debo hacer una lista desplegable
                  // echo "<input type='radio' name='respuesta' value=".$viRespuestaActivaInt[0].">".$viRespuestaActivaInt[1];
                  // echo $viRespuestaActivaInt[1]."<br>";
                }
                echo "</select>";
                }
              if ($viRespuestaActiva[1] [2] == 16){
                foreach ($viRespuestaActiva as $viRespuestaActivaInt) {
                  echo "<input type='radio' name='respuesta' value=".$viRespuestaActivaInt[0].">".$viRespuestaActivaInt[1];
                  // echo $viRespuestaActivaInt[1]."<br>";
                }
              }

              ?>
            </fieldset>
            </div>
      </div>
      <input type="submit" name="btnSiguiente" value="Siguiente ...">
    </form>
  </body>
</html>
