<?php

class MvcIngreso{

  #INGRESO DE USUARIOS
  #------------------------------------
  public function ingresoUsuarioController(){

    if(isset($_POST["usuarioIngreso"])){

      $datosController = array( "usuario"=>$_POST["usuarioIngreso"],
                      "password"=>$_POST["passwordIngreso"]);

      $respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

      if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

        session_start();

        $_SESSION["validar"] = true;

        header("location:index.php?action=usuarios");

      }

      else{

        header("location:index.php?action=fallo");

      }

    }

  }


}


 ?>
