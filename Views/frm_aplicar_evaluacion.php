<?php

require_once "../Models/leer.php";
// print_r($UsuarioApp);
$control = 0;
// $IdPersona = USUARIO;
$UserApp = $_GET['valor'];

$cFicha= new ConsultaAplicarEvaluacion();
$vFicha=$cFicha->fTraeInfoEva($UserApp, 0, 0, 0, 0);

$cAnnio= new ConsultaAplicarEvaluacion();

// $cTrimestre= new ConsultaAplicarEvaluacion();
// $vTrimestre=$cTrimestre->fTraeInfoEva($UserApp, 5, 0, 1);

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>Aplicar Evaluacion</h1>
        <form class="" action="index.html" method="post">
          <br>
          <div name="dFicha">
            Ficha:
            <select id="SelectFicha" onchange="fFicha()">
              <option value='0'></option>
              <?php
                foreach ($vFicha as $vFichaInt) {
                    echo "<option value='".$vFichaInt[0]."'>".$vFichaInt[0]."</option>";
                }
               ?>
            </select>
          </div>
          <p Id="SelectAnnio"></p>
          <p name="dTrimestre"></p>
        </form>



        <script>
        // function fAnnio() {
        //   var  viAnnio = document.getElementById("SelectFicha").value;
        //   document.getElementById("SelectAnnio").innerHTML = "<select id='SelectAnnio' ><option value='1'>mio1<option value='2'>mio2</select>";
        // }
        function fFicha(){
          var  vFicha = document.getElementById("SelectFicha").value;
           document.write("Ficha No.: "+vFicha);
          document.getElementById("SelectAnnio").innerHTML = vFicha + "<select id='SelectAnnio' ><option value='1'>mio1<option value='2'>mio2</select>";
        }
        // return viAnnio;

        </script>
        <?php
           $viFicha = "<script> document.write(vFicha) </script>";
           echo $viFicha;
          // $vAnnio=$cAnnio->fTraeInfoEva($UserApp, $viFicha, 0, 0, 1);
          // foreach ($vAnnio as $vAnnioInt) {
          //     echo $vAnnioInt[0]." - ".$vAnnioInt[1]."<br>";
          // }
          ?>
   </body>
 </html>
