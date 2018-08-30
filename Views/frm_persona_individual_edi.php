<?php
require "../Models/leer.php";

$consultar= new ConsultaPersona();
$ver=$consultar->TraePersona($_GET['valor']);
 ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html >
 <link rel="stylesheet" href="css/Personascss.css">
<head>
<title>Evaluacion de Instructores</title>
<div id="DivTitFrm1Ppl" >
	<H1 id="aTitulo">Modificacion manual de persona</H1>
	<br>
</div>
</head>
<body id="Byfrm1Ppl" style="background-color:WHITE">

<a href ="frm_persona_individual_pl.php">Volver a tras</a>
<?php

echo "<form id='frm1' action='../Controllers/valida_persona_ind.php?1' method='post'>";
echo "<fieldset>";
echo "    <legend>Nombre de la persona: ".$ver[5]."</legend>";
echo "<Div id='DivGranDatosBusqueda'>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='NumDoc'>Documento No.:</label>";
echo "        <input type='Text' id='NumDoc' name='NumDoc' maxlength='20' Value='".$ver[0]."' required = 'required' placeholder = 'Numero de identificacion'/>";
echo "    </div><br>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Apellido1'>Primer Apellido</label>";
echo "        <input type='Text' id='Apellido1' name='Apellido1' Value='".$ver[3]."'  placeholder = 'Primer Apellido'/>";
echo "        <label for='Apellido2'>Segundo Apellido</label>";
echo "        <input type='Text' id='Apellido2' name='Apellido2' Value='".$ver[4]."'   placeholder = 'Segundo Apellido'/>";
echo "    </div><br>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Nombre1'>Primer Nombre:</label>";
echo "        <input type='Text' id='Nombres1' name='Nombres1' Value='".$ver[1]."'  placeholder = 'Primer Nombre' />";
echo "        <label for='Nombre2'>Segundo Nombre:</label>";
echo "        <input type='Text' id='Nombres2' name='Nombres2' Value='".$ver[2]."' placeholder = 'Segundo Nombre'/>";
echo "    </div><br>";
echo "</fieldset>";
echo "<fieldset>";
echo "    <legend>Otros datos de la persona:</legend>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Estado'>Estado:</label>";
echo "				<select name='estado' required = 'required'>";
echo "				  <option value='Nulo' ></option>";
                  if ($ver[6] == True){echo "<option value='Activo' selected>Activo</option>";}
                     else {echo "<option value='Activo'>Activo</option>";};                  
                  if ($ver[6] == False){echo "<option value='Inactivo' selected>Activo</option>";}
                     else {echo "<option value='Inactivo'>Inactivo</option>";};
// echo "				  <option value='Inactivo'".if ($ver[6] == false){echo "selected";}.">Inactivo</option>";
echo "				</select>";
echo "    </div><br>";
// echo "";".."
echo "    <div id='DivDatosBusq'>";
echo "        <label for='fnacimiento'>Fecha de nacimiento:</label>";
echo "        <input type='date' id='fnacimiento' name='fnacimiento' Value='".$ver[7]."' placeholder = 'Fecha de Naciomiento'/>";
echo "        <label for='email'>Correo electronico:</label>";
echo "        <input type='mail' id='email' name='email' Value='".$ver[8]."'  placeholder = 'Correo Electronico'  size='60'/>";
echo "    </div><br>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Tel'>Telefono:</label>";
echo "        <input type='Text' id='Tel' name='Tel' Value='".$ver[9]."' placeholder = 'Telefono'/>";
echo "        <label for='Dir'>Direccion:</label>";
echo "        <input type='Text' id='Dir' name='Dir' Value='".$ver[10]."'  placeholder = 'Dirección' size='60'/>";
echo "    </div><br>";
echo "</fieldset>";
echo "<br>";
// con input
// echo "";
// echo "    <div id='BtnFrm1Ppl'>";
// echo "        <input Id='btnN' name='btnN' type='submit' Value= 'Nuevo'>";
// echo "		    <input Id='btnN' name='btnM' type='submit' Value= 'Modifica'>";
// echo "        <input Id='btnE' name='btnE' type='submit' Value= 'Elimina'>";
// echo "        <input Id='btnB' name='btnB' type='submit' Value= 'Buscar'>";
// echo "        <input Id='btnG' name='btnG' type='submit' Value= 'Guardar'>";
// echo "    </div>";
// con button
echo "    <div id='BtnFrm1Ppl' class='button'>";
echo "        <button Id='btnG' type='submit'>Guardar</button>";
echo "        <button Id='btnC' type='reset'>Cancelar</button>";
echo "    </div>";
echo "</Div>";
echo "</form>";
 ?>
</body>
</html>
