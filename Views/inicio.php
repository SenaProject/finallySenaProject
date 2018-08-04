<!Autor: Pablo Emilio Garcia>
<!Fecha: 04/06/2018>
<!Version:>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html >
 <link rel="stylesheet" href="Views/css/inicio.css">
<head>
<title>Ingreso de Personas</title>
<div id="DivTitFrm1Ing" >
	<img id="LogoInst" src="Views/image/sena.jpg">
	<a id="aTitulo">Ingreso al sistema de Evaluacion de Instructores</a>
</div>
</head>
<body id="Byfrm1Ini" style="background-color:WHITE">

<form id="frm1inicio" action="Views/frm_principal.php" method="post">
    <div id= "dUsuario">
        <label  for="lUsua">Usuario:</label>
	</div>
	<div id="dUsuario">
        <input type="tUsua" id="Usuario" placeholder="Ingrese su usuario"/>
    </div><br>
    <div id="dPwd">
        <label id= "LbPwd" for="lPwd">Contraseña:</label>
	</div>
	<div id="dPwd">
        <input type="password" id="Pwd" placeholder="Ingrese su contraseña"/>
    </div><br>
    <div id="BtnFrm1Ini" class="button">
        <button Id="btnIn" type="submit">Ingresar</button>
		<button Id="btnCanc" type="submit">Cancelar</button>
    </div>
</form>
</body>
</html>
