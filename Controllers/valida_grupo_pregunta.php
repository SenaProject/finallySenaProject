<?php
$control = $_GET['valor'];

if ($control == 'newgrupo') {
$Descripcion = $_POST['descripgp'];
require_once "../Models/crear.php";
$cCreGruPre = new CrearGrupoPregunta();
$vCreGruPre=$cCreGruPre->fCrearGrupoPregunta($Descripcion);
?>
<h1>
Ha ingresado un grupo de preguntas con exito
</h1>
<a href="">Volver ...</a>
<?php
}
 ?>
