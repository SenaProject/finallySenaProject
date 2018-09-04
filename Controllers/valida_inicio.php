<?php
//DOCTYPE html , php 
//Autor: Pablo Emilio Garcia
//Fecha: 15/07/2018
//Version: 1.0.0.0	

require "../Models/leer.php";

$IdPersona = $_POST["Usuario1"];
$Pwd = $_POST["Pwd1"];

// print_r($IdPersona);
// echo "</br>";
// print_r($Pwd);
// echo "</br>";
//
//
//
// $logIdPer = strlen($IdPersona);
// print_r($logIdPer);
// echo "</br>";
//
// for ($i=0; $i <= $logIdPer; $i++) {
//     $CaraIdPer = substr($IdPersona, $i, 1);
//     $Valor = 0;
//     echo "</br>";
//     if ($CaraIdPer == 0){
//       $Valor = true;
//       echo "<a>Pasa por aqui</a>";
//     }
//     elseif ($CaraIdPer == 1){
//       $Valor = True;
//     }
//     elseif ($CaraIdPer == 2){
//       $Valor = True;
//         }
//     elseif ($CaraIdPer == 3){
//       $Valor = True;
//         }
//    elseif ($CaraIdPer == 4){
//       $Valor = True;
//         }
//   elseif ($CaraIdPer == 5){
//       $Valor = True;
//         }
//   elseif ($CaraIdPer == 6){
//       $Valor = True;
//         }
//   elseif ($CaraIdPer == 7){
//       $Valor = True;
//         }
//   elseif ($CaraIdPer == 8){
//       $Valor = True;
//         }
//   elseif ($CaraIdPer == 9){
//       $Valor = True;
//         }
//     else {
//       $Valor = false;
//       print_r($CaraIdPer);
//     }
//     }
// echo "</br>";
// echo $Valor;

$consultar= new ConsultaUsuario();
$ver=$consultar->TraeUsuario($_POST["Usuario1"], $_POST["Pwd1"]);
 ?>
