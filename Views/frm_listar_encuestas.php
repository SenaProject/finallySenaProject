 ﻿<!DOCTYPE html>
 <!Autor: Maycol Andrei Nuñez>
<!Fecha: 28/07/2018>
<!Version:1>


<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/Frm_Principal.css">

    <link rel="stylesheet" href="Frm_Principal">
    <meta charset="utf-8">

    <title>Evaplus +</title>
    <script>
      function cerrar()
    	{
    	 window.close();
       }
    </script>
  </head>

<form name="form" method="POST">
       <input type="hidden" id="form" name="formulario" value="<%=variable.Form(formulario)%>"/><br>
 <h1><center><label for="">ADMINISTRACION EVALUACIONES<label></center></h1>
<div>

<label for="">Usuario: </label>

           <textbox type="text" id="new_ask" name="pregunta" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="001-1">mnunez
           </textbox>
<br>
<label for="">Rol: </label>

           <textbox type="text" id="new_ask" name="pregunta" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="001-1">administrador
           </textbox>

<br>

    <label for="">Fecha: </label>

              <textbox type="text" id="fich" name="fichas" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="fichas">01/08/2018
              </textbox>
<div>&nbsp;</div>

</div>

 <h1><center><label for="">EVALUACIONES</label></center></h1>

<table style="width:40%">
  <tr>
    <th>ID Evaluacion</th>
    <th>Fecha Creacion</th>
    <th>Fecha Cierre</th>
	<th>Ficha</th>
	<th>Estado</th>


  </tr>
  <tr>
    <td>000-01</td>
    <td>10/08/2018</td>
    <td>25/09/2018</td>
	<td>1298372</td>
	<td><input type="radio" name="estado1" value="male"></td>


  </tr>
  <tr>
    <td>000-02</td>
    <td>10/09/2017</td>
    <td>10/09/2018</td>
	<td>1258749</td>
	<td><input type="radio" name="estado2" value="male"></td>
  </tr>
</table>


 <div>&nbsp;</div>


       <div>&nbsp;</div>
                <button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                    Guardar
               </button>

               <button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                   Cancelar
               </button>
               </form>
               <form name="form" action="preguntas" method="Post">
                   <input type="hidden" id="form" name="formulario" value="<%=variable.Form(formulario)%>"/>
                   <br>
</html>
