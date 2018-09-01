<?php
require "conection.php";


class BorrarPrograma extends Conexion{
  public function BorrarPrograma(){
    parent::conectar();
  }
  public function BorraPrograma($id_prg){
    $sql="DELETE FROM programa pr WHERE pr.id_programa = ".$id_prg;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
 ?>
