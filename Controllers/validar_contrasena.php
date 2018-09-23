<?php
require_once "../Models/leer.php";
require_once "../Models/crear.php";

$valor = $_GET['valor'];
$user = $_POST['usuario'];
$apwd = $_POST['aclave'];
$npwd = $_POST['nclave'];
$cpwd = $_POST['rclave'];
$consultar= new ConsultaUsuario();
$ver=$consultar->fValidaUsuario($user, $apwd);
echo $ver[0];
?>
<br>
<?php
echo $ver[1];
echo $ver[2];
if ($ver[0] == $user && $ver[2] == $apwd) {
  // code...

if ($valor=='cambiopwd') {
  if ($npwd == $cpwd) {
    // aqui cambia la contraseña
    $consultar1= new CrearNuevoPwd();
    $ver1=$consultar1->fCrearNuevoPwd($user, $npwd);
    // print_r('aqui cambia la contraseña');
    header("location:../Views/frm_cambio_contrasenna.php?valor=ok") ;
  }
}
}
 ?>
