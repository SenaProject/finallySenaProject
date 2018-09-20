<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once "../Models/leer.php";
    $Control = $_GET['valor'];
    $Formulario = $_GET['formulario'];
    $Grupo = $_POST['sGrupoPreguntas'];
    // print_r($Control);
    // print_r($Formulario);
    // print_r($Grupo);
if ($Grupo >0 ) {
echo "<form class='' action='../Controllers/validar_detalle_formulario.php?valor=adicionar&formulario=".$Formulario."&grupo=".$Grupo."' method='POST'>";
// De aqui me debo llevar el id_pregunta y el Id_formulario realizo inser a tabla detalle_formulario
echo "<h2>Seleccione la pregunta a adicionar al Formulario No.: ".$Formulario."</h2><br>";
echo "<h3>Pregunta: </h3>";


    $Consulta1= new ConsultaPregunta();
    $ver1=$Consulta1->TraePreguntasLibres($Formulario,$Grupo);
    echo "<select class='' name='sPreguntasLibres'>";
    echo "<option value='Nulo' ></option>";
      foreach ($ver1 as $value) {
        echo "<option value='".$value[0]."'>".$value[2]." - ".$value[1]."</option>";
      }
    echo "</select>";
    echo "<input type='text' name='sGrupoPreguntas' value='".$Grupo."' readonly>";
    // echo "<a name='sGrupoPreguntas'>".$Grupo."</a>";
    echo "<input type='submit' name='btnGrabar' value='Adicione Pregunta'>";
echo "</form>";
} else {
    echo "<h2>Atencion!! no se escogio el grupo de pregunta vuelva a realizar el proceso ...</h2><br>";
    echo "<h3><a href='frm_formulario_maestro.php'> volver </a></h3><br>";
    // echo $Control."<br>";
    // echo $Formulario."<br>";
}
      ?>
  </body>
</html>
