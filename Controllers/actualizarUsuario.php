<?php

class MvcActualizar{
  #ACTUALIZAR USUARIO
  #------------------------------------
  public function actualizarUsuarioController(){

    if(isset($_POST["usuarioEditar"])){

      $datosController = array( "id"=>$_POST["idEditar"],
                        "usuario"=>$_POST["usuarioEditar"],
                              "password"=>$_POST["passwordEditar"],
                              "email"=>$_POST["emailEditar"]);

      $respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

      if($respuesta == "success"){

        header("location:index.php?action=cambio");

      }

      else{

        echo "error";

      }

    }

  }





}


 ?>
