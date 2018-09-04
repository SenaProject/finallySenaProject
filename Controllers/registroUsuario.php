<?php

class MvcRegistro{

  #REGISTRO DE USUARIOS
  #------------------------------------
  public function registroUsuarioController(){

    if(isset($_POST["usuarioRegistro"])){

      $datosController = array( "usuario"=>$_POST["usuarioRegistro"],
                      "password"=>$_POST["passwordRegistro"],
                      "email"=>$_POST["emailRegistro"]);

      $respuesta = Datos::registroUsuarioModel($datosController, "usuario");

      if($respuesta == "success"){
        
        header("location:index.php?action=ok");

      }

      else{

        header("location:index.php");
      }

    }

  }




}




 ?>
