<?php
//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 02/09/2018
//Version: 1.0.0.0

require_once "conection.php";


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



class BorrarPersona extends Conexion{
  public function BorrarPersona(){
    parent::conectar();
  }
  public function fBorrarPersona($IdPersona){
    $sql="DELETE FROM ficha_persona_rol WHERE Id_Persona = ".$IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    $sql="DELETE FROM persona_rol WHERE Id_Persona = ".$IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    $sql="DELETE FROM credencial WHERE Id_Persona = ".$IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    $sql="DELETE FROM persona WHERE Id_Persona = ".$IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}

class QuitarDetalleEvaluacion extends Conexion{
  public function QuitarDetalleEvaluacion(){
    parent::conectar();
  }
  public function fQuitarDetalleEvaluacion($IdEvaluacion){
    $sql="DELETE FROM evaluacion_detalle WHERE Id_evaluacion = ".$IdEvaluacion;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;

  }
}
 ?>
