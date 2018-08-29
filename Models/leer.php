/*
lee registros dentro de las tablas
*/
<?php
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
  public function TraePersona($IdPersona, $BtnM){

    $sql="SELECT '.$BtnM.' , per.id_persona, fn_persona_nom_com(per.id_persona), per.estado_persona, per.fecha_nacimiento, per.correo_electronico, per.telefono, per.direccion FROM persona per WHERE per.id_persona = " . $IdPersona;
    $sentencia=$this->conexionBD->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetch();
    $sentencia->closeCursor();
    //print_r($sentencia);
    print_r($resultado[0]);
    return $resultado;
    $this->conexionBD=null;
  }
}


 ?>
