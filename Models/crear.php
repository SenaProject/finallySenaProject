/*
crea registros dentro de las tablas
*/
<?php
require "conection.php";


class CrearPrograma extends Conexion{
  public function CrearPrograma(){
    parent::conectar();
  }

  public function CreaPrograma($nombre_programa, $estado_programa){
    $sql="INSERT INTO programa(id_programa, nombre_programa, estado_programa) VALUES (fn_id_tabla('programa','id_programa'),'".$nombre_programa."', ".$estado_programa. ")";
    $sentencia=$this->conexionBD->prepare($sql);
    // $nombre_programa
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}

 ?>
