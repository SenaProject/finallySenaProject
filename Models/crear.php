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
class CrearPersona extends Conexion{
  public function CrearPersona(){
    parent::conectar();
  }

  public function fCrearPersona($IdPersona,$Nombres1,$Nombres2,$Apellido1,$Apellido2,$fnacimiento,$Tel,$email,$Dir,$tipo_documento,$Administrador,$Rol){
    $sql="INSERT INTO persona(id_persona, estado_persona, nombre_uno, nombre_dos, apellido_uno, apellido_dos, fecha_nacimiento, telefono, correo_electronico, direccion, id_tipo_documento, ".chr(34)."Adm".chr(34).") VALUES (".$IdPersona.", True,'".$Nombres1."','".$Nombres2."','".$Apellido1."','".$Apellido2."','".$fnacimiento."','".$Tel."','".$email."','".$Dir."',".$tipo_documento.",".$Administrador.")";
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

    return $resultado;
    $this->conexionBD=null;
  }
}


 ?>
