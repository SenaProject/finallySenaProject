<?php
// valor=adicionar
$Control=$_GET['valor'];

if ($Control == 'adicionar') {
// aqui debo realizar l insercion de datos a detalle_formulario
$IdFormulario = $_GET['formulario'];
$Grupo = $_POST['sGrupoPreguntas'];
$IdPreguntaNew = $_POST['sPreguntasLibres'];
if ($IdPreguntaNew =='Nulo') {
  echo "<h3><a href='../Views/frm_formulario_maestro.php'>Volver, seleccione pregunta ...</a></h3><br>";
}else{
require_once "../Models/crear.php";
// $NomForm = $_POST['vNomFrm'];
$consultar= new CrearDetalleFormulario();
$ver=$consultar->fCrearDetalleFormulario($IdFormulario,$IdPreguntaNew);

echo "<h2>Formulario No: ".$IdFormulario."</h2><br>";
echo "<h2>Grupo No: ".$Grupo."</h2><br>";
echo "<h2>Pregunta No: ".$IdPreguntaNew."</h2><br>";
echo "<form class='' action='../Views/frm_formulario_detalle_add.php?valor=nuevodetalle&formulario=".$IdFormulario."&grupo=".$Grupo."' method='POST'>";
echo "<input type='text' name='sGrupoPreguntas' value='".$Grupo."' readonly>";
echo "<h1>Informacion Guardada</h1>";

echo "<h3><a href='../Views/frm_formulario_maestro.php'>Volver ...</a></h3><br>";
echo "<input type='submit' name='btnGrabar' value='Adicione Pregunta del mismo grupo'>";
echo "</form>";
}
}
 ?>
