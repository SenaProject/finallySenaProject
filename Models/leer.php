
<?php
//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 03/09/2018
//Version: 1.0.0.0

// lee registros dentro de las tablas

require_once "conection.php";

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

    $sql="SELECT per.id_persona, per.nombre_uno, per.nombre_dos, per.apellido_uno, per.apellido_dos, fn_persona_nom_com(per.id_persona), per.estado_persona, per.fecha_nacimiento, per.correo_electronico, per.telefono, per.direccion, per.id_tipo_documento, per.".chr(34)."Adm".chr(34)." FROM persona per WHERE per.id_persona = " . $IdPersona;
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    // print_r($sentencia);
    //print_r($resultado[0]);
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraeAllPersona(){

    $sql="SELECT  per.id_persona, fn_persona_nom_com(per.id_persona), per.correo_electronico FROM persona per ORDER BY 1";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    //print_r($sentencia);
    // print_r($resultado[0]);
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraeAllInstructor(){

    $sql="SELECT  per.id_persona, fn_persona_nom_com(per.id_persona), per.correo_electronico FROM persona per INNER JOIN persona_rol pro on (pro.id_persona= per.id_persona) WHERE pro.id_rol = 2 ORDER BY 1";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraeAllAprendices_x_Ficha($idFicha){
    $sql="SELECT fpr.id_ficha, per.id_persona, fn_persona_nom_com(per.id_persona) FROM ficha_persona_rol fpr INNER JOIN persona per ON (per.id_persona = fpr.id_persona) WHERE fpr.id_rol = 1 AND fpr.id_ficha =". $idFicha;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraePersAdmin($IdPersonaAdm){
    $sql="SELECT per.".chr(34)."Adm".chr(34)." FROM persona per  WHERE per.Id_persona = ". $IdPersonaAdm;
    $sentencia=$this->conexionBD->prepare($sql);
    // print_r($sentencia);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraePersFichaRolAll($IdPersFR){
    $sql="SELECT fpr.id_ficha, pro.nombre_programa, rol.nombre_rol FROM ficha_persona_rol fpr INNER JOIN ficha fic ON (fic.id_ficha = fpr.id_ficha) INNER JOIN programa pro ON (pro.id_programa = fic.id_programa) INNER JOIN rol rol ON (rol.id_rol = fpr.id_rol) WHERE fpr.id_persona =".$IdPersFR;
    $sentencia=$this->conexionBD->prepare($sql);
     // print_r($sentencia);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }

  public function TraePersRol($IdPersFR){
    $sql="SELECT pro.id_persona, pro.id_rol, rol.nombre_rol FROM persona_rol pro INNER JOIN rol rol ON (rol.id_rol = pro.id_rol) WHERE pro.id_persona =".$IdPersFR;
    $sentencia=$this->conexionBD->prepare($sql);
     // print_r($sentencia);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraePersRolxPxR($IdPersFR,$Rol){
    $sql="SELECT pro.id_persona, pro.id_rol, rol.nombre_rol FROM persona_rol pro INNER JOIN rol rol ON (rol.id_rol = pro.id_rol) WHERE pro.id_persona =".$IdPersFR." and pro.id_rol =".$Rol;
    $sentencia=$this->conexionBD->prepare($sql);
     // print_r($sentencia);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
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
    $sql="SELECT fi.id_ficha, pr.nombre_programa FROM ficha fi inner join programa pr on (pr.id_programa = fi.id_programa) where fi.id_ficha = ".$NumFicha;
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
      $sql="SELECT par.detalle FROM parametro par WHERE par.id_parametro =".$IdParametro. "and par.grupo = '".$Grupo."'";
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetch();
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
class ConsultaAnnio extends Conexion{
  public function ConsultaAnnio(){
    parent::conectar();
  }

  public function TraeAllAnnio(){

          $sql="SELECT id_parametro, detalle FROM parametro WHERE id_grupo = 3";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }

}
class ConsultaTrimestre extends Conexion{
  public function ConsultaTrimestre(){
    parent::conectar();
  }
  public function TraeAllTrimestre(){
          $sql="SELECT id_parametro, detalle FROM parametro WHERE id_grupo = 4";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }
}
class ConsultarCurso extends Conexion{
  public function ConsultarCurso(){
    parent::conectar();
  }
  // public function ConsultarCurso(){
  //         $sql="SELECT fn_persona_nom_com(per.id_persona), rol.nombre_rol, annio.detalle, trim.detalle, cur.id_ficha FROM curso cur INNER JOIN persona per ON (per.id_persona = cur.id_persona) INNER JOIN parametro annio ON (annio.id_parametro = cur.id_annio) INNER JOIN parametro trim ON (trim.id_parametro = cur.id_trimestre) INNER JOIN rol rol ON (rol.id_rol = cur.id_rol)";
  //         $sentencia=$this->conexionBD->prepare($sql);
  //         $sentencia->execute();
  //         $resultado=$sentencia->fetchAll();
  //         $sentencia->closeCursor();
  //         return $resultado;
  //         $this->conexionBD=null;
  // }
  public function ConsultarCursoATF($annio, $trimestre, $ficha){
// Para realizar la consulta de un curso por los paramtros annio, trimestre y ficha.
          $sql="SELECT fn_persona_nom_com(cur.id_persona), ro.nombre_rol FROM curso cur INNER JOIN rol ro ON (ro.id_rol = cur.id_rol) WHERE cur.id_annio = ".$annio." and cur.id_trimestre = ".$trimestre." and cur.id_ficha = ".$ficha." order by 1";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }
  public function ConsultarInsAsigCurso($annio, $trimestre, $ficha){
// Para realizar la consulta de un curso por los paramtros annio, trimestre y ficha.
          $sql="SELECT fn_persona_nom_com(cur.id_persona), ro.nombre_rol FROM curso cur INNER JOIN rol ro ON (ro.id_rol = cur.id_rol) WHERE cur.id_annio = ".$annio." and cur.id_trimestre = ".$trimestre." and cur.id_ficha = ".$ficha." and cur.id_rol = 2 order by 1";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }


}
class ConsultarFormulario extends Conexion{
  public function ConsultarFormulario(){
    parent::conectar();
  }
  public function ConsultaForm(){
// Para realizar la consulta de las plantillas existentes .
          $sql="SELECT id_formulario, id_pregunta FROM detalle_formulario";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }
  public function Consulta_x_Form($idFormulario){
// Para realizar la consulta de un curso por los paramtros annio, trimestre y ficha.
          $sql="SELECT id_formulario, detalle FROM detalle_formulario WHERE id_formulario=".$idFormulario;
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }
  public function ConsultaFormM(){
// Para realizar la consulta de un curso por los paramtros annio, trimestre y ficha.
          $sql="SELECT id_formulario, descripcion FROM formulario";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }


}

 ?>
