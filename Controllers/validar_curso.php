<?php

//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 03/09/2018
//Version: 1.0.0.0


//variables pl

$valor=$_GET['valor'];

// VER





// ASIGNAR

if ($valor=="asignar"){
// print_r("por aqui paso");
$annio = $_POST['sAnnio'];
$trimestre  = $_POST['sTrimestre'];
$ficha  = $_POST['sFicha'];



print_r($annio);
echo "<br>";
print_r($trimestre);
echo "<br>";
print_r($ficha);


}


// QUITAR





 ?>
