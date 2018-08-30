
<?php

// lee registros dentro de las tablas

require "conection.php";

class ConsultaUsuario extends Conexion{
  public function ConsultaUsuario(){
    parent::conectar();
  }
  public function TraeUsuario($IdPersona, $Pwd){
    $sql="SELECT per.id_persona, fn_persona_nom_com(per.id_persona), fn_credencial(cre.credencial,'D'), per.".chr(34)."Adm".chr(34)." FROM persona per INNER JOIN credencial cre ON (cre.id_persona = per.id_persona AND cre.estado_credencial='A') WHERE per.id_persona = " . $IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
     if ($resultado[2] == $Pwd){
       define ('NOMBRE_COMPLETO' , $resultado[1]);
       if ($resultado[3] == true){
         // print_r($resultado[3]);
         header("location:../Views/frm_principal_adm.php") ;
       } else {
         header("location:../Views/frm_principal_aprendiz.php") ;
       }

     } else{
       header("location:../Views/frm_no_entro.php") ;
     }
    $sentencia->closeCursor();
    // print_r($sentencia);
    return $resultado;
    $this->conexionBD=null;
  }
}

class ConsultaPersona extends Conexion{
  public function Consultapersona(){
    parent::conectar();
  }
  public function TraePersona($IdPersona){

    $sql="SELECT per.id_persona, per.nombre_uno, per.nombre_dos, per.apellido_uno, per.apellido_dos, fn_persona_nom_com(per.id_persona), per.estado_persona, per.fecha_nacimiento, per.correo_electronico, per.telefono, per.direccion FROM persona per WHERE per.id_persona = " . $IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    //print_r($sentencia);
    //print_r($resultado[0]);
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraeAllPersona(){

    $sql="SELECT  per.id_persona, fn_persona_nom_com(per.id_persona), per.correo_electronico FROM persona per";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    //print_r($sentencia);
    // print_r($resultado[0]);
    return $resultado;
    $this->conexionBD=null;
  }
}
class ConsultaGrupoPregunta extends Conexion{
  public function ConsultaGrupoPregunta(){
    parent::conectar();
  }
  public function TraeGrupoPregunta(){
    $sql="SELECT gp.Id_Grupo, gp.descripcion FROM grupo_pregunta gp";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    //print_r($sentencia);
    // print_r($resultado[1]);
    return $resultado;
    $this->conexionBD=null;
  }
}
class ConsultaPrograma extends Conexion{
  public function ConsultaPrograma(){
    parent::conectar();
  }
  public function TraePrograma(){
    $sql="SELECT pr.id_programa, pr.nombre_programa FROM programa pr";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}

class ConsultaFicha extends Conexion{
  public function ConsultaFicha(){
    parent::conectar();
  }
  public function TraeFicha(){
    $sql="SELECT fi.id_ficha, pr.nombre_programa FROM ficha fi inner join programa pr on (pr.id_programa = fi.id_programa)";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
// ConsultaBanRespuesta

class ConsultaBanRespuesta extends Conexion{
  public function ConsultaBanRespuesta(){
    parent::conectar();
  }
  public function TraeBanRespuesta(){
    $sql="SELECT br.id_respuesta, br.descripcion FROM banco_respuesta br";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}

class ConsultaPregunta extends Conexion{
  public function ConsultaPregunta(){
    parent::conectar();
  }
  public function TraePregunta(){
    $sql="SELECT bp.id_pregunta, bp.descripcion, gp.descripcion FROM banco_pregunta bp INNER JOIN grupo_pregunta gp ON(gp.id_grupo = bp.id_grupo)";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}

 ?>
