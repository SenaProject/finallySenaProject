<!DOCTYPE html>
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
 <h1><label for="">CREACION FORMULARIO DE EVALUACION</label></h1>

          <label for="">ID Encuesta:</label>
		  
          <textbox type="text" id="new_ask" name="pregunta" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="001-1">000-01"trae ID Evaluacion"
           </textbox>

<div>&nbsp;</div>
               <label for="">Ficha:</label><select name="instructores">
                <option value="1">1298372</option>
                <option value="2">0000147</option>
                <option value="3">1234567</option>
                <option value="10">7894562</option>
                <option value="11">9632147</option>
                <option value="12">9512357</option>
                </select>

<div>&nbsp;</div>
                <label for="">Instructor:</label><select name="instructores">
                <option value="1">Oscar Benavides</option>
                <option value="2">luis Hernando Prieto</option>
                <option value="3">karol</option>
                <option value="10">lenin Campos</option>
                <option value="11">Andres Posada</option>
                <option value="12">Natalia Mancera</option>
                </select>



                <form action="">
              <h3>  <label for="">Preguntas</label></h3>

    <input type="radio" name="p1" value="male">p1<br>
    <input type="radio" name="p2" value="female">p2<br>
    <input type="radio" name="p3" value="male">p3<br>
    <input type="radio" name="p4" value="female">p4<br>
    <input type="radio" name="p5" value="male">p5<br>
    <input type="radio" name="p6" value="female">p6<br>
    <input type="radio" name="p7" value="other">p7<br>
  </form>


  <form action="">
<h3>  <label for="">Respuestas</label></h3>

<input type="radio" name="r1" value="male">r1<br>
<input type="radio" name="r2" value="female">r2<br>
<input type="radio" name="r3" value="male">r3<br>
<input type="radio" name="r4" value="female">r4<br>
<input type="radio" name="r5" value="male">r5<br>
<input type="radio" name="r6" value="female">r6<br>
<input type="radio" name="r7" value="other">r7<br>
</form>
  <div>&nbsp;</div>  

                <button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                    Crear Formulario
               </button>
               <button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                   Modificar
               </button>
               <button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                   Eliminar
               </button>
               </form>
               <form name="form" action="preguntas" method="Post">
                   <input type="hidden" id="form" name="formulario" value="<%=variable.Form(formulario)%>"/>
                   <br>
</html>
