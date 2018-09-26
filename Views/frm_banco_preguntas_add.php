<?php
require "../Models/leer.php";

$consultar1= new ConsultaGrupoPregunta();
$ver1=$consultar1->TraeGrupoPregunta();

$consultar2= new ConsultaBanRespuesta();
$ver2=$consultar2->TraeBanRespuesta();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Evaluacion de Instructores</title>
        <!-- <link href="css/frm_banco_preguntas_add.css" rel="stylesheet" type="text/css"/> -->
        <style type="text/css">
h2 { color: red; font-family: Arial; font-size: large; }
/*{ color: gray; font-family: Verdana; font-size: medium; }*/
label { color: black; font-family: Arial; }
</style>
    </head>
    <a href ="frm_banco_preguntas.php">Volver a tras</a>
    <center>
    <body>
        <form class="contact_form" action="../Controllers/valida_pregunta_ind.php?valor=CrearPregunta" method="post" name="contact_form" >
            <ul>
                <li>
                    <h2>Ingreso manual de preguntas</h2>
                    <span class="required_notification">* Denotes Required Field</span>
                </li>
                <li>
                  <?php
echo "        <label for='GruPre'>Grupo de Pregunta</label>";
echo "				<select name='grupopregunta' class='form-control' required = 'required'>";
				               echo "<option value='Nulo'></option>";
				        foreach ($ver1 as $valor) {
                       echo "<option value='".$valor[0]."' ".$selec.">".$valor[1]."</option>";
                     }
echo "				</select>";
?>
                </li>
            </ul>
            <ul>
                <li>
                    <label for="text">Descripcion</label>
                    <textarea name="descripcionpregunta" cols="40" rows="6" required ></textarea>
                </li>
                <li>
                  <?php
echo "        <label for='TipRes'>Grupo de Respuesta</label>";
echo "				<select name='tiporespuesta' required = 'required'>";
echo "<option value='Nulo'></option>";
              foreach ($ver2 as $valor) {
echo "<option value='".$valor[0]."' ".$selec.">".$valor[1]."</option>";                   }
echo "				</select>";
                    ?>
                </li>
                <li>
                    <button class="submit" type="submit">Guardar</button>
                    <button class="reset" type="reset">Cancelar</button>
                </li>
            </ul>
        </form>
    </body>
  </center>
</html>
