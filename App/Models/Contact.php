<?php
namespace Project\Models;

use PDO;
use PDOException;

/**
 * Class which create CRUD prepared requests
 */
class Contact extends DbConnection
{
    
    // attributs declaration 
 
    public int $idContact;
    public string $lastName;
    public string $firstName;
    public string $email;
    public string $topic;
    public string $message;

    // construct
    public function __construct(int $idContact)
    {
        $dataContact = $this->findMessage($idContact);

        if(!empty($dataContact)) {
            $this->idContact = $idContact;
            $this->lastName = $lastName['lastName'] ?? '';
            $this->firstName = $firstName['firstName'] ?? '';
            $this->email = $dataContact['email'] ?? '';
            $this->topic = $dataContact['topic'] ?? '';
            $this->message = $dataContact['message'] ?? '';
        }
    }

    /**
     *_______ CRUD _______*
 
     * CREATE
     */  
    public static function createMessage(string $lastName, string $firstName, string $email, string $topic, string $message): array 
    {
        // try & catch handle errors 
        try {  
            // first, connection to the database       
            $pdo = self::connection();
            // empty do isset, null, array(), [], '', "", 0, '0', false 
            
            if (!empty($pdo)) {
                //then, prepared request to insert the information to the table
                $sql = $pdo->prepare(
                    "INSERT INTO contact (lastName, firstName, email, topic, message) 
                    VALUES (:lastName, :firstName, :email, :topic, :message)
                ");

                $sql->execute([
                    ':lastName' => $lastName,
                    ':firstName' =>$firstName,
                    ':email' => $email,
                    ':topic' => $topic,
                    ':message' => $message
                ]);

                return $sql->fetchAll();
            }
        }
        catch (PDOException $e){
            echo "L'envoie du message à la base de données a échoué : " . $e->getMessage();
        }
    }
    
    /**
     * READ
     */
    public function findMessage(int $idContact): array
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT lastName, firstName, email, topic, message
                    FROM contact
                    WHERE idContact =:idContact"
                );

                $sql->execute([':idContact' => $idContact]);
                $result = $sql->fetch(PDO::FETCH_ASSOC);
            } 
        }
        catch (PDOException $e) {
            echo "La lecture du message a échoué : " . $e->getMessage();
        }
        return $result;
    }

    /**
     * READ ALL
     */ 
    public static function findAllMessages(): array
    {
        try {
            $pdo = self::connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare("SELECT * FROM contact");
                $sql->execute();
                return $sql->fetchAll();
            }
        } 
        catch (PDOException $e) {
            echo "L'affichage des messages a échoué : " . $e->getMessage();
        }
    }

    /**
     * DELETE
     */
    public function deleteMessage(): void
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "DELETE FROM contact 
                    WHERE idContact = :idContact");
                $sql->execute([':idContact' => $this->idContact]); 
            } 
        }
        catch (PDOException $e) {
            echo "La suppression du message a échoué  : " . $e->getMessage();
        }
    }

}      