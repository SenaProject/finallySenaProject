<?php

class MvcEditar{

  #EDITAR USUARIO
  #------------------------------------

  public function editarUsuarioController(){

    $datosController = $_GET["id"];
    $respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

    echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

       <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>

       <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

       <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

       <input type="submit" value="Actualizar">';

  }



}



 ?>
