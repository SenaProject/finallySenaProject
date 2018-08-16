<?php

class MvcController{

function ConsultarFichaController(){
$datosModel = '*';
$respuesta = Model::consultarFichaModel($datosModel, 'rol');
echo "Hola mundo1";
//include "Views/view_ficha.php";
var_dump ($respuesta);

}


function ConsultarFichaControllerSigleton(){
$datosModel = '*';
$respuesta = ModelConection::ConsultarFichaModelSigleton($datosModel, 'rol');
echo "Hola mundo1";
//include "Views/view_ficha.php";
var_dump ($respuesta);

}

}
