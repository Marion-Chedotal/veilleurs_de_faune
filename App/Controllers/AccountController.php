<?php
namespace Project\Controllers;

use Project\Models\Account;
use Project\Models\Observation;

class AccountController 
{

    /**
     *________ CRUD ________ 

     * CREATE
     * method which permit to create an account: user or admin
     */ 
    public function addAccount(): void
    {
        $hasError = false; 

        if (!empty($_POST)) {
            //use $ to get and secure sur data's form
            $pseudo = trim(htmlspecialchars($_POST["pseudo"]));
            $email = trim(htmlspecialchars($_POST["email"]));
            $password = trim($_POST["password"]);

            // ctrl of the pseudo format : 
            if (!preg_match ('/^[a-zA-Z0-9_]{8,}$/', $pseudo)) {
                $registerMessage = "Le pseudo ne respecte pas le format";
                $hasError = true;
            } 

            // ctrl of the email format : 
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $registerMessage = "Le format de l'email n'est pas correct"; 
                $hasError = true;
            }

            // ctrl of the password format : 
            elseif (!preg_match ('/^[a-zA-Z0-9_]{8,}$/', $password)) {
                $registerMessage = "Le mot de passe ne respecte pas le format";
                $hasError = true;
            } 

            if (!$hasError) {

                //secured password:  htmlspeciachars and then hash
                $securedPassword = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
                $hashedPassword = password_hash($securedPassword, PASSWORD_DEFAULT);

                // new account is created
                $idAccount = Account::createAccount($pseudo, $email, $hashedPassword);

                // his datas will be stock in logCurrentAccount and redirected on his account data page which display observations made by each user. 
                $account = new Account($idAccount);
                $account->logCurrentAccount();

                $observations = Observation::findAllObservationsByUser($idAccount);

                $registerMessage = "Félicitations $account->pseudo ! Votre compte a bien été créé.";

                require ('App/Views/Front/AccountViews/myAccount.php'); 

            } else {
                require ('App/Views/Front/login.php'); 
            }
            
        } else {
            require ('App/Views/Front/login.php'); 
        }
    }

    /** 
     * READ : get the connecteAccount and display the good view
     * 
     */ 
    public function getConnectedAccount(): void
    {
        if (!empty($_SESSION['idAccount'])) {
            $idAccount = $_SESSION['idAccount'];
            $account = new Account($idAccount);
            $observations = Observation::findAllObservationsByUser($idAccount);
        }

        if (Account::isAdmin()){
            require('App/Views/BackOffice/AccountViews/adminAccount.php');
        } else {
            require('App/Views/Front/AccountViews/myAccount.php');
        }
    }

    // function to get the account in ordre to update it 
    public function getAccount(int $idAccount): void
    {
        $account = new Account($idAccount);

        if (Account::isAdmin()){
            require('App/Views/BackOffice/AccountViews/updateAccount.php');  
            } else {
            require ('App/Views/Front/AccountViews/updateAccount.php'); 
        }  
    }

    /** UPDATE 
     * 
     */ 
    public function modifyAccount(string $idAccount): void
    {
        $account = new Account($idAccount);

        //get the data of the form and clean it
        $pseudo = isset($_POST["pseudo"]) ? trim(htmlspecialchars($_POST["pseudo"])) : null;
        $email = isset($_POST["email"]) ? trim(htmlspecialchars($_POST["email"])) : null;
        $password = isset($_POST["newPassword"]) ? trim($_POST["newPassword"]) : null;


        $hasError = false; 

        // ctrl of the password format : 
        if (!empty($_POST['newPassword']) && !preg_match('/^[a-zA-Z0-9_]{8,}$/', $password)) {
            $message = "Le mot de passe ne respecte pas le format";
            $hasError = true;
        }

        // ctrl of the email format : 
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Le format de l'email n'est pas correct"; 
            $hasError = true;
        }

        // ctrl of the pseudo format : 
        if (!empty($pseudo) && !preg_match('/^[a-zA-Z0-9_]{8,}$/', $pseudo)) {
            $message = "Le pseudo ne respecte pas le format";
            $hasError = true; 
        }

        if ($hasError){
            if (Account::isAdmin()){
                require('App/Views/BackOffice/AccountViews/updateAccount.php');  
            } else {
                require('App/Views/Front/AccountViews/updateAccount.php');
            } 
        } else {
            // it's all good: with this function: securised the password and clean it
            $account->updateAccount($pseudo, $email, $password);

            // get the id of the modified account, instance a new account and display his observation
            $idAccount = $_SESSION['idAccount'];
            $account = new Account($idAccount);
            $observations = Observation::findAllObservationsByUser($idAccount);

            $message = "Le compte " . $pseudo . " a bien été modifié";

            if (Account::isAdmin()){
                require('App/Views/BackOffice/AccountViews/adminAccount.php'); 
            } else {
                require('App/Views/Front/AccountViews/myAccount.php'); 
            }
        } 
    }
     
    /** 
     * DELETE
     * 
     */
    public function removeAccount(string $pseudo): void
    {
        // new instance of Account to call the data session, then delete account and destroy his session 
        $account = new Account($pseudo);
        $account->logCurrentAccount();
        $account->deleteAccount();
        session_destroy();
        $message = "Le compte " . $account->pseudo . " a bien été supprimé";
        
        require('App/Views/Front/login.php'); 
    }

     /** 
     * Login
     * 
     */
    public function login(): void 
    {
        // get datas user and clean it
        $pseudo = trim(htmlspecialchars($_POST['pseudo'] ?? null)); 
        $password = trim(htmlspecialchars($_POST['password'] ?? null));
        $email = trim(htmlspecialchars($_POST['email'] ?? null));


        if (!empty($pseudo) && !empty($password)) {

            if ($account = Account::connect($pseudo, $password)) {
                
                //if connection succeed, register datas Account and get all his Observations already made
                $account->logCurrentAccount();
                $idAccount = $_SESSION['idAccount'];
                $observations = Observation::findAllObservationsByUser($idAccount);

                // function needed for admin and user, need to rout
                if (Account::isAdmin()){
                    require('App/Views/BackOffice/AccountViews/adminAccount.php');
                } else {
                    require('App/Views/Front/AccountViews/myAccount.php');
                }
            }
            else {
                // if wrong datas transmit, redirect to the good view (back or front)
                $message = "Pseudo ou mot de passe incorect, veuillez ré-essayer.";
                if ((strpos($_SERVER['REQUEST_URI'], 'admin') !== false)){
                    require('App/Views/BackOffice/login.php');  
                } else {
                    require('App/Views/Front/login.php');
                }
            } 
        } else {
            // if no fields filled and submit, redirect to the good view (back or front)
            if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
                require('App/Views/BackOffice/login.php');  
            } else {
                require('App/Views/Front/login.php');
            }
        }
    }

     /** 
     * Logout: disconnect user from is session account
     * 
     */
    public function logout(): void
    {
        // get session pseudo data and destroy the session 
        $pseudo = $_SESSION['pseudo'] ?? '';
        session_destroy();
        $message = $pseudo . " , vous avez bien été déconnecté de votre session";
     
        if (Account::isAdmin()){
            require('App/Views/BackOffice/login.php');  
        } else {
            require('App/Views/Front/login.php');
        }
    }

}
