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
 <h1><center><label for="">SENA CENTRO DE DISEÑO Y METROLOGIA</label></center></h1>


<h3><label for="">Informacion Basica</label></h3>


<label for="">ID Evaluacion:</label>

           <textbox type="text" id="new_ask" name="pregunta" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="001-1">001-1
           </textbox>
<br>

    <label for="">Ficha:</label>

              <textbox type="text" id="fich" name="fichas" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="fichas">1298372
              </textbox>
<br>
<label for="">Instructor:</label>

       <textbox type="text" id="new_ask" name="pregunta" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="001-1">oscar benavides
       </textbox>
<br>

<label for="">Aprendiz:</label>

       <textbox type="text" id="new_ask" name="pregunta" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="001-1">Maycol Nunez
       </textbox>
<br>

<label for="">Fecha:</label>

   <textbox type="text" id="new_ask" name="pregunta" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required="001-1">01/08/2018
       </textbox>

<div>&nbsp;</div>



 <h2><center><label for="">EVALUACION INSTRUCTORES</label></center></h2>

<h4><label for="">a continuacion seleccione de uno a 5 la respuesta que mas se acerque a la realidad segun su criterio donde : </label></h4>

<label for="">1=pesimo</label><br>
<label for="">2=malo</label><br>
<label for="">3=regular</label><br>
<label for="">4=bueno</label><br>
<label for="">5=excelente</label><br>

<div>&nbsp;</div>

<h3><label for="">Pregunta 1</label></h3>
 
 <h4><label for="">el instructor acude puntualmente al ambiente de formacion? </label></h4>

  <tr>
<td><input type="radio" name="calif" value="macabro">1</td>    
<td><input type="radio" name="calif" value="malo">2</td>
<td><input type="radio" name="calif" value="regular">3</td>	
<td><input type="radio" name="calif" value="bueno">4</td>	
<td><input type="radio" name="calif" value="excelente">5</td>
  </tr> 	

 <h3><label for="">Observaciones (opcional)</label></h3>

<textarea type="text" id="new_ask" name="OBS" onkeydown="valida_longitud()" onkeyup="valida_longitud()" required=""  rows="3" cols="53">
</textarea>



<div>&nbsp;</div>
	    	
		<button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                    Guardar Pregunta
               </button>
		
<button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                   Borrar
               </button>
		
                <button type="submit" class="btn btn-success btn-sm" onclick="this.form.action = 'New_Ask'">
                   <span class="glyphicon glyphicon-ok"></span>
                    Guardar Evaluacion
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
