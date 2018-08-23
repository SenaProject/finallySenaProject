<?php

class Conexion{


	public function conectar(){
		$servername = "localhost";
		$username = "evaplus";
		$password = "root01";
		$database = 'evaplus';

		try {
    $conn = new PDO("pgsql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
		return $conn;
  }
}



?>
