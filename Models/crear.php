<?php
//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 02/09/2018
//Version: 1.0.0.0

/*
crea registros dentro de las tablas
*/
require_once "conection.php";


class CrearPrograma extends Conexion{
  public function CrearPrograma(){
    parent::conectar();
  }

  public function CreaPrograma($nombre_programa, $estado_programa){
    $sql="INSERT INTO programa(id_programa, nombre_programa, estado_programa) VALUES (fn_id_tabla('programa','id_programa'),'".$nombre_programa."', ".$estado_programa.")";
    $sentencia=$this->conexionBD->prepare($sql);
    // $nombre_programa
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
class CrearPersona extends Conexion{
  public function CrearPersona(){
    parent::conectar();
  }

  public function fCrearPersona($IdPersona,$Nombre1,$Nombre2,$Apellido1,$Apellido2,$fnacimiento,$Tel,$email,$Dir,$tipo_documento,$Administrador,$Rol,$ficha){
    $sql="INSERT INTO persona(id_persona, estado_persona, nombre_uno, nombre_dos, apellido_uno, apellido_dos, fecha_nacimiento, telefono, correo_electronico, direccion, id_tipo_documento, ".chr(34)."Adm".chr(34).") VALUES (".$IdPersona.", True,'".$Nombre1."','".$Nombre2."','".$Apellido1."','".$Apellido2."','".$fnacimiento."','".$Tel."','".$email."','".$Dir."',".$tipo_documento.",".$Administrador.")";
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    $sql="INSERT INTO persona_rol(id_persona, id_rol) VALUES (".$IdPersona.",".$Rol.")";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    $sql="INSERT INTO ficha_persona_rol (id_persona, id_rol, id_ficha) VALUES (".$IdPersona.",".$Rol.",".$ficha.")";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    return $resultado;
    $this->conexionBD=null;
  }
}
class CrearFichaPersonaRol extends Conexion{
  public function CrearFichaPersonaRol(){
        parent::conectar();
  }
  public function fCrearFichaPersonaRol($IdPersona, $Rol, $ficha){
  $sql="INSERT INTO ficha_persona_rol (id_persona, id_rol, id_ficha, estado) VALUES (".$IdPersona.",".$Rol.",".$ficha.", 'True')";
  $sentencia=$this->conexionBD->prepare($sql);
  $sentencia->execute();
  $resultado=$sentencia->fetch();
  $sentencia->closeCursor();

  return $resultado;
  $this->conexionBD=null;
  }
}
class CrearCurso extends Conexion{
  public function CrearCurso(){
        parent::conectar();
  }
  public function fCrearCurso($annio, $trimestre, $Rol, $IdPersona, $ficha){
    $sql="INSERT INTO curso(id_curso, id_annio, id_trimestre, id_rol, id_persona, id_ficha) VALUES (fn_id_tabla('curso','id_curso'), ".$annio.", ".$trimestre.", ".$Rol.", ".$IdPersona.", ".$ficha.")";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    return $resultado;
    $this->conexionBD=null;
  }
}
 ?>
