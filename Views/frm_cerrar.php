<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
session_start();
session_unset();
session_destroy();
header("location:inicio.php");  
 ?>
    <h1>SE HA CERRADO LA SECION DEL USUARIO</h1>
  </body>
</html>
