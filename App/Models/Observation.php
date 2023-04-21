<?php
namespace Project\Models;

use PDOException;

/**
 * Class which create CRUD prepared requests
 */
class Observation extends DbConnection
{

     /** 
     *_______ CRUD _______*
 
     * CREATE
     */  
    public static function createObservation($date, string $department, string $location, int $counting, string $picture, string $comments, string $pictureCredit, int $idSpecies, int $idAccount): array
    {
        // try & catch handle errors 
        try {  
            // first, connection to the database       
            $pdo = self::connection();

            // empty do isset, null, array(), [], '', "", 0, '0', false 
            if (!empty($pdo)) {

                //then, prepared request to insert the information to the Category table
                $sql = $pdo->prepare(
                    "INSERT INTO observation (date, department, location, counting, picture,pictureCredit, comments, idSpecies, idAccount) 
                    VALUES (:date, :department, :location, :counting, :picture, :pictureCredit, :comments, :idSpecies, :idAccount)
                ");

                $sql->execute([
                    ':date' => $date,
                    ':department' =>$department,
                    ':location' => $location,
                    ':counting' => $counting,
                    ':picture' => $picture,
                    ':pictureCredit' => $pictureCredit,
                    ':comments' => $comments,
                    ':idSpecies' => $idSpecies,
                    ':idAccount' => $idAccount
                ]);

                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "La création de l'observation a échoué: " . $e->getMessage();
        }
    }
    
    /** 
     * READ ALL => Display All Observation by user
     */  

    public static function findAllObservationsByUser($idAccount): array 
    {
        try {
            $pdo = self::connection();
            
            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT a.pseudo, o.idObservation, o.date, o.department, o.location, o.counting, o.picture, o.pictureCredit, o.comments, s.commonName
                    FROM observation AS o
                    INNER JOIN account AS a ON a.idAccount = o.idAccount 
                    INNER JOIN species AS s ON s.idSpecies = o.idSpecies
                    WHERE a.idAccount = :idAccount
                ");

                $sql->execute([':idAccount' => $idAccount]);

                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "La lecture des observations a échoué: " . $e->getMessage();
        }
    } 

    /**
     * READ ALL => Display all observation with speciesName and accountName information
     */ 
    public static function findAllObservations(): array 
    {
        try {
            $pdo = self::connection();
          
            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT a.pseudo, o.idObservation, o.date, o.department, o.location, o.counting, o.picture, o.pictureCredit, o.comments, s.commonName
                    FROM observation AS o
                    INNER JOIN account AS a ON a.idAccount = o.idAccount 
                    INNER JOIN species AS s ON s.idSpecies = o.idSpecies
                ");
                $sql->execute();

                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "La lecture des observations a échoué: " . $e->getMessage();
        }
    } 
}      