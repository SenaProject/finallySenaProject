<?php

class MvcEliminar{
  #BORRAR USUARIO
  #------------------------------------
  public function borrarUsuarioController(){

    if(isset($_GET["idBorrar"])){

      $datosController = $_GET["idBorrar"];

      $respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

      if($respuesta == "success"){

        header("location:index.php?action=usuarios");

      }

    }

  }

  }



}



 ?>
