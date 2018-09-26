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
      <div class="">
          Cantidad de Pregunta por responder :
          <?php
          $cCantPreguntasXRes= new ConsultaAplicarEvaluacion();
          $viCantPreguntasXRes=$cCantPreguntasXRes->fTraePreguntaEva($UserApp, $vFicha , $vAnnio, $vTrimestre, $vInstructor, $vEvaluacion, 0);
          echo $viCantPreguntasXRes[0];
          if ($viCantPreguntasXRes[0]>0) {

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
                    echo "<option value='0'>Selecciones repuesta</option>";
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
      <input type="submit" name="btnGuardar" value="Guardar ...">
    </form>
<?php           } else {
      header("location:frm_aplicar_eva_ficha.php?valor=".$UserApp);
}
 ?>

  </body>
</html>
