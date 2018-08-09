<?php

/**
 *
 */
class Conexion
{
  /**
  *Create function connect for connect with data base
  **/
  function conection()
  {
$servername = "localhost";
$db="evaplus";
$username = "evaplus";
$password = "root01";
$puerto= "5432";

try {
    /*$conn = new PDO("mysql:host=$servername;dbname=pruebasena", $username, $password);*/
    $conn = new PDO("pgsql:host=$servername;dbname=$db", $username , $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
  }
}







 ?>
