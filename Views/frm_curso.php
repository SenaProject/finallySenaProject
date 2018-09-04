<?php
//DOCTYPE html , php
//Autor: Pablo Emilio Garcia
//Fecha: 02/09/2018
//Version: 1.0.0.0

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>

  </head>
  <body>

    <table>
        <tr>
          <th colspan="2">CURSO</th>
        </tr>
        <tr>
          <td>
            <h3>Ver</h3>
          </td>
          <td><a href="frm_curso_ver.php">Pulse aqui</a></td>
        </tr>
        <tr>
          <td>
            <h3>Asignar</h3>
          </td>
          <td><a href="frm_curso_asignar.php">Pulse aqui</a></td>
        </tr>
        <tr>
          <td>
          <h3>Quitar</h3>
          </td>
          <td><a href="frm_curso_quitar.php">Pulse aqui</a></td>
        </tr>
    </table>
  </body>
</html>
