<?php
require_once "Models/conection.php";
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
class ModelConection
{

  function ConsultarFichaModelSigleton($datos ,  $tabla)
  {
    // code...
    $statement = PatronSingleton::singleton();
    $query = $statement->prepare('SELECT $datos FROM $tabla');
    $query->execute();

    return $query;
    //var_dump($statement);

  }
}
