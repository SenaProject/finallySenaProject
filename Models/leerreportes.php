<?php

require_once "conection.php";


class ReporteEvaluacion extends Conexion{

  public function ReporteEvaluacion(){
    parent::conectar();
  }

  public function fReporteEvaluacion($IdEvaluacion){

    $sql="SELECT fn_persona_nom_com(ed.id_instructor), bp.descripcion, ir.descripcion, count(*) FROM evaluacion_detalle ed LEFT JOIN item_respuesta ir ON(ir.id_item_respuesta = ed.respuesta) INNER JOIN banco_pregunta bp ON (bp.id_pregunta = ed.id_pregunta)where ed.id_evaluacion = ".$IdEvaluacion." group by ed.id_instructor, bp.descripcion ,ir.descripcion order by 2" ;
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchall();
    $sentencia->closeCursor();
    // print_r($sentencia);
    //print_r($resultado[0]);
    return $resultado;
    $this->conexionBD=null;
  }
  function fReporteEvaluacionM(){

        $sql="SELECT id_evaluacion, fecha_inicio, fecha_final FROM evaluacion" ;
        $sentencia=$this->conexionBD->prepare($sql);
        $sentencia->execute();
        $resultado=$sentencia->fetchall();
        $sentencia->closeCursor();
        return $resultado;
        $this->conexionBD=null;
  }

  function fReporteEvaM($IdEvaluacion){

        $sql="SELECT id_evaluacion, fecha_inicio, fecha_final FROM evaluacion WHERE  id_evaluacion =".$IdEvaluacion ;
        $sentencia=$this->conexionBD->prepare($sql);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        $sentencia->closeCursor();
        return $resultado;
        $this->conexionBD=null;
  }
  function fReporteNoApren($IdEvaluacion){

        $sql="SELECT count(*) from (SELECT DISTINCT id_aprendiz FROM evaluacion_detalle WHERE  id_evaluacion =".$IdEvaluacion.") as subaprendiz" ;
        $sentencia=$this->conexionBD->prepare($sql);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        $sentencia->closeCursor();
        return $resultado;
        $this->conexionBD=null;
  }
}

class ReportePersona extends Conexion{

  public function ReportePersona(){
    parent::conectar();
  }

  public function fReportePersona(){

    $sql="SELECT per.id_persona,
                 per.apellido_uno,
                 per.apellido_dos,
                 per.nombre_uno,
                 per.nombre_dos,
                 fn_persona_nom_com(per.id_persona),
                 per.fecha_nacimiento,
                 per.direccion,
                 per.telefono,
                 per.correo_electronico,
                 par.detalle
            FROM persona per
           INNER JOIN parametro par
                 ON(par.id_parametro = per.id_tipo_documento)
           ORDER BY 2,3,4,5";
    // print_r($sql);
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchall();
    $sentencia->closeCursor();
    return $resultado;
    $this->conexionBD=null;
  }
}


class ReporteFichas extends Conexion{

  public function ReporteFichas(){
    parent::conectar();
  }

  public function fReporteFichas($IdPersona){
    $sql="SELECT id_ficha,
                 id_persona,
                 id_rol
            FROM ficha_persona_rol
           WHERE id_persona = ".$IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchall();
    $sentencia->closeCursor();
    try {
    return $resultado;
    } catch (\Exception $e) {
    return 0;
    }


    $this->conexionBD=null;
  }
}

class ReporteCursoAll extends Conexion{

  public function ReporteCursoAll(){
    parent::conectar();
  }


    public function fReporteCursoAll(){
      $sql="SELECT DISTINCT cur.id_annio, pr1.detalle, id_trimestre, pr2.detalle, id_ficha FROM curso cur INNER JOIN parametro pr1 ON(pr1.id_parametro = cur.id_annio) INNER JOIN parametro pr2 ON(pr2.id_parametro = cur.id_trimestre)";
      $sentencia=$this->conexionBD->prepare($sql);
      $sentencia->execute();
      $resultado=$sentencia->fetchall();
      $sentencia->closeCursor();
      try {
      return $resultado;
      } catch (\Exception $e) {
      return 0;
      }
      $this->conexionBD=null;
    }

  public function fReporteCurso($IdAnnio,$IdTrimestre,$IdFicha){
    $sql=" SELECT fn_persona_nom_com(id_persona), id_rol
      FROM curso
     WHERE id_annio = ".$IdAnnio." AND id_trimestre = ".$IdTrimestre." AND id_ficha = ".$IdFicha;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchall();
    $sentencia->closeCursor();
    try {
    return $resultado;
    } catch (\Exception $e) {
    return 0;
    }
    $this->conexionBD=null;
  }
}
 ?>
