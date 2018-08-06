<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html >
 <link rel="stylesheet" href="css/Personascss.css">
<head>
<div id="DivLogoInst">

</div>
<title>Evaluacion de Instructores</title>
<div id="DivTitFrm1Ppl" >
	<H1 id="aTitulo">Ingreso manual de personal </H1>
	<br>
</div>
</head>
<body id="Byfrm1Ppl" style="background-color:WHITE">
<form id="frm1" action="/buscar.php" method="post">
<Div id="DivGranDatosBusqueda">
    <div id="DivDatosBusq">
        <label for="NumDoc">Documento No.:</label>
        <input type="Text" id="NumDoc" Value="79569257" />
    </div><br>
    <div id="DivDatosBusq">
        <label for="Apellido1">Primer Apellido</label>
        <input type="Text" id="Apellido1" Value="Garcia" />
        <label for="Apellido2">Segundo Apellido</label>
        <input type="Text" id="Apellido2" Value="Pulido" />
    </div><br>
    <div id="DivDatosBusq">
        <label for="Nombre1">Primer Nombre:</label>
        <input type="Text" id="Nombres1" Value="Edwin"/>
        <label for="Nombre2">Segundo Nombre:</label>
        <input type="Text" id="Nombres2" Value="Aaron"/>
    </div><br>
    <div id="DivDatosBusq">
        <label for="Estado">Estado:</label>
				<select name="estado">
				  <option value="Nulo"></option>
				  <option value="Activo">Activo</option>
				  <option value="Inactivo">Inactivo</option>
				</select>
    </div><br>

    <div id="DivDatosBusq">
        <label for="fnacimiento">Fecha de nacimiento:</label>
        <input type="Text" id="fnacimiento" Value="16/07/1998"/>
    </div><br>
    <div id="DivDatosBusq">
        <label for="Ficha">Ficha No.:</label>
        <input type="Text" id="Ficha" Value="1298372"/>
    </div><br>
    <div id="DivDatosBusq">
        <label for="email">Correo electronico:</label>
        <input type="Text" id="Ficha" Value="eagp@gmail.com"/>
    </div><br>
    <div id="DivDatosBusq">
        <label for="Tel">Telefono:</label>
        <input type="Text" id="Ficha" Value="3102009988"/>
    </div><br>
    <div id="DivDatosBusq">
        <label for="Dir">Direccion:</label>
        <input type="Text" id="Ficha" Value="Calle 7 No 94 79 Casa 133"/>
    </div><br>

    <div id="BtnFrm1Ppl" class="button">
        <button Id="btnN" type="submit">Nuevo</button>
		<button Id="btnM" type="submit">Modificar</button>
        <button Id="btnE" type="submit">Eliminar</button>
        <button Id="btnB" type="submit">Buscar</button>
        <button Id="btnG" type="submit">Guardar</button>
    </div>
</Div>
</form>

</body>
</html>
