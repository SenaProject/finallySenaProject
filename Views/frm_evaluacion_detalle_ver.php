<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    
    <table border="2">
    <tr>
      <th>Cons.</th>
      <th>Pregunta</th>
      <th>Documento Instructor</th>
      <th>Nombre Instructor</th>
      <th>Documento Aprendiz</th>
      <th>Nombre Aprendiz</th>
      <th>Ficha</th>
    </tr>
    <tr>
    <?php
    $IdEvaluacion = $_GET['valor'];
    require_once "../Models/leer.php";
    $conseva= new ConsultaEvaluacion();
    $vconseva=$conseva->TraeDetalleEvaluacion($IdEvaluacion);
    foreach ($vconseva as $vconsevaint) {
      echo "<td>".$vconsevaint[0]."</td>";
      echo "<td>".$vconsevaint[1]."</td>";
      echo "<td>".$vconsevaint[2]."</td>";
      echo "<td>".$vconsevaint[3]."</td>";
      echo "<td>".$vconsevaint[4]."</td>";
      echo "<td>".$vconsevaint[5]."</td>";
      echo "<td>".$vconsevaint[6]."</td></tr>";
            }
     ?>

    </table>
  </body>
</html>
