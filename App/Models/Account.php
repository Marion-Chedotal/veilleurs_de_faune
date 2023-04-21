<?php
namespace Project\Models;

use PDO;
use PDOException;

/**
 * Class which create CRUD with prepared requests
 */
class Account extends DbConnection
{
    // attributs declaration 
    public int $idAccount;
    public string $pseudo;
    public string $email;
    public string $password;
    public int $role;

    public const USER_ROLE = 0;
    public const ADMIN_ROLE = 1; 

    // construct
    public function __construct(int $idAccount)
    {
        $dataAccount = $this->findAccount($idAccount);

        if (!empty($dataAccount)) {

            //$hydrate with database values
            $this->idAccount = $idAccount;
            $this->pseudo = $dataAccount['pseudo'] ?? '';
            $this->email = $dataAccount['email'] ?? '' ; 
            $this->password = $dataAccount['password'] ?? ''; 
            $this->role = intval($dataAccount['role'] ?? 0); 
        }
    }

    /**
     *_______ CRUD _______* 
     
     * CREATE
     */  
    public static function createAccount(string $pseudo, string $email, string $password)
    {
        //try & catch handle errors 
        try {  
            //first, connection to the database       
            $pdo = self::connection();

            //empty do isset, null, array(), [], '', "", 0, '0', false 
            if (!empty($pdo)) {

                //then, prepared request to insert the information to the table
                $sql = $pdo->prepare(
                    "INSERT INTO account (pseudo, email, password) VALUES (:pseudo, :email, :password)");

                //then, prepared request to insert the information to the Category table
                $sql->execute([
                    ':pseudo' => $pseudo,
                    ':email' => $email,
                    ':password' => $password,
                ]);

                $idAccount = $pdo->lastInsertId();
                
                return $idAccount;
            }
        }
        catch (PDOException $e){
            echo "La création du compte a échoué: " . $e->getMessage();
        }   
        return null;
    }
    
    /**
     * READ
     */
    public function findAccount($idAccount): array 
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT idAccount, pseudo, email, password, role FROM account 
                    WHERE idAccount =:idAccount"
                );
                $sql->execute([':idAccount' => $idAccount]);
                $result = $sql->fetch(PDO::FETCH_ASSOC);   
            }               
        } 
        catch (PDOException $e) {
            echo "La lecture du compte a échoué: " . $e->getMessage();
        }
        return $result;
    }
        
    /**
     * UPDATE
     */
    public function updateAccount($pseudo, $email, $password)
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {

                // if password modifyed
                if (!empty($password)) {
                    // securing the new password 
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $securedPassword = htmlspecialchars($hashedPassword, ENT_QUOTES, 'UTF-8');

                    $sql = $pdo->prepare(
                        "UPDATE account SET pseudo = :pseudo, email = :email, password = :password 
                        WHERE (idAccount = :idAccount)");   

                // if not (to secure: don't add password in the request to not modify it)
                } else {
                    $sql = $pdo->prepare(
                        "UPDATE account SET pseudo = :pseudo, email = :email 
                        WHERE (idAccount = :idAccount)"
                    );
                }
            
                $sql->execute([
                    ':pseudo' =>$pseudo,
                    ':email' => $email,
                    ':idAccount' => $this->idAccount
                ]);
                // update  Account object with the news datas
                $_SESSION['pseudo'] = $pseudo;
                $this->pseudo = $pseudo;
                $this->email = $email;

                // return it updated
                return $this;
            }
        } 
        catch (PDOException $e) {
            echo "La mise à jour du compte a échoué: " . $e->getMessage();
        }
    }
     
    /**
     * DELETE
     */
    public function deleteAccount(): void 
    {
        try {
            $pdo = $this->connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare("DELETE FROM account WHERE idAccount = :idAccount");
                $sql->execute([':idAccount' => $this->idAccount]);
            }
        } 
        catch (PDOException $e) {
            echo "La suppresion du compte a échoué: " . $e->getMessage();
        }
    }

    /**
     * Function to connect user to his account
     */
    public static function connect(string $pseudo, string $password)
    {
        try {
            $pdo = self::connection();

            if (!empty($pdo)) {
                $sql = $pdo->prepare(
                    "SELECT idAccount, pseudo, password FROM account 
                    WHERE pseudo = :pseudo"
                );

                $sql->execute([':pseudo' => $pseudo]);
                $result = $sql->fetch();

                // comparison with password transmit with password hash & stock in DB
                if (password_verify($password, $result['password'] ?? '')) {
                    // if true, account class instace with id account
                    return new self($result['idAccount']);
                }
            }
        } 
        catch (PDOException $e) {
            echo "La suppresion du compte a échoué: " . $e->getMessage();
        }
        return false;
    }

    /**
     * function to stock the datas of the current User logged
     */
    public function logCurrentAccount()
    {
        $_SESSION['pseudo'] = $this->pseudo;
        $_SESSION['idAccount'] = $this->idAccount;
        $_SESSION['isUserLogged'] = $this->role === self::USER_ROLE;
        $_SESSION['isAdmin'] = $this->role === self::ADMIN_ROLE;
    }
    
    /** 
     * IsADdmin, function to verify admin's role
     * 
     */

    public static function isAdmin(): bool
    {
        return isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true;
    }

}      