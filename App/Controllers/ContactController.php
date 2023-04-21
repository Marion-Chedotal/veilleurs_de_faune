<?php
namespace Project\Controllers;

use Project\Models\Contact;

class ContactController 
{

    /**
     *________ CRUD ________ 

     * CREATE
     * 
     */ 
    public function sendMessage(): void
    {
        $hasError = false;

        if (!empty($_POST)) {
            //use $ to get and secure sur data's form
            $lastName    = trim(htmlspecialchars($_POST["lastName"]));
            $firstName = trim(htmlspecialchars($_POST["firstName"]));
            $email = trim(htmlspecialchars($_POST["email"]));
            $topic    = trim(htmlspecialchars($_POST["topic"]));
            $message = trim(htmlspecialchars($_POST["message"]));
            
            // Check if all required fields are filled
            if (empty($lastName) || empty($firstName) || empty($email) || empty($message)) {
                $message = "Veuillez remplir tous les champs.";
                $hasError = true;
            }

            //ctrl of the email format : 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Le format de l'email n'est pas correct"; 
                $hasError = true;
            }
            if (!$hasError) {

            // create a new object Contact with the data form
            $contact = Contact::createMessage($lastName, $firstName, $email, $topic, $message);

            $message = "Votre message a bien été envoyé.";
            }
        }
        require ('App/Views/Front/contact.php'); 
    }

     /** 
     * READ
     * 
     */ 
    public function getMessage(int $idContact): void
    {
        $category = new Contact($idContact);

        require ('App/Views/BackOffice/ContactView/getAllMessages.php');    
    }

    /** 
     * READ All
     * 
     */   
    public function getAllMessages(): void
    {
        $contacts = Contact::findAllMessages();

        require ('App/Views/BackOffice/ContactView/getAllMessages.php');  
    }

    /** 
     * DELETE
     *
     */
    public function removeMessage(int $idContact): void
    {
        // create a new instance of message and call the function to delete
        $contact = new Contact($idContact);
        $contact->deleteMessage();

        // then all the message to continued to display it on the view
        $contacts = Contact::findAllMessages();

        $message = "Le message a bien été supprimé";
        
        require ('App/Views/BackOffice/ContactView/getAllMessages.php'); 
    }
}




