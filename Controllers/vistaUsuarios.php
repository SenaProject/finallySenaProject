<?php

class MvcConsulta{
  #VISTA DE USUARIOS
  #------------------------------------

  public function vistaUsuariosController(){

    $respuesta = Datos::vistaUsuariosModel("usuarios");

    #El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

    foreach($respuesta as $row => $item){
    echo'<tr>
        <td>'.$item["usuario"].'</td>
        <td>'.$item["password"].'</td>
        <td>'.$item["email"].'</td>
        <td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
        <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
      </tr>';

    }

  }
}




 ?>
