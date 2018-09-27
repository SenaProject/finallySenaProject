<?php
require_once "../Models/leer.php";

$consultar2= new ConsultaParametros();
$ver2=$consultar2->TraeParametros(0,'tipodocumento');

$consultar3= new ConsultaFicha();
$ver3=$consultar3->TraeFichaAll();

$consultar4= new ConsultaRoles();
$ver4=$consultar4->TraeAllRoles();

?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="css/frm_persona_individual_add.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Evaluacion de Instructores</title>
</head>
<body id="Byfrm1Ppl" style="background-color:WHITE">
  <div class="content_main">
    <div id="DivTitFrm1Ppl" >
      <H1 id="aTitulo">Ingreso manual de persona</H1>
    </div>
    <form action="frm_persona_individual_pl.php" method="post">
      <button type="submit" class="submit_booton" name="Adicions"><- Volver atras</button>
    </form>

    <?php
    echo "<form id='frm1' action='../Controllers/valida_persona_ind.php?valor=CrearPersona' method='post'>";
    echo "<fieldset>";
    echo "    <legend>Nombre de la persona:</legend>";
    echo "<Div id='DivGranDatosBusqueda'>";
    echo "    <div class='contenedor_campos' id='DivDatosBusq'>";
    echo "       <div class='contenedor_labelfield'><label for='NumDoc'>Documento No.:</label>";
    echo "        <input class='input_contenedor' type='number' id='NumDoc' name='NumDoc' maxlength='20' Value='' required = 'required' placeholder = 'Numero de identificacion'/></div>";
    echo "       <div class='contenedor_labelfield'> <label for='TipDoc'>Tipo de Documento:</label>";
    echo "				<select class='input_contenedor' name='tipodocumento' required = 'required'>";
                         echo "<option value='Nulo'></option>";
                  foreach ($ver2 as $valor) {
                         echo "<option value='".$valor[0]."' ".$selec.">".$valor[1]."</option>";
                       }
    echo "				</select></div>";
    echo "    </div><br>";
    echo "    <div class='contenedor_campos' id='DivDatosBusq'>";
    echo "       <div class='contenedor_labelfield'><label for='Apellido1'>Primer Apellido:</label>";
    echo "        <input class='input_contenedor' type='Text' id='Apellido1' name='Apellido1' Value=''  placeholder = 'Primer Apellido' required = 'required'/></div>";
    echo "        <div class='contenedor_labelfield'><label for='Apellido2'>Segundo Apellido:  </label>";
    echo "        <input class='input_contenedor' type='Text' id='Apellido2' name='Apellido2' Value=''   placeholder = 'Segundo Apellido'/></div>";
    echo "    </div><br>";
    echo "    <div class='contenedor_campos' id='DivDatosBusq'>";
    echo "        <div class='contenedor_labelfield'><label for='Nombre1'>Primer Nombre:</label>";
    echo "        <input class='input_contenedor' type='Text' id='Nombre1' name='Nombre1' Value=''  placeholder = 'Primer Nombre' required = 'required'/></div>";
    echo "        <div class='contenedor_labelfield'><label for='Nombre2'>Segundo Nombre : </label>";
    echo "        <input class='input_contenedor'  type='Text' id='Nombre2' name='Nombre2' Value='' placeholder = 'Segundo Nombre'/></div>";
    echo "    </div><br>";
    echo "</fieldset>";
    echo "<fieldset>";
    echo "    <legend>Otros datos de la persona:</legend>";
    echo "    <div class='contenedor_campos' id='DivDatosBusq'>";
    echo "        <div class='contenedor_labelfield'><label for='Estado'>Estado:</label>";
    echo "				<select class='input_contenedor' name='estado' required = 'required'>";
    echo "				  <option value='Nulo'></option>";
    echo "				  <option value='True'>Activo</option>";
    echo "				  <option value='False'>Inactivo</option>";
    echo "				</select></div>";
    // rol
    echo "        <div class='contenedor_labelfield'><label for='nFichaText'>Rol Principal:</label>";
    echo "				<select class='input_contenedor' name='vRol' required = 'required'>";
                         echo "<option value='Nulo' ></option>";
                  foreach ($ver4 as $valor) {
                         echo "<option value='".$valor[0]."'>".$valor[0]." - ".$valor[1]."</option>";
                       }
    echo "				</select></div></div><br>";
    // ficha
    echo "        <div class='contenedor_campos' id='DivDatosBusq'><div class='contenedor_labelfield'><label for='nFichaText'>Ficha Numero:</label>";
    // echo "        <label for='nFichaText2'><a href ='frm_en_blanco.php' >Pulse aqui</a></label>";

    if ($valor[0]==1) {
    echo "				<select class='input_contenedor' name='vFicha' required = 'required'>";
    } else{
    echo "				<select class='input_contenedor' name='vFicha'>";
    }
                         echo "<option value='Nulo' ></option>";
                  foreach ($ver3 as $valor3) {
                         echo "<option value='".$valor3[0]."'>".$valor3[0]." - ".$valor3[1]."</option>";
                       }
    echo "				</select></div>";

    echo "        <div class='contenedor_labelfield'><label for='tAdmin'>Administrador del <br> sistema:</label>";
    echo "				<select class='input_contenedor' name='vAdmin' required = 'required'>";
    echo "          <option value='Nulo' ></option>";
    echo "				  <option value='True'>Si</option>";
    echo "				  <option value='False'>No</option>";
    echo "				</select></div></div>";


    echo "    <br>";
    echo "    <div class='contenedor_campos' id='DivDatosBusq'>";
    echo "       <div class='contenedor_labelfield'> <label for='fnacimiento'>Fecha de nacimiento:</label>";
    echo "        <input class='input_contenedor' type='date' id='fnacimiento' name='fnacimiento' Value='' placeholder = 'Fecha de Naciomiento'/></div>";
    echo "        <div class='contenedor_labelfield'><label for='email'>Correo electronico:</label>";
    echo "        <input class='input_contenedor' type='mail' id='email' name='email' Value=''  placeholder = 'Correo Electronico'  /></div>";
    echo "    </div><br>";
    echo "    <div class='contenedor_campos' id='DivDatosBusq'>";
    echo "        <div class='contenedor_labelfield'><label for='Tel'>Telefono:</label>";
    echo "        <input class='input_contenedor' type='Text' id='Tel' name='Tel' Value='' placeholder = 'Telefono'/></div>";
    echo "        <div class='contenedor_labelfield'><label for='Dir'>Direccion:</label>";
    echo "        <input class='input_contenedor' type='Text' id='Dir' name='Dir' Value=''  placeholder = 'Dirección' /></div>";
    echo "    </div><br>";
    echo "</fieldset>";
    echo "<br>";
    echo "    <div id='BtnFrm1Ppl' class='button'>";
    echo "        <button class='submit_form submit_booton' Id='btnG' type='submit'>Guardar</button>";
    echo "        <button Id='btnC' class='cancelar_booton submit_booton' type='reset'>Cancelar</button>";
    echo "    </div>";
    echo "</Div>";
    echo "</form>";
    ?>
  </div>
</body>
</body>
<footer></footer>
</html>
