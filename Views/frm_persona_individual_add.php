<?php
require "../Models/leer.php";

$consultar2= new ConsultaParametros();
$ver2=$consultar2->TraeParametros(0,'tipodocumento');

$consultar3= new ConsultaFicha();
$ver3=$consultar3->TraeFichaAll();

$consultar4= new ConsultaRoles();
$ver4=$consultar4->TraeAllRoles();

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html >
 <link rel="stylesheet" href="css/Personascss.css">
<head>
<div id="DivLogoInst">

</div>
<title>Evaluacion de Instructores</title>
<div id="DivTitFrm1Ppl" >
	<H1 id="aTitulo">Ingreso manual de persona</H1>
	<br>
</div>
</head>
<body id="Byfrm1Ppl" style="background-color:WHITE">

<a href ="frm_persona_individual_pl.php">Volver a tras</a>
<?php
echo "<form id='frm1' action='../Controllers/valida_persona_ind.php?1' method='post'>";
echo "<fieldset>";
echo "    <legend>Nombre de la persona:</legend>";
echo "<Div id='DivGranDatosBusqueda'>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='NumDoc'>Documento No.:</label>";
echo "        <input type='Text' id='NumDoc' name='NumDoc' maxlength='20' Value='' required = 'required' placeholder = 'Numero de identificacion'/>";
echo "        <label for='TipDoc'>Tipo de Documento:</label>";
echo "				<select name='tipodocumento' required = 'required'>";
				               echo "<option value='Nulo'></option>";
				        foreach ($ver2 as $valor) {
                       echo "<option value='".$valor[0]."' ".$selec.">".$valor[1]."</option>";
                     }
echo "				</select>";
echo "    </div><br>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Apellido1'>Primer Apellido</label>";
echo "        <input type='Text' id='Apellido1' name='Apellido1' Value=''  placeholder = 'Primer Apellido'/>";
echo "        <label for='Apellido2'>Segundo Apellido</label>";
echo "        <input type='Text' id='Apellido2' name='Apellido2' Value=''   placeholder = 'Segundo Apellido'/>";
echo "    </div><br>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Nombre1'>Primer Nombre:</label>";
echo "        <input type='Text' id='Nombres1' name='Nombres1' Value=''  placeholder = 'Primer Nombre' />";
echo "        <label for='Nombre2'>Segundo Nombre:</label>";
echo "        <input type='Text' id='Nombres2' name='Nombres2' Value='' placeholder = 'Segundo Nombre'/>";
echo "    </div><br>";
echo "</fieldset>";
echo "<fieldset>";
echo "    <legend>Otros datos de la persona:</legend>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Estado'>Estado:</label>";
echo "				<select name='estado' required = 'required'>";
echo "				  <option value='Nulo'></option>";
echo "				  <option value='True'>Activo</option>";
echo "				  <option value='False'>Inactivo</option>";
echo "				</select>";
// ficha
echo "        <label for='nFichaText'>Ficha Numero:</label>";
// echo "        <label for='nFichaText2'><a href ='frm_en_blanco.php' >Pulse aqui</a></label>";
echo "				<select name='vFicha' required = 'required'>";
				               echo "<option value='Nulo' ></option>";
				        foreach ($ver3 as $valor) {
                       echo "<option value='".$valor[0]."'>".$valor[0]." - ".$valor[1]."</option>";
                     }
echo "				</select>";
// rol
echo "        <label for='nFichaText'>Rol Principal:</label>";
echo "				<select name='vRol' required = 'required'>";
				               echo "<option value='Nulo' ></option>";
				        foreach ($ver4 as $valor) {
                       echo "<option value='".$valor[0]."'>".$valor[0]." - ".$valor[1]."</option>";
                     }
echo "				</select>";
echo "        <label for='tAdmin'>Estado:</label>";
echo "				<select name='vAdmin' required = 'required'>";
echo "          <option value='Nulo' ></option>";
echo "				  <option value='True'>Si</option>";
echo "				  <option value='False'>No</option>";
echo "				</select>";


echo "    </div><br>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='fnacimiento'>Fecha de nacimiento:</label>";
echo "        <input type='date' id='fnacimiento' name='fnacimiento' Value='' placeholder = 'Fecha de Naciomiento'/>";
echo "        <label for='email'>Correo electronico:</label>";
echo "        <input type='mail' id='email' name='email' Value=''  placeholder = 'Correo Electronico'  size='60'/>";
echo "    </div><br>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='Tel'>Telefono:</label>";
echo "        <input type='Text' id='Tel' name='Tel' Value='' placeholder = 'Telefono'/>";
echo "        <label for='Dir'>Direccion:</label>";
echo "        <input type='Text' id='Dir' name='Dir' Value=''  placeholder = 'Dirección' size='60'/>";
echo "    </div><br>";
echo "</fieldset>";
echo "<br>";
echo "    <div id='BtnFrm1Ppl' class='button'>";
echo "        <button Id='btnG' type='submit'>Guardar</button>";
echo "        <button Id='btnC' type='reset'>Cancelar</button>";
echo "    </div>";
echo "</Div>";
echo "</form>";
 ?>
</body>
</html>
