<!Autor: Pablo Emilio Garcia>
<!Fecha: 24/08/2018>
<!Version:>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html >
 <link rel="stylesheet" href="css/inicio.css">
<head>
<title>Ingreso de Personas</title>
<div id="DivTitFrm1Ing" >
	<img id="LogoInst" src="image/sena.jpg">
	<a id="aTitulo">Ingreso al sistema de Evaluacion de Instructores</a>
</div>
</head>
<body id="Byfrm1Ini" style="background-color:WHITE">
<?php
echo "<form id='frm1inicio' action='../Controllers/valida_inicio.php' method='POST'>";
echo "<div id= 'dUsuario'>";
echo        "<label  for='lUsua'>Usuario:</label>";
echo	"</div>";
echo	"<div id='dUsuario'>";
echo        "<input type='tUsua' id='Usuario' name='Usuario1' value = '79569257' placeholder='Ingrese su usuario'/>";
echo    "</div><br>";
echo    "<div id='dPwd'>";
echo        "<label id= 'LbPwd' for='lPwd'>Contraseña:</label>";
echo	"</div>";
echo	"<div id='dPwd'>";
echo        "<input type='password' id='Pwd' name ='Pwd1' placeholder='Ingrese su contraseña'/>";
echo    "</div><br>";
echo    "<div id='BtnFrm1Ini' class='button'>";
echo        "<button Id='btnIn' type='submit'>Ingresar</button>";
echo		"<button Id='btnCanc' type='submit'>Cancelar</button>";
echo    "</div>";
echo "</form>";
?>
</body>
</html>
