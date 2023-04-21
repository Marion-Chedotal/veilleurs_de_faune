<?php
namespace Project\Models;

use PDO;
use PDOException;

// main class of de POO PDO connection
abstract class DbConnection
{

    // permit to defin once the pdo and optimize database access
    private static $db = null;

    public static function connection()
    {
        if (isset(self::$db)) {
            return self::$db;
        } else {
            
            if (isset($_ENV['DB_PORT']) && !empty($_ENV['PORT'])){
                $port= ":" . $_ENV['DB_PORT']; 
            } else {
                $port = "";
            }

            // trying to connect to the database
            try {
                $pdo = new PDO (
                  "mysql:dbname=" . $_ENV['DB_NAME'] . ";host=" . $_ENV['DB_HOST'] . $port . ";charsetutf8", $_ENV['DB_LOGIN'], $_ENV['DB_PASSWORD']
                );

                //error PDO mode on Exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $pdo;
            }
            
            // catch exceptions if exception is on, display this
            catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }

    // connection closing
    public function closeConnection() {
        $pdo = null; 
    }    
  
}