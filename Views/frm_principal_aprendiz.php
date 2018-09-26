<!DOCTYPE html>
<!Autor: Pablo Emilio Garcia>
<!Fecha: 04/06/2018>
<!Version: >
<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/frm_principal.css">
    <meta charset="utf-8">
    <title>Evaplus +</title>
  </head>
  <body>

    <footer>
      <div class="footer_main">
        <img src="image/ima_evaplus.jpg" width="100px" height="50px" alt="">
        <?php
        $User = $_GET['user'];
        $NomCom = $_GET['valor'];
          echo "<div class='title_user'><h2 width='100px' height='50px'>Usuario: ".$User." - ".$NomCom."</h2></div>";
          // print_r($UsuarioApp);
        ?>
      </div>
    <nav class="nav_main">
      <ul>

         <li><a>Archivo</a>
              <ul>
                <li><a></a></li>
                <li><a></a></li>
                <li><a></a></li>
                <li><a href='frm_cerrar.php'>Salida</a></li>
              </ul>
          </li>
            <li><a>Evaluacion</a>
              <ul>
                <?php echo "<li><a href='frm_aplicar_eva_ficha.php?valor=".$User."' target='iframe_a'>Evaluar</a></li>";  ?>
              </ul>
            </li>
            <li><a>Administracion</a>
              <ul>
                <li><a href='frm_cambio_contrasenna.php' target='iframe_a'>Cambio de contraseña</a></li>
              </ul>
            </li>
          </ul>
        </nav>
    </footer>
<!-- <nav> -->


	<div class="">
		<iframe height="500px" width="100%" src="" name="iframe_a"></iframe>
	</div>
   <!--<iframe height="300px" width="100%" name= "iframe_b" src="Frm_Ban_Respuestas.html" style="border:none;"></iframe>-->
  </body>
</html>
