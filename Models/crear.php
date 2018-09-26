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

    $sql="INSERT INTO credencial (id_credencial, estado_credencial, credencial, fecha_aviso, fecha_caducidad, id_persona)
    VALUES (fn_id_tabla('credencial','id_credencial'), 'A', fn_credencial('".$IdPersona."','E'), fn_fecha_credencial('A'), fn_fecha_credencial('C'), ".$IdPersona.")";
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    return $resultado;
    $this->conexionBD=null;
  }
}
class CrearNuevoPwd extends Conexion{
  public function CrearNuevoPwd(){
    parent::conectar();
  }

  public function fCrearNuevoPwd($IdPersona,$NewPwd){
    // Cambia la contraseña anterior a inactiva
    $sql="SELECT count(*) FROM credencial  WHERE id_persona = ".$IdPersona;
    print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    if ($resultado[0] > 0) {
      $sql="UPDATE credencial SET estado_credencial = 'I' WHERE id_persona = ".$IdPersona;
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetch();
      $sentencia->closeCursor();
    }

// inserta la nueva contraseña
    $sql="INSERT INTO credencial (id_credencial, estado_credencial, credencial, fecha_aviso, fecha_caducidad, id_persona)
    VALUES (fn_id_tabla('credencial','id_credencial'), 'A', fn_credencial('".$NewPwd."','E'), fn_fecha_credencial('A'), fn_fecha_credencial('C'), ".$IdPersona.")";
    // print_r($sql);
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

class CrearFormularioM extends Conexion{
  public function CrearFormularioM(){
        parent::conectar();
  }
  public function fCrearFormularioM($NomForm){
    $sql="INSERT INTO formulario(id_formulario, descripcion, estado) VALUES (fn_id_tabla('formulario','id_formulario'), '".$NomForm."', 'True')";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    return $resultado;
    $this->conexionBD=null;
  }

}

class CrearDetalleFormulario extends Conexion{
  public function CrearDetalleFormulario(){
        parent::conectar();
  }
  public function fCrearDetalleFormulario($Formulario,$IdPregunta){
// $Formulario,$IdPregunta
    $sql="INSERT INTO detalle_formulario(id_formulario, id_pregunta, estado) VALUES (".$Formulario.", ".$IdPregunta.", 'True')";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    return $resultado;
    $this->conexionBD=null;


}}

class CrearEvaluacionMaestro extends Conexion{
  public function CrearEvaluacionMaestro(){
        parent::conectar();
  }
  public function fCrearEvaluacionMaestro($fecha_inicio, $fecha_final){
    $sql="INSERT INTO evaluacion(id_evaluacion, estado, fecha_inicio, fecha_final) VALUES (fn_id_tabla('evaluacion','id_evaluacion'),'True','".$fecha_inicio."', '".$fecha_final."')";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();

    return $resultado;
    $this->conexionBD=null;
  }
}
class CrearEvaluacionDetalle extends Conexion{
  public function CrearEvaluacionDetalle(){
        parent::conectar();
  }
  public function fCrearEvaDetAll($IdEvaluacion, $IdFormulario, $IdPregunta, $IdInstructor, $IdAprendiz, $Annio, $Trimestre, $Ficha, $Estado){
    $sql="INSERT INTO evaluacion_detalle(id_evaluacion_detalle, id_evaluacion, id_formulario, id_pregunta, id_instructor, id_aprendiz, id_annio, id_trimestre, id_ficha, estado) VALUES (fn_id_tabla('evaluacion_detalle','id_evaluacion_detalle'), ".$IdEvaluacion.", ".$IdFormulario.", ".$IdPregunta.", ".$IdInstructor.", ".$IdAprendiz.", ".$Annio.",  ".$Trimestre.", ".$Ficha.", ".$Estado.")";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
  class CrearFicha extends Conexion{
    public function CrearFicha(){
          parent::conectar();
    }
    public function fCrearFicha($Ficha, $IdPrograma, $FInicio, $FFin,$IdJornada){
      $sql="INSERT INTO ficha(id_ficha, id_programa, estado_ficha, fecha_inicio, fecha_final, id_jornada) VALUES (".$Ficha.", ".$IdPrograma.", 'True','".$FInicio."', '".$FFin."', ".$IdJornada.")";
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetch();
      $sentencia->closeCursor();
      return $resultado;
      $this->conexionBD=null;
    }

  // public function fCrearEvaDetAll(){
  //   $sql="";
  //   $sentencia=$this->conexionBD->prepare($sql);
  //   $sentencia->execute();
  //   $resultado=$sentencia->fetch();
  //   $sentencia->closeCursor();
  //   return $resultado;
  //   $this->conexionBD=null;
  // }
  // public function fCrearEvaDetXPrg(){
  //   $sql="";
  //   $sentencia=$this->conexionBD->prepare($sql);
  //   $sentencia->execute();
  //   $resultado=$sentencia->fetch();
  //   $sentencia->closeCursor();
  //   return $resultado;
  //   $this->conexionBD=null;
  // }
  // public function fCrearEvaDetXFic(){
  //   $sql="";
  //   $sentencia=$this->conexionBD->prepare($sql);
  //   $sentencia->execute();
  //   $resultado=$sentencia->fetch();
  //   $sentencia->closeCursor();
  //   return $resultado;
  //   $this->conexionBD=null;
  // }
  // public function fCrearEvaDetXIns(){
  //   $sql="";
  //   $sentencia=$this->conexionBD->prepare($sql);
  //   $sentencia->execute();
  //   $resultado=$sentencia->fetch();
  //   $sentencia->closeCursor();
  //   return $resultado;
  //   $this->conexionBD=null;
  // }
}
class CrearPregunta extends Conexion{
  public function CrearPregunta(){
    parent::conectar();
  }

  public function fCrearPregunta($IdGrupo, $IdRespuesta,$Descripcion){
    $sql="INSERT INTO banco_pregunta(id_pregunta, id_grupo, id_respuesta, descripcion, estado) VALUES (fn_id_tabla('banco_pregunta','id_pregunta'), ".$IdGrupo.",".$IdRespuesta.", '".$Descripcion."' , 'True')";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
  }
}
 ?>
