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
  }
}


class PatronSingleton{

    // Contenedor de la instancia del singleton
 private static $instancia;
 private static $dbh;
 private $servername = "localhost";
 private $username = "evaplus";
 private $password = "root01";
 private $database = 'evaplus';

    // Un constructor privado evita la creación de un nuevo objeto
/*    private function __construct()
    {
        try {

            $this->dbh = new PDO("pgsql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            //$this->dbh->exec("SET CHARACTER SET utf8");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {

            print "Error!: " . $e->getMessage();

         die();
     }
   }*/

    // método singleton
    public static function singleton()
    {
     $this->$dbh = new PDO("pgsql:host=$this->servername;dbname=$this->database", $this->username, $this->password);

        if (!isset(self::$dbh)) {
            $miclase = __CLASS__;
            self::$dbh = new $miclase;
        }
        return self::$dbh;

    }

    public function __clone()
    {

        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);

    }
}
