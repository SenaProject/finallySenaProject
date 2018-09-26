<!DOCTYPE html>

<head>
	<title>Ingresa de Persona</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/inicio.css" rel="stylesheet" type="text/css"/>

</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form id='frm1inicio' action='../Controllers/valida_inicio.php' method='POST'>
					<span class="login100-form-ico">
						<img src="image/ima_evaplus.jpg" class="logoingreso">
					</span>
					<span class="login100-form-title p-b-50">
                                            <h3>Bienvenido</h3>
					</span>
					<span class="login100-form-avatar">
						<!-- <img src="image/79569257.jpg" alt="AVATAR"> -->
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
              <input class="input100" type="tUsua" name="Usuario1" value="" required="">
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
              <input class="input100" type="password" name="Pwd1" required="">
						<span class="focus-input100" data-placeholder="Ingrese su contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Ingresar
						</button>
					</div>
				</form>
				<a href="frm_terminos_condiciones.php">Ver Terminos y Condiciones</a>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

</body>
