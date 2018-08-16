<?php

/**
 *
 */
class Model extends Conexion{

  function consultarFichaModel($datos ,  $tabla)
  {
    // code...
  $statement = Conexion::conection()->prepare("SELECT $datos FROM $tabla");
$statement -> execute();
var_dump ($statement);

  }
}

/**
 *
 */
class ModelConection extends PatronSingleton
{

  function ConsultarFichaModelSigleton($datos ,  $tabla)
  {
    // code...
    $statement = parent::singleton()->query("SELECT $datos FROM $tabla");

    return $statement;
    echo "strinkgjkjkg";

  }
}
