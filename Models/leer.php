
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
         header("location:../Views/frm_principal_adm.php?valor=".$resultado[1]) ;
       } else {
         header("location:../Views/frm_principal_aprendiz.php?valor=".$resultado[1]) ;
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

    $sql="SELECT per.id_persona, per.nombre_uno, per.nombre_dos, per.apellido_uno, per.apellido_dos, fn_persona_nom_com(per.id_persona), per.estado_persona, per.fecha_nacimiento, per.correo_electronico, per.telefono, per.direccion, per.id_tipo_documento FROM persona per WHERE per.id_persona = " . $IdPersona;
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
  public function TraeAllPrograma(){
    $sql="SELECT pr.id_programa, pr.nombre_programa FROM programa pr ORDER BY 1";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraePrograma($id_prg){
    $sql="SELECT pr.id_programa, pr.nombre_programa FROM programa pr WHERE pr.id_programa = ".$id_prg;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}

class ConsultaFicha extends Conexion{
  public function ConsultaFicha(){
    parent::conectar();
  }
  public function TraeFicha($NumFicha){
    $sql="SELECT fi.id_ficha FROM ficha fi where fi.id_ficha = ".$NumFicha;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraeFichaAll(){
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

class ConsultaParametros extends Conexion{
  public function ConsultaParametros(){
    parent::conectar();
  }
  public function TraeParametros($IdParametro,$Grupo){
    if ($IdParametro == 0 && $Grupo !==''){
          $sql="SELECT par.id_parametro, par.detalle FROM parametro par WHERE par.grupo = '".$Grupo."'";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();

    } else if ($IdParametro !== 0 && $Grupo =='') {
          $sql="SELECT par.detalle FROM parametro par WHERE par.id_parametro =".$IdParametro;
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetch();

    } else {
      // $sql="SELECT bp.id_pregunta, bp.descripcion, gp.descripcion FROM banco_pregunta bp INNER JOIN grupo_pregunta gp ON(gp.id_grupo = bp.id_grupo)";
    }
    $sentencia->closeCursor();
    return $resultado;
    // print_r($resultado);
    $this->conexionBD=null;
  }
}

class ConsultaRoles extends Conexion{
  public function ConsultaRoles(){
    parent::conectar();
  }
  public function TraeRoles($IdPersona){

          $sql="SELECT r.Nombre_rol, pr.id_persona FROM persona_rol pr inner join rol r on (pr.id_rol = r.id_rol) where pr.id_persona = ".$IdPersona;
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          if ($resultado ==''){return 'Sin Rol';}
          else {return $resultado;}
          $this->conexionBD=null;
  }
  public function TraeAllRoles(){

          $sql="SELECT r.id_rol, r.Nombre_rol FROM rol r ";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          if ($resultado ==''){return 'Sin Rol';}
          else {return $resultado;}
          $this->conexionBD=null;
  }

}


 ?>
