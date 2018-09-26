
<?php
//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 03/09/2018
//Version: 1.0.0.0

// lee registros dentro de las tablas

require_once "conection.php";
$IdPersona = 0;
class ConsultaUsuario extends Conexion{
  public function ConsultaUsuario(){
    parent::conectar();
  }
  public function TraeUsuario($IdPersona, $Pwd){
    $sql="SELECT per.id_persona, fn_persona_nom_com(per.id_persona), fn_credencial(cre.credencial,'D'), per.".chr(34)."Adm".chr(34)." FROM persona per INNER JOIN credencial cre ON (cre.id_persona = per.id_persona AND cre.estado_credencial='A') WHERE estado_persona = True and per.id_persona = " . $IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    // global USUARIO;
     if ($resultado[2] == $Pwd){
       define ('NOMBRE_COMPLETO' , $resultado[1]);
       if ($resultado[3] == true){
         // print_r($resultado[3]);

         header("location:../Views/frm_principal_adm.php?valor=".$resultado[1]."&user=".$resultado[0]) ;
       } else {
         define ('USUARIO',$resultado[0]);
         header("location:../Views/frm_principal_aprendiz.php?valor=".$resultado[1]."&user=".$resultado[0]) ;
       }

     } else{
       header("location:../Views/frm_no_entro.php") ;
     }
    $sentencia->closeCursor();
    // print_r($sentencia);
    return $resultado;
    $this->conexionBD=null;
  }
  public function fValidaUsuario($IdPersona, $Pwd){
    $sql="SELECT per.id_persona, fn_persona_nom_com(per.id_persona), fn_credencial(cre.credencial,'D'), per.".chr(34)."Adm".chr(34)." FROM persona per INNER JOIN credencial cre ON (cre.id_persona = per.id_persona AND cre.estado_credencial='A') WHERE per.id_persona = " . $IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
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

    $sql="SELECT per.id_persona, per.nombre_uno, per.nombre_dos, per.apellido_uno, per.apellido_dos, fn_persona_nom_com(per.id_persona), per.estado_persona, per.fecha_nacimiento, per.correo_electronico, per.telefono, per.direccion, per.id_tipo_documento, per.".chr(34)."Adm".chr(34)." FROM persona per WHERE per.id_persona = ".$IdPersona;
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
  public function ExistePersona($IdPersona){
    try {
      // $resultado = 0;
      // print_r($IdPersona);
      // settype($resultado,'integer');

      // desde aqui
      if (is_null($IdPersona)) {
          $IdPersona = -1;
          }
      $sql="SELECT count(id_persona) FROM persona WHERE id_persona = ".$IdPersona;
      // print_r($sql);
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetch();
      $sentencia->closeCursor();
      // print_r($sentencia);
      // print_r($resultado[0]);
      return $resultado;
      $this->conexionBD=null;
    //
    } catch (\Exception $e) {
      return 0;
    }

    //
    // $sql="SELECT count(id_persona) FROM persona WHERE id_persona =".$IdPersona;
    // // print_r($sql);
    // $sentencia=$this->conexionBD->prepare($sql);
    // $sentencia->execute();
    // $resultado=$sentencia->fetch();
    // $sentencia->closeCursor();
    // // print_r($sentencia);
    // //print_r($resultado[0]);
    // return $resultado;
    // $this->conexionBD=null;
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
  public function TraeInstructor($instructor){

    $sql="SELECT  per.id_persona, fn_persona_nom_com(per.id_persona), per.correo_electronico FROM persona per INNER JOIN persona_rol pro on (pro.id_persona= per.id_persona) WHERE pro.id_rol = 2 AND per.id_persona =".$instructor." ORDER BY 1";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
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

  public function TraePreguntasLibres($IdFormulario,$IdGrupo){
    $sql="SELECT bp.id_pregunta, bp.descripcion, gp.descripcion FROM banco_pregunta bp INNER JOIN grupo_pregunta gp ON(gp.id_grupo = bp.id_grupo) WHERE bp.id_pregunta not in (SELECT id_pregunta FROM detalle_formulario WHERE id_formulario = ".$IdFormulario.") AND gp.id_grupo = ".$IdGrupo." ORDER BY 3,2";
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function TraeGrupoPreguntas(){
    $sql="SELECT gp.id_grupo, gp.descripcion FROM grupo_pregunta gp";
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
  public function TraeAnnio($annio){

          $sql="SELECT id_parametro, detalle FROM parametro WHERE id_grupo = 3 and id_parametro = ".$annio;
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetch();
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
  public function TraeTrimestre($trimestre){
          $sql="SELECT id_parametro, detalle FROM parametro WHERE id_grupo = 4 and id_parametro = ".$trimestre;
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetch();
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
// Para realizar la consulta de un curso por los paramtros annio, trimestre y ficha.
public function ConsultarInsAsigCurso($annio, $trimestre, $ficha){
          $sql="SELECT fn_persona_nom_com(cur.id_persona), ro.nombre_rol FROM curso cur INNER JOIN rol ro ON (ro.id_rol = cur.id_rol) WHERE cur.id_annio = ".$annio." and cur.id_trimestre = ".$trimestre." and cur.id_ficha = ".$ficha." and cur.id_rol = 2 order by 1";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }
// todos los años
  public function ConsultarAnnioCursoAll(){
            $sql="SELECT par.id_parametro, par.detalle FROM curso cur INNER JOIN  parametro par ON (par.id_parametro = cur.id_annio) GROUP BY par.detalle, par.id_parametro";
            $sentencia=$this->conexionBD->prepare($sql);
            $sentencia->execute();
            $resultado=$sentencia->fetchAll();
            $sentencia->closeCursor();
            return $resultado;
            $this->conexionBD=null;
    }
    public function ConsultarTrimestreCursoAll($Annio){
              $sql="SELECT par.id_parametro, par.detalle FROM curso cur INNER JOIN  parametro par ON (par.id_parametro = cur.id_trimestre) WHERE cur.id_annio = ".$Annio." GROUP BY par.detalle, par.id_parametro";
              $sentencia=$this->conexionBD->prepare($sql);
              $sentencia->execute();
              $resultado=$sentencia->fetchAll();
              $sentencia->closeCursor();
              return $resultado;
              $this->conexionBD=null;
      }

}
class ConsultarFormularioM extends Conexion{
  public function ConsultarFormularioM(){
    parent::conectar();
  }
  public function TraeFormularioMall(){
// Para realizar la consulta de todas las plantillas existentes.
          $sql="SELECT id_formulario, descripcion FROM formulario";
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }
  public function TraeFormularioM($idFormulario){
// Para realizar la consulta de un plantillas existente.
          $sql="SELECT id_formulario, descripcion FROM formulario WHERE id_formulario=".$idFormulario;
          $sentencia=$this->conexionBD->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetch();
          $sentencia->closeCursor();
          return $resultado;
          $this->conexionBD=null;
  }
}
class ConsultarFormularioD extends Conexion{
  public function ConsultarFormularioD(){
    parent::conectar();
  }
  public function TraeFormularioDall($IdFormularioD){
    $sql="SELECT df.id_formulario, f.descripcion, gp.id_grupo, gp.descripcion, df.id_pregunta, bp.descripcion FROM detalle_formulario df INNER JOIN formulario f ON (f.id_formulario = df.id_formulario) INNER JOIN banco_pregunta bp ON(bp.id_pregunta = df.id_pregunta) INNER JOIN grupo_pregunta gp ON(gp.id_grupo = bp.id_grupo) WHERE df.id_formulario = ".$IdFormularioD." ORDER BY 1,3";
     // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchall();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
class ConsultaRol extends Conexion{
  public function ConsultaRol(){
    parent::conectar();
  }
  public function TraeRol($IdRol){
    $sql="SELECT id_rol, nombre_rol FROM rol WHERE id_rol = ".$IdRol;
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
class ConsultaEvaluacion extends Conexion{
  public function ConsultaEvaluacion(){
    parent::conectar();
  }
  public function TraeMaestroEvaluacionAll(){
    $sql="SELECT id_evaluacion, estado, fecha_inicio, fecha_final FROM evaluacion";
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchall();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
class ConsultaAplicarEvaluacion extends Conexion{
  public function ConsultaAplicarEvaluacion(){
    parent::conectar();
  }
  // esta es la informacion de la evaluacion se filtra para saber los años trimestres y fihcas que el aprendiz esta ligdo
  // para ficha $control es igual a 0
  // para año  $control es igual a 1
  public function fTraeInfoEva($IdPersona, $ficha , $annio, $trimestre, $instructor, $control){
    // Resultante las fichas
    if ($ficha == 0 && $annio == 0 && $trimestre == 0 && $instructor==0 && $control == 0) {
      $sql="SELECT DISTINCT id_ficha FROM evaluacion_detalle WHERE id_aprendiz =".$IdPersona;
      // print_r($sql);
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetchall();
      $sentencia->closeCursor();
      return $resultado;
      $this->conexionBD=null;
    }
    // Resultante los años
    if ($ficha !== 0 && $annio == 0 && $trimestre == 0 && $instructor==0 && $control == 1) {
      $sql="SELECT DISTINCT ed.id_annio, p.detalle  FROM evaluacion_detalle ed INNER JOIN parametro p ON(p.id_parametro = ed.id_annio) WHERE ed.id_aprendiz = ".$IdPersona." AND ed.id_ficha =".$ficha;
      // print_r($sql);
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetchall();
      $sentencia->closeCursor();
      return $resultado;
      $this->conexionBD=null;
    }
    // Resultante trimestre
    if ($ficha !== 0 && $annio !== 0 && $trimestre == 0 && $instructor==0  && $control == 3) {
      $sql="SELECT DISTINCT ed.id_trimestre, p.detalle FROM evaluacion_detalle ed INNER JOIN  parametro p ON(p.id_parametro = ed.id_trimestre) WHERE ed.id_aprendiz = ".$IdPersona." and ed.id_ficha =".$ficha." and ed.id_annio = ".$annio;
      // print_r($sql);
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetchall();
      $sentencia->closeCursor();
      return $resultado;
      $this->conexionBD=null;
    }

    // Resultante instructor
    if ($ficha !== 0 && $annio !== 0 && $trimestre !== 0 && $instructor==0  && $control == 4) {
      // $sql="SELECT DISTINCT c.id_trimestre, p.detalle FROM curso c INNER JOIN  parametro p ON(p.id_parametro = c.id_trimestre) WHERE id_rol = 1 and id_persona = ".$IdPersona." and id_ficha =".$ficha." and id_annio = ".$annio;
      $sql="SELECT DISTINCT ed.id_instructor, fn_persona_nom_com(ed.id_instructor) FROM evaluacion_detalle ed  WHERE ed.id_aprendiz = ".$IdPersona." and ed.id_ficha =".$ficha." and ed.id_annio = ".$annio." and ed.id_trimestre = ".$trimestre;
      // print_r($sql);
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetchall();
      $sentencia->closeCursor();
      return $resultado;
      $this->conexionBD=null;
    }

    // Evaluacion
    if ($ficha !== 0 && $annio !== 0 && $trimestre !== 0  && $instructor !==0 && $control == 5) {
      $sql="SELECT DISTINCT ed.id_evaluacion FROM evaluacion_detalle ed INNER JOIN evaluacion ev ON (ev.id_evaluacion = ed.id_evaluacion) WHERE ed.id_aprendiz = ".$IdPersona." AND ed.id_ficha =".$ficha." AND ed.id_annio = ".$annio." AND ed.id_trimestre = ".$trimestre." AND ev.fecha_inicio<= now() AND ev.fecha_final>= now()" ;//." AND e. = ";
       // print_r($sql);
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetchall();
      $sentencia->closeCursor();
      return $resultado;
      $this->conexionBD=null;
    }
}
public function fTraePreguntaEva($IdPersona, $ficha , $annio, $trimestre, $instructor, $evaluacion, $control2){
// trae cantidad de preguntas por responder

if ($IdPersona !== 0 && $ficha !== 0  && $annio !== 0 && $trimestre !== 0 && $instructor !== 0 && $evaluacion !== 0 && $control2 == 0) {
  $sql="SELECT COUNT(*) FROM evaluacion_detalle ed WHERE ed.id_aprendiz = ".$IdPersona." and ed.id_ficha =".$ficha." AND ed.id_annio = ".$annio." AND ed.id_trimestre = ".$trimestre." AND ed.id_instructor = ".$instructor." AND id_evaluacion = ".$evaluacion." AND respuesta IS NULL";
   // print_r($sql);
  $sentencia=$this->conexionBD->prepare($sql);
  $sentencia->execute();
  $resultado=$sentencia->fetch();
  $sentencia->closeCursor();
  return $resultado;
  $this->conexionBD=null;
}
// trae la pregunta activa a responder
if ($IdPersona !== 0 && $ficha !== 0  && $annio !== 0 && $trimestre !== 0 && $instructor !== 0 && $evaluacion !== 0 && $control2 == 1) {
  $sql="SELECT ede.id_pregunta, bp.descripcion, bp.id_respuesta FROM evaluacion_detalle ede INNER JOIN banco_pregunta bp ON (bp.id_pregunta = ede.id_pregunta) WHERE ede.id_evaluacion_detalle = (SELECT MIN(id_evaluacion_detalle) FROM evaluacion_detalle ed WHERE ed.id_aprendiz = ".$IdPersona." and ed.id_ficha =".$ficha." AND ed.id_annio = ".$annio." AND ed.id_trimestre = ".$trimestre." AND ed.id_instructor = ".$instructor." AND id_evaluacion = ".$evaluacion." AND respuesta IS NULL)";
   // print_r($sql);
  $sentencia=$this->conexionBD->prepare($sql);
  $sentencia->execute();
  $resultado=$sentencia->fetch();
  $sentencia->closeCursor();
  return $resultado;
  $this->conexionBD=null;
}
// trae si hay evaluaciones pendientes por realizar
if ($IdPersona !== 0 && $ficha !== 0  && $annio !== 0 && $trimestre !== 0 && $instructor !== 0 && $evaluacion == 0 && $control2 == 2) {
  $sql="SELECT COUNT(*) FROM evaluacion_detalle ed WHERE ed.id_aprendiz = ".$IdPersona." and ed.id_ficha =".$ficha." AND ed.id_annio = ".$annio." AND ed.id_trimestre = ".$trimestre." AND ed.id_instructor = ".$instructor." AND respuesta IS NULL";
   // print_r($sql);
  $sentencia=$this->conexionBD->prepare($sql);
  $sentencia->execute();
  $resultado=$sentencia->fetch();
  $sentencia->closeCursor();
  return $resultado;
  $this->conexionBD=null;
}
}
public function fTraeCantPreguntaResuEva($IdEvaluacion){
  $sql="select count(*) from evaluacion_detalle where id_evaluacion = ".$IdEvaluacion." and respuesta is not null";
  $sentencia=$this->conexionBD->prepare($sql);
  $sentencia->execute();
  $resultado=$sentencia->fetch();
  $sentencia->closeCursor();
  return $resultado;
  $this->conexionBD=null;
}
}
class ConsultaRespuesta extends Conexion{
  public function ConsultaRespuesta(){
    parent::conectar();
  }
  // esta es la informacion de la evaluacion se filtra para saber los años trimestres y fihcas que el aprendiz esta ligdo
  // para ficha $control es igual a 0
  // para año  $control es igual a 1
  public function fTraeRespuesta($respuesta){
    $sql="SELECT ir.id_item_respuesta, ir.descripcion, ir.id_tipo_respuesta FROM banco_respuesta br INNER JOIN item_respuesta ir ON(ir.id_respuesta = br.id_respuesta) WHERE br.id_respuesta =".$respuesta;
     // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
class ConsultaPersonaCurso extends Conexion{
  public function ConsultaPersonaCurso(){
    parent::conectar();

  }
  // Con esta informacion se presenta  todos los instructores y aprendices por un trimestre en especial
  public function fTraeCursoApredizAll($Annio, $Trimestre){
    $sql="SELECT id_persona FROM curso WHERE id_rol = 1 AND id_annio = ".$Annio." AND id_trimestre = ".$Trimestre;
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function fTraeCursoInstructorAll($Annio, $Trimestre){
    $sql="SELECT id_persona FROM curso WHERE id_rol = 2 AND id_annio = ".$Annio." AND id_trimestre = ".$Trimestre;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function fTraeCursoInsXAprAll($Annio, $Trimestre,$valor,$Dato){
    if ($valor==0 && $Dato =='') {
      // code...

    $sql="SELECT aprendiz.id_persona, instructor.id_persona, aprendiz.id_ficha FROM (SELECT id_persona, id_rol, id_ficha, id_annio, id_trimestre FROM curso WHERE id_rol = 2) instructor INNER JOIN (SELECT id_persona, id_rol, id_ficha, id_annio, id_trimestre FROM curso WHERE id_rol = 1) aprendiz ON ( aprendiz.id_ficha = instructor.id_ficha) WHERE aprendiz.id_annio = ".$Annio." AND instructor.id_annio = ".$Annio." AND aprendiz.id_trimestre = ".$Trimestre." AND instructor.id_trimestre = ".$Trimestre;
    }
    if ($valor==1 && $Dato !=='') {
      // code...

    $sql="SELECT aprendiz.id_persona, instructor.id_persona, aprendiz.id_ficha FROM (SELECT id_persona, id_rol, id_ficha, id_annio, id_trimestre FROM curso WHERE id_rol = 2) instructor INNER JOIN (SELECT id_persona, id_rol, id_ficha, id_annio, id_trimestre FROM curso WHERE id_rol = 1) aprendiz ON ( aprendiz.id_ficha = instructor.id_ficha) INNER JOIN ficha fic ON (fic.id_ficha = aprendiz.id_ficha) INNER JOIN programa pro ON (pro.id_programa = fic.id_programa)  WHERE aprendiz.id_annio = ".$Annio." AND instructor.id_annio = ".$Annio." AND aprendiz.id_trimestre = ".$Trimestre." AND instructor.id_trimestre = ".$Trimestre." AND pro.id_programa = ".$Dato;
    // print_r($sql);
    }
    if ($valor==2 && $Dato !=='') {
      // code...

    $sql="SELECT aprendiz.id_persona, instructor.id_persona, aprendiz.id_ficha FROM (SELECT id_persona, id_rol, id_ficha, id_annio, id_trimestre FROM curso WHERE id_rol = 2) instructor INNER JOIN (SELECT id_persona, id_rol, id_ficha, id_annio, id_trimestre FROM curso WHERE id_rol = 1) aprendiz ON ( aprendiz.id_ficha = instructor.id_ficha) INNER JOIN ficha fic ON (fic.id_ficha = aprendiz.id_ficha) INNER JOIN programa pro ON (pro.id_programa = fic.id_programa)  WHERE aprendiz.id_annio = ".$Annio." AND instructor.id_annio = ".$Annio." AND aprendiz.id_trimestre = ".$Trimestre." AND instructor.id_trimestre = ".$Trimestre." AND aprendiz.id_ficha = ".$Dato." AND instructor.id_ficha = ".$Dato;
    // print_r($sql);
    }

    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;

  }
  public function fTraeCursoXProgramaAll($Annio, $Trimestre){
    $sql="SELECT DISTINCT pro.id_programa, pro.nombre_programa FROM curso cur INNER JOIN ficha fic ON(fic.id_ficha = cur.id_ficha) INNER JOIN programa pro ON (pro.id_programa = fic.id_programa) WHERE id_annio = ".$Annio." AND id_trimestre = ".$Trimestre;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
  public function fTraeCursoXFichaAll($Annio, $Trimestre){
    $sql="SELECT DISTINCT fic.id_ficha, pro.id_programa, pro.nombre_programa FROM curso cur INNER JOIN ficha fic ON(fic.id_ficha = cur.id_ficha) INNER JOIN programa pro ON (pro.id_programa = fic.id_programa) WHERE id_annio = ".$Annio." AND id_trimestre = ".$Trimestre;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}
