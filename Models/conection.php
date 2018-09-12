<?php

//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 03/07/2018
//Version: 1.0.0.0

require_once "config.php";

class Conexion{
  protected $conexionBD;
  public function conectar(){
     try {
       // $this->conexionBD = new  PDO("pgsql:host=SERVIDOR;dbname=BASEDAATOS", USUARIODB , CLAVEDB);
       $this->conexionBD = new  PDO('pgsql:host='.SERVIDOR.'; port='.PUERTO.'; dbname='.BASEDAATOS.'; user='.USUARIODB.'; password='.CLAVEDB);
       $this->conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conexionBD->exec("SET NAMES 'UTF8'");
       return $this->conexionBD;
       // return true;
     } catch (Exception $e) {
       echo "Error generado es: " . $e->getline();
     }
  }
}
 ?>
