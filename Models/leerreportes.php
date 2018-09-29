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
        $resultado=$sentencia->fetch();
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




 ?>
