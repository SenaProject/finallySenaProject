<h1>INGRESAR</h1>

	<form method="post">

		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>

		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

		<input type="submit" value="Enviar">

	</form>

<?php
require_once "Controllers/ingresoDeUsuarios.php";
$ingreso = new MvcIngreso();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";

	}

}

?>
