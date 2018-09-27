<?php

//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 03/09/2018
//Version: 1.0.0.0

// conexiones

require_once "../Models/leer.php";


//variables pl

$valor=$_GET['valor'];

// VER

if ($valor=="ver"){

$annio = $_POST['sAnnio'];
$trimestre  = $_POST['sTrimestre'];
$ficha  = $_POST['sFicha'];
// print_r($annio);

if ($annio !== "Nulo" && $trimestre !== "Nulo" && $ficha !== "Nulo"){
  $consultar= new ConsultaParametros();
  $ver=$consultar->TraeParametros($annio,'');

echo "Año: ".$ver[0];
echo "<br>";
$consultar1= new ConsultaParametros();
$ver1=$consultar1->TraeParametros($trimestre,'');

echo "Trimestre: ".$ver1[0];
echo "<br>";
$consultar2= new ConsultaFicha();
$ver2=$consultar2->TraeFicha($ficha);

echo "Ficha: ".$ver2[0];
echo "<br>";
$consultar3= new ConsultarCurso();
$ver3=$consultar3->ConsultarCursoATF($annio, $trimestre, $ficha);

echo "<table border=3>";
echo "  <tr>";
echo "    <th colspan = '2'><p>Aprendices</p></th>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Nombre</th>";
echo "    <th>Rol</th>";
echo "  </tr>";

foreach ($ver3 as $valor) {
echo "  <tr>";

if ($valor[1]=='Instructor') {
    // echo "    <td><font color='blue'><b>".$valor[0]."</font></b></td>";
    // echo "    <td><font color='blue'><b>".$valor[1]."</font></b></td>";
} else {
    echo "    <td>".$valor[0]."</td>";
    echo "    <td>".$valor[1]."</td>";
}
echo "  </tr>";
}
echo "</table>";

echo "<table border=3>";
echo "  <tr>";
echo "    <th colspan = '2'><b>Instructores</b></th>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Nombre</th>";
echo "    <th>Rol</th>";
echo "  </tr>";

foreach ($ver3 as $valor) {
echo "  <tr>";

if ($valor[1]=='Instructor') {
    echo "    <td><font color='red'><b>".$valor[0]."</font></b></td>";
    echo "    <td><font color='red'><b>".$valor[1]."</font></b></td>";
} else {
    // echo "    <td>".$valor[0]."</td>";
    // echo "    <td>".$valor[1]."</td>";
}
echo "  </tr>";
}
echo "</table>";

}

else {
  echo "<b>Por favor ingrese la informacion completa</b>";
}
}


// ASIGNAR

if ($valor=="asignarins"){
// print_r("por aqui paso");
$annio = $_POST['sAnnio'];
$trimestre  = $_POST['sTrimestre'];
$ficha  = $_POST['sFicha'];
$instructor= $_POST['instructores'];


if ($annio !== ''||$trimestre !== ''||$ficha !== ''){
require_once "../Models/crear.php";
print_r($annio);
echo "<br>";
print_r($trimestre);
echo "<br>";
print_r($ficha);
  // echo "<br>";
  // print_r($instructor);

foreach ($instructor as $valor) {
  echo "Instructor: ".$valor;
  echo "<br>";
  $consultar = new CrearCurso();
  $ver=$consultar->fCrearCurso($annio, $trimestre, '2', $valor, $ficha);

}
}

}
if ($valor=="asignarficha"){
// print_r("por aqui paso");
$annio = $_POST['sAnnio'];
$trimestre  = $_POST['sTrimestre'];
$ficha  = $_POST['sFicha'];


if ($annio !== ''||$trimestre !== ''||$ficha !== ''){
require_once "../Models/crear.php";
print_r($annio);
echo "<br>";
print_r($trimestre);
echo "<br>";
print_r($ficha);

$consultar = new ConsultaPersona();
$ver=$consultar->TraeAllAprendices_x_Ficha($ficha);

foreach ($ver as $valor) {
  // echo "valor ".$valor[1];
  // echo "<br>";
  $consultar = new CrearCurso();
  $ver=$consultar->fCrearCurso($annio, $trimestre, '1', $valor[1], $ficha);
}
}
}


// QUITAR

if ($valor=="quitarficha"){
// print_r("por aqui paso");
$annio = $_POST['sAnnio'];
$trimestre  = $_POST['sTrimestre'];
$ficha  = $_POST['sFicha'];


if ($annio !== ''||$trimestre !== ''||$ficha !== ''){
require_once "../Models/crear.php";
print_r($annio);
echo "<br>";
print_r($trimestre);
echo "<br>";
print_r($ficha);

$consultar = new ConsultaPersona();
$ver=$consultar->TraeAllAprendices_x_Ficha($ficha);

foreach ($ver as $valor) {
  // echo "valor ".$valor[1];
  // echo "<br>";
  $consultar = new CrearCurso();
  $ver=$consultar->fCrearCurso($annio, $trimestre, '1', $valor[1], $ficha);
}
}
}

if ($valor=="quitarins"){
// print_r("por aqui paso");
$annio = $_POST['sAnnio'];
$trimestre  = $_POST['sTrimestre'];
$ficha  = $_POST['sFicha'];
$instructor= $_POST['instructores'];


if ($annio !== ''||$trimestre !== ''||$ficha !== ''){
require_once "../Models/crear.php";
print_r($annio);
echo "<br>";
print_r($trimestre);
echo "<br>";
print_r($ficha);
  // echo "<br>";
  // print_r($instructor);

foreach ($instructor as $valor) {
  echo "Instructor: ".$valor;
  echo "<br>";
  $consultar = new CrearCurso();
  $ver=$consultar->fCrearCurso($annio, $trimestre, '2', $valor, $ficha);

}
}

}



 ?>
