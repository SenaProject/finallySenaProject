<?php
//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 15/07/2018
//Version: 1.0.0.0

require "../Models/leer.php";
global $UsuarioApp;
$UsuarioApp = $_POST["Usuario1"];
// define ('USUARIO',$IdPersona);

$Pwd = $_POST["Pwd1"];


$consultar= new ConsultaUsuario();
$ver=$consultar->TraeUsuario($UsuarioApp, $_POST["Pwd1"]);
 ?>
