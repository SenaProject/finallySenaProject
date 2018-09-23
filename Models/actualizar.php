<?php

//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 03/09/2018
//Version: 1.0.0.0

// $IdPersona = $_POST['NumDoc'];
// $Apellido1 = $_POST['Apellido1'];
// $Apellido2 = $_POST['Apellido2'];
// $Nombre1 = $_POST['Nombre1'];
// $Nombre2 = $_POST['Nombre2'];
// $estado = $_POST['estado'];
// $fnacimiento = $_POST['fnacimiento'];
// $email = $_POST['email'];
// $Tel = $_POST['Tel'];
// $Dir = $_POST['Dir'];


// Modifica registros dentro de las tablas

require "conection.php";

class ModificarPersona extends Conexion{
  public function ModificarPersona(){
    parent::conectar();
  }
  public function ModificaPer($IdPersona,$Nombre1,$Nombre2,$Apellido1,$Apellido2, $estado, $fnacimiento, $email, $Tel, $Dir, $tipo_documento, $admin ){
// $IdPersona,$Nombre1,$Nombre2,$Apellido1,$Apellido2, $estado, $fnacimiento, $email, $Tel, $Dir, $tipo_documento
     $sql="UPDATE persona SET  estado_persona=".$estado.", nombre_uno='".$Nombre1."', nombre_dos='".$Nombre2."', apellido_uno='".$Apellido1."', apellido_dos='".$Apellido2."', fecha_nacimiento='".$fnacimiento."', telefono='".$Tel."', correo_electronico='".$email."', direccion='".$Dir."',id_tipo_documento=".$tipo_documento.",".chr(34)."Adm".chr(34)."= ".$admin." WHERE id_persona=".$IdPersona;
//
//
     // print_r($sql);
    // SELECT per.id_persona, per.nombre_uno, per.nombre_dos, per.apellido_uno, per.apellido_dos, fn_persona_nom_com(per.id_persona), per.estado_persona, per.fecha_nacimiento, per.correo_electronico, per.telefono, per.direccion FROM persona per WHERE per.id_persona = " . $IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    //print_r($resultado[0]);
    return $resultado;
    $this->conexionBD=null;
  }
}
class ModificarPrograma extends Conexion{
  public function ModificarPrograma(){
    parent::conectar();
  }
  public function fModificaPrograma($Nprograma, $IdPrograma){
    $sql="UPDATE programa SET nombre_programa='".$Nprograma."' WHERE id_programa=".$IdPrograma;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
class ModificarFormulario extends Conexion{
  public function ModificarFormulario(){
    parent::conectar();
  }
  public function fModificarFormulario($IdFormulario, $NomForm){
    $sql="UPDATE formulario SET descripcion='".$NomForm."' WHERE id_formulario=".$IdFormulario;
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}

?>
