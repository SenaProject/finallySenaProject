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

<a href "frm_persona_individual_pl.php">Volver a tras</a>
<?php
// <form id="frm1" action="/buscar.php" method="post">
// <Div id="DivGranDatosBusqueda">
//     <div id="DivDatosBusq">
//         <label for="NumDoc">Documento No.:</label>
//         <input type="Text" id="NumDoc" Value="79569257" required = "required"/>
//     </div><br>
//     <div id="DivDatosBusq">
//         <label for="Apellido1">Primer Apellido</label>
//         <input type="Text" id="Apellido1" Value="Garcia" required = "required"/>
//         <label for="Apellido2">Segundo Apellido</label>
//         <input type="Text" id="Apellido2" Value="Pulido" />
//     </div><br>
//     <div id="DivDatosBusq">
//         <label for="Nombre1">Primer Nombre:</label>
//         <input type="Text" id="Nombres1" Value="Edwin" required = "required"/>
//         <label for="Nombre2">Segundo Nombre:</label>
//         <input type="Text" id="Nombres2" Value="Aaron"/>
//     </div><br>
//     <div id="DivDatosBusq">
//         <label for="Estado">Estado:</label>
// 				<select name="estado" required = "required">
// 				  <option value="Nulo"></option>
// 				  <option value="Activo">Activo</option>
// 				  <option value="Inactivo">Inactivo</option>
// 				</select>
//     </div><br>
//
//     <div id="DivDatosBusq">
//         <label for="fnacimiento">Fecha de nacimiento:</label>
//         <input type="Text" id="fnacimiento" Value="16/07/1998"/>
//     </div><br>
//     <div id="DivDatosBusq">
//         <label for="email">Correo electronico:</label>
//         <input type="Text" id="Ficha" Value="eagp@gmail.com"/>
//     </div><br>
//     <div id="DivDatosBusq">
//         <label for="Tel">Telefono:</label>
//         <input type="Text" id="Ficha" Value="3102009988"/>
//     </div><br>
//     <div id="DivDatosBusq">
//         <label for="Dir">Direccion:</label>
//         <input type="Text" id="Ficha" Value="Calle 7 No 94 79 Casa 133"/>
//     </div><br>
//
//     <div id="BtnFrm1Ppl" class="button">
//         <button Id="btnN" type="submit">Nuevo</button>
// 		     <button Id="btnM" type="submit">Modificar</button>
//         <button Id="btnE" type="submit">Eliminar</button>
//         <button Id="btnB" type="submit">Buscar</button>
//         <button Id="btnG" type="submit">Guardar</button>
//     </div>
// </Div>
// </form>
echo "<form id='frm1' action='../Controllers/valida_persona_ind.php?1' method='post'>";
echo "<fieldset>";
echo "    <legend>Nombre de la persona:</legend>";
echo "<Div id='DivGranDatosBusqueda'>";
echo "    <div id='DivDatosBusq'>";
echo "        <label for='NumDoc'>Documento No.:</label>";
echo "        <input type='Text' id='NumDoc' name='NumDoc' maxlength='20' Value='79569257' required = 'required' placeholder = 'Numero de identificacion'/>";
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
echo "				  <option value='Activo'>Activo</option>";
echo "				  <option value='Inactivo'>Inactivo</option>";
echo "				</select>";
echo "    </div><br>";
// echo "";
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
echo "    </div>";
echo "</Div>";
echo "</form>";
 ?>
</body>
</html>
